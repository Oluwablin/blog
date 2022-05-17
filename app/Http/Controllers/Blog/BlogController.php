<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * Display all Blogs
     */
    public function index()
    {
        $blogs = Blog::all();

	    return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * Display Form to create a new Blog
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * Create a new Blog and store it
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required',
            'description'    => 'required',
        ]);

        $blog = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        if($blog){
            return redirect('blog/' . $blog->id)->with('success', 'Blog created successfully!');
        }
        return redirect('/blog')->with('error', 'Blog could not be created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     * Display a particular Blog
     */
    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     * Display Form to update a Blog
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     * Update a Blog
     */
    public function update(Request $request, Blog $blog)
    {
        $update_blog = $blog->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        if($update_blog){
            return redirect('blog/' . $blog->id)->with('success', 'Blog updated successfully!');
        }
        return redirect('/blog')->with('error', 'Blog could not be updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     * Delete a Blog
     */
    public function destroy(Blog $blog)
    {
        $delete_blog = $blog->delete();

        if($delete_blog){
            return redirect('/blog')->with('success', 'Blog deleted successfully!');
        }
        return redirect('/blog')->with('error', 'Blog could not be deleted!');
    }
}
