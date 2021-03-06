<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UserController')->except(['delete','show1'])->middleware('auth');
Route::resource('courses','CourseController')->middleware('auth');
Route::resource('subjects','SubjectController')->middleware('auth');
Route::resource('syllabus','SyllabusController')->middleware('auth');



Route::get('users/request','PendingRequestController@index');


Route::resource('topic','TopicController');

Route::get('syllabus/create/{id}','SyllabusController@create');
Route::get('subjects/{id}','subjects@show');

Route::post('syllabus/store', 'SyllabusController@store');

Route::get('syllabus/edit/{syllabus_id}/{subject_id}', 'TopicController@edit');

Route::post('syllabus/update', 'TopicController@updateSyllabus');
Route::post('syllabus/destroy', 'TopicController@destroy');

Route::get('sujects/assign-lecturer/{subject_id}', 'LearningResourcesConroller@showAssign');
Route::post('subjects/assign-lecturer', 'LearningResourcesConroller@update');

Route::get('learning-resources/subject/{subject_id}', 'LearningResourcesConroller@showSubjectTopic');
Route::get('learning-resources/subject/create/{id}','LearningResourcesConroller@create');
Route::get('learning-resources/subject/update/{id}','LearningResourcesConroller@updateShow');
Route::post('learning-resources/subject/create','SubjectTopicController@store');
Route::get('learning-resources/subject/details/{subject_id}/{syllabus_id}/{topic_id}','SubjectTopicController@showSubjectTopicDetails');
Route::get('learning-resources', 'LearningResourcesConroller@index');

// Route::get('ica-subjects', 'SubjectController@showICA')

Route::resource('learningresources','LearningResourcesConroller');
Route::resource('subjecttopic','SubjectTopicController');
Route::resource('dashboard','DashboardController');



Route::get('exams/{subject_id}', 'ExamController@index')->middleware('auth');
Route::get('exams/addquestion/{subject_id}', 'ExamController@create');
Route::post('exams/store', 'ExamController@store');
Route::get('exams/updatequestion/{subject_id}/{exam_id}', 'ExamController@update');
Route::post('exams/update', 'ExamController@updateExam');
Route::post('exams/delete', 'ExamController@delete');
Route::post('exams/put-answer', 'ExamController@putAnswer');


Route::get('quiz/{subject_id}/{syllabus_id}', 'QuizController@index');
Route::get('quiz/add-question/{subject_id}/{syllabus_id}', 'QuizController@create');
Route::post('quiz/store', 'QuizController@store');
Route::get('quiz/update-question/{subject_id}/{syllabus_id}/{question_id}', 'QuizController@update');
Route::post('quiz/updateQuiz', 'QuizController@updateQuiz');
Route::post('quiz/delete', 'QuizController@delete');
Route::post('quiz/put-answer', 'QuizController@putAnswer');

Route::post('subject/delete', 'SubjectController@delete');

Route::get('reports/user', 'ReportsController@userReport');
Route::get('reports/subject', 'ReportsController@subjectReport');
Route::get('reports/course', 'ReportsController@courseReport');
Route::get('reports/learningresources', 'ReportsController@learningresourcesReport');
Route::get('reports/learningresources/{subject_id}', 'ReportsController@learningresourcesReportSyllabus');
Route::get('reports/learningresources/{subject_id}/{syllabus_id}', 'ReportsController@learningresourcesReportTopic');
Route::get('reports/quiz', 'ReportsController@quizReport');
Route::get('reports/quiz/stats', 'ReportsController@quizStatsReport');


Route::get('logout', function(){
  Auth::logout();
  return redirect('/');
});

