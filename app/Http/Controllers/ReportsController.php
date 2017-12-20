<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subjects;
use App\Models\SubjectCourse;
use App\Models\SubjectTopic;
use App\Models\Topic;
use App\User;
use App\Quiz;

class ReportsController extends Controller
{
      
    public function userReport()
    {
        return view('reports.userReport');
                
        
    }

    public function subjectReport()
    {
        return view('reports.subjectReport')
            ->with([
                'subjects'=>Subjects::all(),
                'subj_courses'=>SubjectCourse::all(),
                'courses'=>Course::all(),
                'lecturers'=>User::all()
            ]);
                
        
    }

     public function courseReport()
    {
        return view('reports.courseReport')
            ->with([
                'courses'=>Course::all()
            ]);
                
        
    }
      public function learningresourcesReport()
    {
        return view('reports.learningResources')
            ->with([
                'subjects'=>Subjects::all(),
                'subj_courses'=>SubjectCourse::all(),
                'syllabuses'=>Topic::All(),
                'courses'=>Course::all(),
                'lecturers'=>User::all(),
                'topics'=>SubjectTopic::all()
            ]);
    }

     public function quizReport()
    {
        return view('reports.quizReport')
            ->with([
                'quizes'=>Quiz::all(),
                'subjects'=>Subjects::all(),
                'syllabuses'=>Topic::all()
            ]);
    }

     public function quizStatsReport()
    {
        return view('reports.quizStats');
    }

    public function learningresourcesReportSyllabus($subject_id){
        $subjects = Subjects::find($subject_id);
        return view('reports.learningResourcesTopic')
            ->with([
                'subjects'=>Subjects::find($subject_id),
                'syllabuses'=>Topic::where('subject_id', $subject_id)->get(),
                'subj_courses'=>SubjectCourse::all(),
                'courses'=>Course::all(),
                'topics'=>SubjectTopic::all()
            ]);
    }
    public function learningresourcesReportTopic($subject_id, $syllabus_id){
        $subjects = Subjects::find($subject_id);
        return view('reports.learningResourcesTopic1')
            ->with([
                'subjects'=>Subjects::find($subject_id),
                'syllabuses'=>Topic::where('subject_id', $subject_id)->get(),
                'subj_courses'=>SubjectCourse::all(),
                'courses'=>Course::all(),
                'topics'=>SubjectTopic::where('syllabus_id', $syllabus_id)->get(),
            ]);
    }
}
