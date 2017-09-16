<?php

namespace App\Http\Controllers;

use App\StudyClass;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClassController extends Controller
{
    //
    public function creatClass($course_id){
        $classes = StudyClass::orderBy('study_time', 'asc')->get();
      return view('creatClass',[
          'course_id' => $course_id,
          'classes' => $classes,
      ]);
    }
    public function storeClass($course_id,Request $request){
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|max:5',

        ]);

        if ($validator->fails()) {
            return redirect('/course/'.$course_id.'/creat_class')
                ->withInput()
                ->withErrors($validator);
        }

        // Create The Task...
        $class = new StudyClass;
        $class->name = $request->name;
        $class->study_time = $request->study_time;
        $class->courses_id = (int)$request->course_id;
        $class->start_date= $request->start_date;
        $class->save();

        return redirect('/course/'.$course_id.'/creat_class');
    }
    public function deleteClass($course_id,$class_id, Request $request){
        $class = StudyClass::find($class_id);
        $class->delete();
        return redirect('/course/'.$course_id.'/creat_class');

    }


}
