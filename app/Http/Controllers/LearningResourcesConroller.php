<?php

namespace App\Http\Controllers;
use App\Models\Subjects;
use App\Models\SubjectTopic;
use App\User;
use App\Models\Course;
use App\Models\SubjectCourse;
use App\Models\Topic;
use App\QuizRecord;
use Auth;
use Storage;
use Illuminate\Http\Request;

class LearningResourcesConroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == '2'){
            return view('learningresources.index')
                ->with([
                    'subjects'=>Subjects::all(),
                    'lecturers' => User::all(),
                    'subjectsList'=>SubjectCourse::all()
                ]);
        }
        else if(Auth::user()->role_id == '3'){
            return view('learningresources.index')
                ->with([
                    'subjects' => Subjects::where('user_id', '=', Auth::user()->id)->get(),
                    'lecturers' => User::all(),
                    'subjectsList'=>SubjectCourse::all()
                ]);
         }
         else{
            $user = User::find(Auth::user()->id);

            return view('learningresources.index')
                ->with([
                    'subjectsLists' => $subject_course = SubjectCourse::where('course_id', $user->course)->get(),
                    'subjects' => Subjects::all(),
                    'lecturers' => User::all()
                ]);
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('subjecttopic.create')->with(['subject_id'=>$id, 'syllabuses'=>Topic::where('subject_id', $id)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
         return view('subjecttopic.index')->with('subjects', $subjects);
    }

    public function showAssign($subject_id){
        return view('subjects.assignlecturer')
            ->with([
                'subject' => Subjects::find($subject_id), 
                'users' => User::where('role_id', 3)->get()
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $subj_lecturer = Subjects::find($request->subject_id);
        $subj_lecturer->user_id = $request->lecturer_id;
        $subj_lecturer->save();

        return back()->with('status','Lecturer updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showSubjectTopic($subject_id){
        return view('subjecttopic.index')
            ->with([
                'topics' => Topic::where('subject_id', $subject_id)->get(),
                'subject'=> Subjects::find($subject_id),
                'subject_id' => $subject_id,
                'subject_topics' => SubjectTopic::where('subject_id', $subject_id )->get(),
                'quiz_record' => QuizRecord::where('student_id', Auth::user()->id)->get() 
             ]);
    }
}
