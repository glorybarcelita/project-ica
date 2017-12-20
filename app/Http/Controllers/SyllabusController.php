<?php

namespace App\Http\Controllers;
use App\Models\Syllabus;
use App\Models\Subjects;
use App\Models\Topic;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('syllabus.index')
                ->with([
                    'subjects' => Subjects::all(), 
                    'syllabus' => Syllabus::all()
                ]);
                
    }

    /**
     * Show the form for creating a new resource.
     *
     // * @return \Illuminate\Http\Response
     */
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
       return view('syllabus.create')
            ->with(
                ['subjects' => Subjects::find($id)]
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
            'syllabustopic' =>'required|unique:syllabus,name',
            'description' => 'required'
            ]);
            
            $syllabus= new Topic;
            $syllabus->subject_id= $request->subject_id;
            $syllabus->name= $request->syllabustopic;
            $syllabus->description= $request->description;
            $syllabus->save();
            return back()->with('status','Topic Added');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
