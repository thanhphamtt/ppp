<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests;


class CourseController extends Controller
{
    //
    public function courses(){
      $courses = Course::orderBy('created_at', 'asc')->get();

    return view('courses', [
        'courses' => $courses,
    ]);
    }
    public function store(Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|max:5',
            'description' => 'required|max:10',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Task...
        $course = new Course;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->save();

        return redirect('/');
    }

    public function deleteCourse($course_id, Request $request){
        $course = Course::find($course_id);
        $course->delete();
        return redirect('/');

    }
    public function simpleDetail($course_id){
        $course = Course::find($course_id);
        return view('coursedetail',[
            "course"=> $course
        ]);
    }
    public function editCourse($course_id,Request $request){

       $course = Course::find($course_id);
       $course->name = $request->name;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->save();
        return redirect('/');

    }

}
