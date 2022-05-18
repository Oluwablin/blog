@extends('layout.default')

@section('body')

    <div class="container">
        @include('includes.alert')
        <div class="row">
            <div class="col-12 pt-2">
                <a href="/blog/manage/feed" class="btn btn-outline-primary btn-sm">Go back</a>
                <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                    <h1 class="display-4"><p><font color= white>Add RSS feed</font></h1>
                    <p><font color= brown>Fill the following to add an RSS feed</font></p>

                    <hr>

                    <form action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="control-group col-12">
                                <label for="link"><p><font color= dark-brown>RSS feed</font></label>
                                <input type="text" id="link" class="form-control" name="link"
                                       placeholder="Enter RSS link - http://" required>
                            </div>
                            <!-- <div class="control-group col-12 mt-2">
                                <label for="description"><p><font color= dark-brown>Description</font></label>
                                <textarea id="description" class="form-control" name="description" placeholder="Enter Blog description"
                                          rows="" required></textarea>
                            </div> -->
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">
                                <button id="btn-submit" class="btn btn-primary">
                                    Add RSS
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection