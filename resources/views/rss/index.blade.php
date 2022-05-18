@extends('layout.default')
@section('body')
    <div class="container">
        @include('includes.alert')
        <div class="row">
            <div class="col-12 pt-2">
                 <div class="row">
                    <div class="col-8">
                        <h1 class="display-one"><font color= white>RSS Feeds!</font></h1>
                        <p><font color= purple>Enjoy reading my blogs. Click on a blog to read!</font></p>
                    </div>
                    <div class="col-4">
                        <p><p><font color= orange>Add new RSS feed</font></p>
                        <a href="/blog/manage/create/rss" class="btn btn-primary btn-sm">Add RSS</a>
                    </div>
                </div>                
                @forelse($rss_feeds as $rss_feed)
                    <ul>
                        <li><a href="/blog/manage/{{ $rss_feed->id }}">{{ ucfirst($rss_feed->title) }}</a></li>
                    </ul>
                    <p><font color= dark-brown><a href= "{{ $rss_feed->link }}"></a></font></p>
                    <p><font color= dark-brown>{!! $rss_feed->description !!}</font></p>
                @empty
                    <p class="text-warning">No RSS feed available</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection