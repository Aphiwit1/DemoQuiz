<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\User;
use App\Quiz;
use App\Group_quiz;
use App\Group;
use App\Question;
use App\Quiz_status;
use App\Quiz_type;
use App\Subject_user;
use App\Subject;

use DB;
use Input;
use Config;
use Form;
use Html;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Auth::user()->username;

        $subject = DB::table('Subjects')
        ->join('quizs','quizs.subject_id','=','Subjects.subject_id')
        ->join('subjects_user.subject_id','=','Subjects.subject_id')
        ->join('users.username','=','subjects_user.username')
        ->where('users.username', '=', $username)
        ->get();

        return view('subject/index',compact('subject'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject/addSubject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject([
            'subject_id' => $request->get('subject_id'),
            'subject_name' => $request->get('subject_nmame')
        ]);

        $subject->save();
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
