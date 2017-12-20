<?php

namespace App\Http\Controllers;
use App\Models\SubjectTopic;
use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          return view('subjecttopic.index')
            ->with(
                'subjects',Subjects::all()
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('subjecttopic.create')
            >with(
                'subjects',Subjects::all()
            );
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
            'title' => 'required',
            'note' => 'required',
        ]);
        //   Subjects Tables
           $subjecttopic = new SubjectTopic;
           
           $subjecttopic->subject_id= $request-> $subject->id;
           $subjecttopic->topic_title = $request->title;
           $subjecttopic->note = $request->note;
           $subjecttopic->user_id = Auth::user()->id;
           $subjecttopic->save();
        // dd('test');
        return back()->with('status','Subject Topic added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('subjecttopic.show');
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
    public function update(Request $request, $id)
    {
        //
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
}
