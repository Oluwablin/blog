@extends('layout.default')
@section('body')
    <div class="container">
        @include('includes.alert')
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-6">
                        <h1 class="display-one"><font color= white>My Blog!</font></h1>
                        <p><font color= purple>Enjoy reading my blogs. Click on a blog to read!</font></p>
                    </div>
                    <div class="col-3">
                        <p><p><font color= orange>Create new blog</font></p>
                        <a href="/blog/create/blog" class="btn btn-primary btn-sm">Create new Blog</a>
                    </div>
                    <div class="col-3">
                        <p><p><font color= orange>Add new RSS feed</font></p>
                        <a href="/blog/manage/create/rss" class="btn btn-primary btn-sm">Add RSS</a>
                    </div>
                </div>                
                @forelse($blogs as $blog)
                    <ul>
                        <li><a href="./blog/{{ $blog->id }}">{{ ucfirst($blog->title) }}</a></li>
                    </ul>
                    <p><font color= dark-brown>{{ $blog->description }}</font></p>
                @empty
                    <p class="text-warning">No blogs available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection