<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubjectCourse;
use App\Models\Course;
use App\Models\Subjects as Subjects;
use App\Models\Topic;
use Auth;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     

     
    public function index()
    {
        return view('subjects.index')
                ->with([
                    'subjects' => Subjects::all(), 
                    'courses' => Course::all(), 
                    'subj_courses' => SubjectCourse::all(), 
                    'topics' => Topic::all()
                ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         if(Auth::user()->role_id != '1'){
             return view('subjects.index')->with('error','Unauthorized Page');
         
         }
         
         return view('subjects.create')
                ->with([
                    'subjects' => Subjects::all(),
                    'courses' => Course::all()
                    ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'subjectname' => 'required',
            'description' => 'required',
            'yearlevel' => 'required'
        ]);

        //   Subjects Tables
       $subject = new Subjects;
       // $subject->course_id = $course;
       $subject->name = $request->subjectname;
       $subject->description = $request->description;
       $subject->year_level = $request->yearlevel;
       // $subject->user_id = Auth::user()->id;
       $subject->save();

        foreach($request->course_id as $course)
        {
            //   Subjects Courses
           $subj_course = new SubjectCourse;
           $subj_course->subject_id = $subject->id;
           $subj_course->course_id = $course;
           $subj_course->save();
         }
        // dd('test');
        return back()->with('status','Subject added');
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $subjects = Subjects::find($id);
       $syllabuses = Topic::where('subject_id', $id)->get();

       return view('syllabus.index')->
            with([
                'subjects' => $subjects,
                'syllabuses' => $syllabuses
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if(Auth::user()->role_id != '1'){
             return view('subjects.index')->with('error','Unauthorized Page');
         
         }
        
        else if(Auth::user()->role_id == '4'){
            return view('subjects.assignlecturer')
                ->with([
                'subjects' => Subjects::find($id), 
            ]);
             
         
         }
        
        else{
              return view('subjects.update')
            ->with([
                'subjects' => Subjects::find($id), 
                'subj_courses' => SubjectCourse::all(), 
                'courses' => Course::all()
            ]);
        
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'course_id' => 'required',
            'subjectname' => 'required',
            'description' => 'required',
            'yearlevel' => 'required'
        ]);
        foreach($request->course_id as $course)
        {
        //   Subjects Tables
                    
           $subject = Subjects::find($id);
           $subject->course_id = $course;
           $subject->name = $request->subjectname;
           $subject->description = $request->description;
           $subject->year_level = $request->yearlevel;
           $subject->user_id = Auth::user()->id;
           $subject->save();
        //   Subjects Courses
           $subj_course = SubjectCourse::find($id);
           $subj_course->subject_id = $subject->id;
           $subj_course->course_id = $course;
           $subj_course->save();
         }
        // dd('test');
        return back()->with('status','Subject updated');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //    Subjects::where('id', $request->subject_id_delete)->delete();
        // return back()->with('status','Subject deleted');
    }

    public function delete(Request $request){
        Subjects::where('id', $request->subject_id_delete)->delete();

        return back();
    }
}
