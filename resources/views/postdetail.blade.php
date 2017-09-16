@extends('layouts.app')
@section('content')
    <div class="panel-body">
        <table class="table table-striped task-table">

            <!-- Table Headings -->

            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
            </tr>
            <!-- Table Body -->
            <tbody>

            <tr>
                <!-- Task Name -->
                <td class="table-text">
                    <a href="{{url('post/'.$post->id)}}">{{ $post->title }}</a>
                </td>
                <td class="table-text">
                    <div>{{ $post->content }}</div>
                </td>
                <td class="table-text" >
                    <img style="width: 40px; height: 40px " src="{{$post->image_url}}">
                </td>

            </tr>
            </tbody>

        </table>
        <form action="{{ url('post/'.$post->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="course" class="col-sm-3 control-label">Post</label>

                <div class="col-sm-6">
                    <p>Title</p>
                    <input type="text" name="title" id="post-title" class="form-control">
                </div>
                <div class="col-sm-6">
                    <p>Content</p>
                    <input type="text" name="description" id="post-content" class="form-control">
                </div>
                <div class="col-sm-6">
                    <p>Image URL</p>
                    <input type="text" name="image_url" id="post-image_url" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Edit Post
                    </button>
                </div>
            </div>
        </form>
    </div>


    </div>
    </div>
@endsection