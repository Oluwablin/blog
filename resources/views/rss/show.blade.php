@extends('layout.default')
@section('body')
    <div class="container">
        @include('includes.alert')
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog/manage/feed" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one"><font color= white>{{ ucfirst($rss->title) }}</font></h1>
                <p><font color= dark-brown><a href= "{{ $rss->link }}">RSS Feed Link</a></font></p>
                    <p><font color= dark-brown>Description: {!! $rss->description !!}</font></p>
                    <p><font color= dark-brown>Author: {!! $rss->author !!}</font></p>
                    <p><font color= dark-brown>Pulished Date: {{ date("Y m d", strtotime($rss->published_at)) }}</font></p>
                <hr>
                <!-- <a href="/blog/manage/{{ $rss->id }}/edit" class="btn btn-outline-primary">Edit RSS feed</a> -->
                <br><br>
                <form id="delete-frm" action="/blog/manage/{{ $rss->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete RSS feed</button>
                </form>
            </div>
        </div>
    </div>
@endsection