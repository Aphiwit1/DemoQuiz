<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Auth;
use Quiz;
use Answer;
use Choice;
use Choice_type;



class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($quizs_id)
    {
      

        $question = DB::table('Questions')
            // ->join('Question_types','Question_types.questions_types_id','=','Questions.questions_types_id')
            ->join('quizs','quizs.quizs_id','=','Questions.quizs_id')
            ->join('Answer','Answer.questions_id','=','Questions.questions_id')
            ->join('Choice','Choice.questions_id','=','Questions.questions_id')
            ->join('choice_type','choice_type.choice_type_id','=','Choice.choice_type_id')
            ->where('quizs.quizs_id','=',$quizs_id)
            ->get();

            return view('question/index',compact('question',$quizs_id));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$quizs_id)
    {
        //
        // if($request->get('type') == 1){
        //     return view('question/index',compact('question')); 
        // }else if($request->get('type') == 2){
        // }
        if($request->get('value') == 1){
            return view('choiceType/addBlank',compact('quizs_id')); 
        }else if($request->get('value') == 2){
            return view('choiceType/addMultiple',compact('quizs_id')); 
        }else if($request->get('value') == 3){
            return view('choiceType/addShort',compact('quizs_id')); 
        }else if($request->get('value') == 4){
            return view('choiceType/addTF',compact('quizs_id')); 
        }else if($request->get('value') == 5){
            return view('choiceType/addUpload',compact('quizs_id')); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        
    }


    //test 
    public function callMultiple($id){
        return view('choiceType.addMultiple');
    }
    
    public function callTF($id){
        return view('choiceType.addTF');
    }
    public function callBlank($id){
        return view('choiceType.addBlank');
    }
}
