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


    public function __construct()
    {
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$quizs_id)
    {
      
        $permission = $request->get('permission');

        $question = DB::table('Questions')
            // ->join('Question_types','Question_types.questions_types_id','=','Questions.questions_types_id')
            ->join('quizs','quizs.quizs_id','=','Questions.quizs_id')
            ->join('Answer','Answer.questions_id','=','Questions.questions_id')
            ->join('Choice','Choice.questions_id','=','Questions.questions_id')
            ->join('choice_type','choice_type.choice_type_id','=','Choice.choice_type_id')
            ->where('quizs.quizs_id','=',$quizs_id)
            ->get();
        
        if($permission == 'ADMIN'){
            return view('question/index',compact('question',$quizs_id));       
        }else{
            return view('student/student_question/index',compact('question',$quizs_id));
        }
          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$quizs_id)
    {
        
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


    //test choice 
    public function callMultiple($id){
        return view('choiceType.addMultiple');
    }
    
    public function callTF($id){
        return view('choiceType.addTF');
    }
    public function callBlank($id){
        return view('choiceType.addBlank');
    }


    public function storeChoice(Request $request,$quizs_id)
    {
       
    //  for($i=1; $i<count($request->get('question'));$i++){
        
    //  }

       

        $question = Question::insert([
            // 'number' => $request->get('number'),
            // 'question' => $request->get('question'), //question mean question descritpion
            
            'score' => $request->get('score'),
        ]);
        $question->save();

        $choice = Choice::insert([
            //choice means choice text
            'choice' => $request->get('choice')
        ]);
        $choice->save();


        return redirect()->route('question.index');
    }
}
