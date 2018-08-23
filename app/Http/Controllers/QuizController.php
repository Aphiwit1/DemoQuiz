<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Quiz;
use DB;
use Input;
use Config;
use Form;
use Html;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Auth::user()->username;
       
        
        // $data = Quiz::all();
        $quizzes = DB::table('quizs')
                ->join('Subjects', 'quizs.subject_id', '=', 'Subjects.subject_id')
                ->join('Quiz_types','Quiz_types.quizs_types_id','=','quizs.quizs_types_id')
                ->join('subjects_user','subjects_user.subject_id','=','Subjects.subject_id')
                ->join('users','users.username','=','subjects_user.username')
                ->join('Quiz_status','Quiz_status.quizs_status_id','=','quizs.quizs_status_id')
                ->join('Groups_quizs','Groups_quizs.quizs_id','=','quizs.quizs_id')
                ->join('Groups','Groups.groups_id','=','Groups_quizs.groups_id')
                ->where('users.username', '=', $username)
                ->get();
        
        return view('quiz/index',compact('quizzes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('quiz/addQuiz');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
       
          $quiz = new Quiz([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'quiz_date' => $request->get('quiz_date'),
            'subject_id' => $request->get('subject_id'),
            'groups_id' => $request->get('groups_id'),
            'quizs_types_id' => $request->get('quizs_types_id'),
            'quizs_status_id' => $request->get('quizs_status_id'),
          ]);
         
          $quiz->save();
          return redirect()->route('quiz.index');
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
