@extends('layout.default')
@section('body')
    <div class="container">
        @include('includes.alert')
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog/manage/feed" class="btn btn-outline-primary btn-sm">Go back</a>
                <h1 class="display-one"><font color= white>{{ ucfirst($rSS->title) }}</font></h1>
                <p><font color= dark-brown><a href= "{{ $rSS->link }}"></a></font></p>
                <p><font color= dark-brown>{!! $rSS->description !!}</font></p>
                <hr>
                <!-- <a href="/blog/{{ $rSS->id }}/edit" class="btn btn-outline-primary">Edit RSS feed</a> -->
                <br><br>
                <form id="delete-frm" class="" action="" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger">Delete RSS feed</button>
                </form>
            </div>
        </div>
    </div>
@endsection