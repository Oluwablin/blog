@extends('layout.default')
@section('body')
    <div class="container">
        @include('includes.alert')
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one"><font color= white>{{ ucfirst($blog->title) }}</font></h1>
                <p><font color= dark-brown>{!! $blog->description !!}</font></p> 
                <hr>
                <a href="/blog/{{ $blog->id }}/edit" class="btn btn-outline-primary">Edit Blog</a>
                <br><br>
                <form id="delete-frm" action="/blog/{{ $blog->id }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete Blog</button>
                </form>
            </div>
        </div>
    </div>
@endsection