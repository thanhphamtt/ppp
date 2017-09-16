@extends('layouts.app')
@section('content')

<div class="panel-body">
    <table class="table table-striped task-table">

        <!-- Table Headings -->

        <tr>

            <th>Content</th>

        </tr>
        <!-- Table Body -->
        <tbody>

        <tr>
            <!-- Task Name -->

            <td class="table-text">
                <div>{{ $comment->content }}</div>
            </td>


        </tr>>
        </tbody>

    </table>
    <form action="{{ url('post/'.$post_id.'/comment/'.$comment->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
        <div class="form-group">
            <label for="course" class="col-sm-3 control-label">Comment</label>


            <div class="col-sm-6">
                <p>Content</p>
                <input type="text" name="description" id="comment-content" class="form-control">
            </div>

        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Edit Comment
                </button>
            </div>
        </div>
    </form>
</div>


</div>
</div>
@endsection