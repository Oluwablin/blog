@extends('layout.default')

@section('body')

    <div class="container">
        @include('includes.alert')
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4"><p><font color= white>Edit Blog</font></h1>
                    <p><font color= brown>Edit this form to update a Blog</font></p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="title"><font color= dark-brown>Title</font></label>
                                <input type="text" id="title" class="form-control" name="title"
                                       placeholder="Enter Blog Title" value="{{ $blog->title }}" required>
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="description"><font color= dark-brown>Description</font></label>
                                <textarea id="description" class="form-control" name="description" placeholder="Enter Blog description"
                                          rows="5" required>{{ $blog->description }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Update Blog
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection