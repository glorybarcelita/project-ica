<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subjects;
use App\Models\Topic;
use App\User;
use App\Quiz;
use App\QuizChoices;
use App\QuizRecord;
use Auth;

class QuizController extends Controller
{
    public function index($subject_id, $syllabus_id){
      $syllabus = Topic::find($syllabus_id);
      if(Auth::user()->role_id == 4){
        return view('quizes.index')
        ->with([
          'lecturers'=>User::where('role_id', 3)->get(),
          'subject'=>Subjects::find($subject_id),
          'syllabus'=>Topic::find($syllabus_id),
          'questions'=>Quiz::where('syllabus_id', $syllabus->id)->orderByRaw('RAND()')->take(10)->get(),
          'choices'=>QuizChoices::all()
        ]);
      }
      else{
        return view('quizes.index')
        ->with([
          'lecturers'=>User::where('role_id', 3)->get(),
          'subject'=>Subjects::find($subject_id),
          'syllabus'=>Topic::find($syllabus_id),
          'questions'=>Quiz::where('syllabus_id', $syllabus->id)->get(),
          'choices'=>QuizChoices::all()
        ]);
      }
      
    }

    public function create($subject_id, $syllabus_id){
      return view('quizes.create-quiz')
      ->with([
          'subject'=>Subjects::find($subject_id),
          'syllabus'=>Topic::find($syllabus_id)
        ]);
    }

    public function store(Request $request){
      $insert_quiz = new Quiz;
      $insert_quiz->syllabus_id=$request->syllabus_id;
      $insert_quiz->question=$request->quizquestion;
      $insert_quiz->save();

      foreach ($request->answer as $key=>$answer) {
        $insert_quiz_answer = new QuizChoices;
        $insert_quiz_answer->quiz_id = $insert_quiz->id;
        $insert_quiz_answer->choices = $answer;
        $insert_quiz_answer->is_correct = $request->is_correct[$key];
        $insert_quiz_answer->save();
      }

      return back()->with('status','Quiz question added.');

    }

    public function update($subject_id, $syllabus_id, $question_id){
      $quiz = Quiz::find($question_id);
      return view('quizes.update-quiz')
      ->with([
          'subject'=>Subjects::find($subject_id),
          'syllabus'=>Topic::find($syllabus_id),
          'questions'=>Quiz::find($question_id),
          'choices'=>QuizChoices::where('quiz_id', $quiz->id)->get()
        ]);
    }

    public function updateQuiz(Request $request){
        Quiz::where('id', $request->quiz_id)
            ->update(['question'=>$request->quizquestion]);

        QuizChoices::where('quiz_id', $request->quiz_id)
            ->delete();

        foreach ($request->answer as $key=>$answer) {
            $inser_exam_choice=new QuizChoices;
            $inser_exam_choice->quiz_id = $request->quiz_id;
            $inser_exam_choice->choices = $answer;
            $inser_exam_choice->is_correct = $request->is_correct[$key];
            $inser_exam_choice->save();
        }
        return back()->with('status','Quiz question updated.');
    }

    public function delete(Request $request){
      Quiz::where('id', $request->quiz_id_delete)->delete();
      QuizChoices::where('quiz_id', $request->quiz_id_delete)->delete();
      return back();
    }

    public function putAnswer(Request $request){
      $count_pass = 0;
      $status = '';
      foreach ($request->question_id as $key => $question_id) {
        $count = Quiz::find($question_id);
        
        if($request->correct_ans[$key] == $request->student_ans[$key]){
          $count = $count->correct_count;
          $count_pass = $count_pass + 1;
          Quiz::where('id', $question_id)->update(['correct_count' => $count+1]);
        }else{
          $count = $count->wrong_count;
          Quiz::where('id', $question_id)->update(['wrong_count'=> $count+1]);
        }
      }

        if($count_pass >= 7){
          $status = 'pass';
        }
        else{
          $status = 'fail';
        }

        $countQuizRecord = QuizRecord::where('quiz_id', $request->subject_id)->count();
        if($countQuizRecord >=1){
          QuizRecord::where('quiz_id', $request->subject_id)->delete();
        }

        $quiz_record = new QuizRecord;
        $quiz_record->quiz_id = $request->subject_id;
        $quiz_record->student_id = Auth::user()->id;
        $quiz_record->lecturer_id = $request->lecturer_id;
        $quiz_record->pass_fail = $status;
        $quiz_record->save();

      return redirect()->action(
          'LearningResourcesConroller@showSubjectTopic', ['subject_id' => $request->subject_id]
      );
    }
}
