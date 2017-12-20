<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Exam;
use App\User;
use App\ExamChoices;
use App\ExamRecord;
use Auth;

class ExamController extends Controller
{
    public function index($subject_id){
        if(Auth::user()->role_id == 4){
            return view('exams.index')
            ->with([
                'subject' => Subjects::find($subject_id),
                'questions' => Exam::where('subject_id', $subject_id)->orderByRaw('RAND()')->take(50)->get(),
                'choices' => ExamChoices::all(),
                'lecturers'=>User::where('role_id', 3)->get()
            ]);
        }
        else{
            return view('exams.index')
                ->with([
                    'subject' => Subjects::find($subject_id),
                    'questions' => Exam::where('subject_id', $subject_id)->get(),
                    'choices' => ExamChoices::all(),
                    'lecturers'=>User::where('role_id', 3)->get()
                ]);
        }
      
    }


    public function create($subject_id){
      return view('exams.create-exam')
        ->with([
            'subject' => Subjects::find($subject_id),
            'questions' => Exam::find($subject_id)
        ]);
    }

    public function store(Request $request){
        $insert_exam = new Exam;
        $insert_exam->subject_id=$request->subject_id;
        $insert_exam->question=$request->examquestion;
        $insert_exam->save();

        foreach ($request->answer as $key=>$answer) {
            $inser_exam_choice=new ExamChoices;
            $inser_exam_choice->exam_id = $insert_exam->id;
            $inser_exam_choice->choices = $answer;
            $inser_exam_choice->is_correct = $request->is_correct[$key];
            $inser_exam_choice->save();
        }
        return back()->with('status','Exam question added.');
    }

    public function update($subject_id, $exam_id){
        $exam=Exam::find($exam_id);
        $exam_choice_id=$exam->id;
      return view('exams.update-exam')
        ->with([
            'subject' => Subjects::find($subject_id),
            'questions' => Exam::find($exam_id),
            'choices'=>ExamChoices::where('exam_id', $exam_choice_id)->get()
        ]);
    }

    public function updateExam(Request $request){
        Exam::where('id', $request->exam_id)
            ->update(['question'=>$request->examquestion]);

        ExamChoices::where('exam_id', $request->exam_id)
            ->delete();

        foreach ($request->answer as $key=>$answer) {
            $inser_exam_choice=new ExamChoices;
            $inser_exam_choice->exam_id = $request->exam_id;
            $inser_exam_choice->choices = $answer;
            $inser_exam_choice->is_correct = $request->is_correct[$key];
            $inser_exam_choice->save();
        }
        return back()->with('status','Exam question updated.');
    }

    public function delete(Request $request){
        Exam::where('id', $request->exam_id_delete)->delete();

        ExamChoices::where('exam_id', $request->exam_id_delete)->delete();

        return back();
    }

    public function putAnswer(Request $request){
      $count_pass = 0;
      $status = '';
      foreach ($request->question_id as $key => $question_id) {
        $count = Exam::find($question_id);
        
        if($request->correct_ans[$key] == $request->student_ans[$key]){
          $count = $count->correct_count;
          $count_pass = $count_pass + 1;
          Exam::where('id', $question_id)->update(['correct_count' => $count+1]);
        }else{
          $count = $count->wrong_count;
          Exam::where('id', $question_id)->update(['wrong_count'=> $count+1]);
        }
      }

        if($count_pass >= 7){
          $status = 'pass';
        }
        else{
          $status = 'fail';
        }
        
        $countQuizRecord = ExamRecord::where('student_id', Auth::user()->id)->count();
        if($countQuizRecord >=1){
          ExamRecord::where('student_id', Auth::user()->id)->delete();
        }

        $quiz_record = new ExamRecord;
        $quiz_record->quiz_id = $request->subject_id;
        $quiz_record->student_id = Auth::user()->id;
        $quiz_record->lecturer_id = $request->lecturer_id;
        $quiz_record->pass_fail = $status;
        $quiz_record->save();

        // return back();

      return redirect()->action(
          'LearningResourcesConroller@showSubjectTopic', ['subject_id' => $request->subject_id]
      );
    }
}
