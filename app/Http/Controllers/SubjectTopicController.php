<?php

namespace App\Http\Controllers;
use App\Models\SubjectTopic;
use App\Models\Topic;
use App\Models\Subjects;
use App\Models\TopicVideo;
use Auth;
use Storage;
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
           
           $subjecttopic->syllabus_id= $request->syllabus_id;
           $subjecttopic->subject_id= $request->subject_id;
           $subjecttopic->topic_title = $request->title;
           $subjecttopic->note = $request->note;
           $subjecttopic->user_id = Auth::user()->id;
           $subjecttopic->save();

           foreach ($request->links as $link) {
               $video = new TopicVideo;
               $video->link = $link;
               $video->subject_topic_id = $subjecttopic->id;
               $video->save();
           }
           $files = $request->file('docs');
           if(count($files) > 0){
              foreach ($files as $file) {
                  Storage::putFileAs(
                       'public/subjects/topic/'.$subjecttopic->id, $file, $file->getClientOriginalName()
                   );
              }
          }
           
        // dd('test');
        return back()->with('status','Subject Topic added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showSubjectTopicDetails($subject_id, $syllabus_id, $topic_id)
    {
        $file_dir = '/subjects/topic/'.$topic_id;
        $files = Storage::disk('public')->allFiles($file_dir);

        return view('subjecttopic.show')
            ->with([
                'subject'=>Subjects::find($subject_id),
                'syllabus'=> Topic::find($syllabus_id),
                'topic'=>SubjectTopic::find($topic_id),
                'vid_links'=>TopicVideo::where('subject_topic_id', $topic_id)->get(),
                'file_count'=>$files
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
