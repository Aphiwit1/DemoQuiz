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

//quiz
Route::get('/quiz/{subject_id?}','QuizController@index')->name('quiz.index'); //name use for redirect in update

//subject
Route::get('/subject','SubjectController@index')->name('subject.index'); //name for reditect in update
// Route::get('/subject',['middleware'=>'Admin:user','uses'=>'SubjectController@index'])->name('subject.index');

//question 
Route::get('/question/{id?}','QuestionController@index')->name('question.index'); //name for reditect in update

//testChoice
Route::get('/choiceType/addMultiple/{id?}','QuestionController@callMultiple');

//saveMultipleChoice 
Route::get('/choiceType/saveChoice/{id?}','QuestionController@storeChoice')->name('saveChoice');

// Route::get('//choiceType/AnswerChoice/{id?}','QuestionController@storeChoice')
Route::get('/choiceType/addTF/{id?}','QuestionController@callTF');
Route::get('/choiceType/addBlank/{id?}','QuestionController@callBlank');






Route::group(['middleware' => ['Admin']], function () {
        //subject 
        Route::get('/subject/addSubject','SubjectController@create');
        Route::post('/subject/saveSubject','SubjectController@store');
        Route::get('/subject/editSubject/{id?}','SubjectController@edit');
        Route::post('/subject/updateSubject','SubjectController@update');
        Route::get('/subject/deleteSubject/{id?}','SubjectController@destroy');

        //quiz
        Route::get('/quiz/addQuiz/{subject_id?}','QuizController@create')->name('addQuiz');
        Route::post('/quiz/saveQuiz/{subject_id?}','QuizController@store');
        Route::get('/quiz/editQuiz/{subject_id?}','QuizController@edit');
        Route::post('/quiz/updateQuiz','QuizController@update');
        Route::get('/quiz/deleteQuiz/{id?}/{subject_id?}','QuizController@destroy');

        //question
        Route::get('/choiceType/{quizs_id?}','QuestionController@create')->name('addQuestion');

        //usser manager for admin
        Route::get('/userManager','UserController@index')->name('userManager.index'); //name for reditect in update
        Route::get('/userManager/viewUserInfo/{username?}','UserController@viewStudent');
        Route::get('/userManager/addUser','UserController@create');
        Route::post('/userManager/saveUser','UserController@store')->name('saveUser');
        Route::get('/userManager/delete/{id?}','UserController@destroy');

});








