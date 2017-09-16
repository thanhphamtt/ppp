<!DOCTYPE html>
<html lang="en">
<head>
    <title>assssss</title>

    <!-- CSS And JavaScript -->
</head>
<div class="panel-body">
    <table class="table table-striped task-table">

        <!-- Table Headings -->

        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <!-- Table Body -->
        <tbody>

            <tr>
                <!-- Task Name -->
                <td class="table-text">
                    <div>{{ $course->name }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $course->description }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $course->price }}</div>
                </td>

            </tr>

        </tbody>

    </table>
    <form action="{{ url('course/'.$course->id) }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}

    <!-- Task Name -->
        <div class="form-group">
            <label for="course" class="col-sm-3 control-label">Course</label>

            <div class="col-sm-6">
                <p>Name</p>
                <input type="text" name="name" id="course-name" class="form-control">
            </div>
            <div class="col-sm-6">
                <p>Description</p>
                <input type="text" name="description" id="course-description" class="form-control">
            </div>
            <div class="col-sm-6">
                <p>Price</p>
                <input type="text" name="price" id="course-price" class="form-control">
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Edit Course
                </button>
            </div>
        </div>
    </form>
</div>
         <a href='{{url('course/'.$course->id.'/creat_class')}}' type="submit"> Creat Class </a>

</div>
</div>
</html>