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
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
        <form action="{{ url('post/'.$post_id.'/comment') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="course" class="col-sm-3 control-label">Commnent</label>


                <div class="col-sm-6">
                    <p>Content</p>
                    <input type="text" name="description" id="post-content" class="form-control">
                </div>

                <input type="hidden" value="{{$userid}}" name="user_id">
                <input type="hidden" value="{{$post_id}}" name="post_id">
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> COMMENT
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
    @if (count($comments) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Comments
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Comment</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tr>

                        <th>Content</th>

                    </tr>
                    <!-- Table Body -->
                    <tbody>
                    @foreach ($comments as $comment)
                       @if($comment->post_id == $post_id )
                        <tr>
                            <!-- Task Name -->

                            <td class="table-text">
                                <div>{{ $comment->content }}</div>
                            </td>

                            <td>
                                <a href='{{url('post/'.$post_id.'/comment/'.$comment->id)}}' type="submit"> Edit </a>
                            </td>
                            <td>
                                <form action="{{ url('post/'.$post_id.'/comment/'.$comment->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                      @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection