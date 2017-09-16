@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
        <form action="{{ url('post') }}" method="POST" class="form-horizontal">
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
                <input type="hidden" value="{{$userid}}" name="user_id">
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> POST
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
    @if (count($posts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Posts
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Post</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                    </tr>
                    <!-- Table Body -->
                    <tbody>
                    @foreach ($posts as $post)
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
                            <td>
                                <a href='{{url('post/'.$post->id.'/creat_comment')}}' type="submit"> Comment </a>
                            </td>
                            <td>
                                <form action="{{ url('post/'.$post->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection