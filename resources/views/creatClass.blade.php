<!DOCTYPE html>
<html lang="en">
<head>
    <title>assssss</title>

    <!-- CSS And JavaScript -->
</head>
<body>
<div class="panel-body">
    <!-- Display Validation Errors -->
@include('common.errors')

<!-- New Task Form -->
    <form action="{{ url('course/'.$course_id.'/class') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Task Name -->
        <div class="form-group">
            <label for="class" class="col-sm-3 control-label">Class</label>

            <div class="col-sm-6">
                <p>Name</p>
                <input type="text" name="name" id="class-name" class="form-control">
            </div>
            <div class="col-sm-6">
                <p>Study Time</p>
                <input type="text" name="study_time" id="class-stydy_time" class="form-control">
            </div>
            <div class="col-sm-6">
                <p>Date</p>
                <input type="date" name="start_date" id="class-start_date" class="form-control">
            </div>
            <div class="col-sm-6">
                <input type="hidden" value="{{$course_id}}" name="course_id">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add Class
                </button>
            </div>
        </div>

    </form>

</div>
@if (count($classes) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Classes
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                <th>Classes</th>
                <th>&nbsp;</th>
                </thead>
                <tr>
                    <th>Name</th>
                    <th>Study Time</th>
                    <th>Start Date</th>
                </tr>
                <!-- Table Body -->
                <tbody>
                @foreach ($classes as $class)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div >{{ $class->name }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $class->study_time }}</div>
                        </td>
                        <td class="table-text">
                            <div>{{ $class->start_date }}</div>
                        </td>
                        <td>
                            <form action="{{ url('course/'.$course_id.'/class/'.$class->id) }}" method="POST">
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

</body>
</html>