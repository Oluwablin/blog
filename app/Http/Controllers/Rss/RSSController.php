<?php

namespace App\Http\Controllers\Rss;

use App\Models\RSS;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleXMLElement;
use Illuminate\Support\Facades\DB;

class RSSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Display all RSS feeds
     */

    public function index()
    {
        $rss_feeds = RSS::latest()->take(10)->get();

        return view('rss.index', compact('rss_feeds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Display Form to add new RSS feed
     */
    public function create()
    {
        return view('rss.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Add a new RSS feed and store it
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'link'   => 'required',
        ]);

        try {
            DB::beginTransaction();
            $link = file_get_contents($request->link);
            $contents = new SimpleXMLElement($link);

            foreach ($contents->channel->item as $content) {
                $rss_feed = RSS::insert([
                    'guid' => $content->guid,
                    'title' => $content->title,
                    'description' => $content->description,
                    'user_id' => Auth::id(),
                    'author' => $content->author,
                    'link' => $content->link,
                    'published_at' => date("Y-m-d H:i:s", strtotime($content->pubDate)),
                ]);
            }

            if ($rss_feed) {
                DB::commit();
                return redirect('/blog/manage/feed')->with('success', 'RSS feed added successfully!');
            }
        } catch (\Throwable $th) {

            DB::rollback();
            return redirect('/blog/manage/feed')->with('error', 'RSS feed could not be added!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RSS  $rSS
     * @return \Illuminate\Http\Response
     * Display a particular RSS feed
     */
    public function show(RSS $rss)
    {
        return view('rss.show', compact('rss'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RSS  $rSS
     * @return \Illuminate\Http\Response
     */
    public function edit(RSS $rSS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RSS  $rSS
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RSS $rSS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RSS  $rSS
     * @return \Illuminate\Http\Response
     * Delete an RSS feed
     */
    public function destroy(RSS $rss)
    {
        $delete_rss = $rss->delete();

        if ($delete_rss) {
            return redirect('/blog/manage/feed')->with('success', 'RSS feed deleted successfully!');
        }
        return redirect('/blog/manage/feed')->with('error', 'RSS feed could not be deleted!');
    }
}
