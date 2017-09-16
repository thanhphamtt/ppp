@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Task Form -->
        <form action="{{ url('course') }}" method="POST" class="form-horizontal">
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
                        <i class="fa fa-plus"></i> Add Course
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->
    @if (count($courses) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Coures
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                    <th>Course</th>
                    <th>&nbsp;</th>
                    </thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                    <!-- Table Body -->
                    <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <a href="{{url('course/'.$course->id)}}">{{ $course->name }}</a>
                            </td>
                            <td class="table-text">
                                <div>{{ $course->description }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $course->price }}</div>
                            </td>
                            <td>
                                <a href="{{ url('course/'.$course->id) }}"> Edit </a>
                            </td>
                            <td>
                                <form action="{{ url('course/'.$course->id) }}" method="POST">
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