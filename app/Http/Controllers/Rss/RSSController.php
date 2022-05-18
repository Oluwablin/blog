<?php

namespace App\Http\Controllers\Rss;

use App\Models\RSS;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RSSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Display all RSS feeds
     */
    // public function rss()
    // {
    //     $posts = RSS::all();

    //     $content = view('rss.index', compact('posts'));

    //     return response($content, 200)->header('Content-Type', 'application/xml');
    // }

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
            'title'   => 'required',
            'description'    => 'required',
        ]);

        $rss_feed = RSS::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        if($rss_feed){
            return redirect('/blog/manage')->with('success', 'RSS feed added successfully!');
        }
        return redirect('/blog/manage')->with('error', 'RSS feed could not be added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RSS  $rSS
     * @return \Illuminate\Http\Response
     * Display a particular RSS feed
     */
    public function show(RSS $rSS)
    {
        return view('rss.show', compact('rSS'));
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
    public function destroy(RSS $rSS)
    {
        $delete_rss = $rSS->delete();

        if($delete_rss){
            return redirect('/blog/manage')->with('success', 'RSS feed deleted successfully!');
        }
        return redirect('/blog/manage')->with('error', 'RSS feed could not be deleted!');
    }
}
