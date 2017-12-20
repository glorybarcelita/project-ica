<?php

namespace App\Http\Controllers;
use App\Models\Topic;
use App\Models\Subjects;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $count = Topics::count();
        return view('subjects.index')
                ->with([
                    'topics' => Subjects::all()
                   
                ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'syllabustopic' =>'required|unique:syllabus,name',
            'description' => 'required'
            ]);
            
            $syllabus= new Topic;
            $syllabus->subject_id= $request->subject_id;
            $syllabus->name= $request->syllabustopic;
            $syllabus->description= $request->description;
            $syllabus->save();
            return back()->width('status','Topic Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //    //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($syllabus_id, $subject_id)
    {
        return view('syllabus.update')->with([
                'syllabus' => Topic::find($syllabus_id),
                'subjects' => Subjects::find($subject_id)
            ]);
    }

    public function updateSyllabus(Request $request)
    {
        $syllabus = Topic::find($request->syllabus_id);
        $syllabus->name = $request->syllabustopic;
        $syllabus->description = $request->description;
        $syllabus->save();

        return back()->with('status','Syllabus updated');
    }

    // public function deleteSyllabus(Request $request){
    //     return $request->all();

    //     // Topic::where('id', $request->syllabus_id_delete)->delete();
    //     // return back()->with('status','Syllabus deleted');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        Topic::where('id', $request->syllabus_id_delete)->delete();
        return back()->with('status','Syllabus deleted');
    }
}
