<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Quiz;
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
    public function __construct()
    {
        $this->middleware('Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->get('permission'));
        $permission = $request->get('permission');
        //ประกาศไว้เพราะ Auth จาก username มาก่อน 
        $username = Auth::user()->username;
        
         // $data = Quiz::all();
        $subjects = DB::table('Subjects')
        ->join('subjects_user','subjects_user.subject_id','=','Subjects.subject_id')
        ->join('users','users.username','=','subjects_user.username')
        ->where('users.username', '=', $username)
        ->get();

        if($permission == 'ADMIN'){
            return view('subject/index',compact('subjects','permission'));
        }else{
            return view('student/student_subject/index',compact('subjects','permission'));
        }
        
        
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
        $username = Auth::user()->username;
    
        $subject = Subject::insert([
                    'subject_id' => $request->get('subject_id'),
                    'subject_name' => $request->get('subject_name')
                ]);
         
        $subject_user = Subject_user::insert([
                'subject_id' => $request->get('subject_id'),
                'username' => $username
        ]);
        // $subject->save();
        return redirect()->route('subject.index');
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
       
        $subject = DB::table('Subjects')->where('subject_id','=',$id)->first(); //ดึงค่า subject_id ออกมาจาก db เพื่อนำค่าไปโชว์เพื่อแก้ไข 
        // $data = Subject::findorfail($id);
        // dd($data->subject_id);
        return view('subject/editSubject', compact('subject'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('subject_id_old'); //id sent by editQuiz.blade.php
        
        $subject = Subject::find($id); //หา id เก่า แล้วไปเปลี่ยน 
        $subject->subject_id = $request->get('subject_id');
        $subject->subject_name = $request->get('subject_name');
        $subject->save(); //เซฟ id อันใหม่ที่แก้แล้ว 
        $quiz = Quiz::where('subject_id','=',$id)  //ต้องไปบันทึกที่ quiz ด้วยเพราะมี subject_id 
                ->update([  
                    'subject_id' => $request->get('subject_id')
                ]);
        $subject_user = Subject_user::where('subject_id','=',$id) // ทำเช่นเดียวกับ quiz 
                ->update([
                    'subject_id' => $request->get('subject_id')
                ]);
           
        return redirect()->route('subject.index')->with('success', 'Data Updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Data Deleted');
    }
}