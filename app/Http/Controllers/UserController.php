<?php

namespace App\Http\Controllers;

use App\User;
use App\Subject;
use App\Subject_user;
use DB;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = Auth::user()->username;

        $user = DB::table('users')
        // ->join('Group_user','Group_user.username','=','users.username')
        // ->join('Groups','Groups.groups_id','=','Group_user.groups_id')
        // ->where('users.username', '=', $username)
        ->get();

           
        return view('admin/user/index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = DB::table('Subjects')->select('subject_id','subject_name')->get();
        $student_group = DB::table('Student_group')->select('student_group_id','student_group_name')->get();
        $user = DB::table('users')->select('username')->orderBy('username','ASC')->get();
     
        
        return view('admin/user/addUser',compact('subject','student_group','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $first_student = $request->user;
        $last_student = $request->user2;
        $subject_id = $request->subject;

        $query = DB::table('users')->select('username')->whereBetween('username',[$first_student,$last_student])->get();

        foreach($query as $student){
            Subject_user::insert([
                'subject_id'=> $subject_id,
                'username'=> $student->username,
                'student_group_id'=> $request->student_group
            ]);
        }
        
        return 1;
        
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


    public function viewStudent($username)
    {
        $subject_user = DB::table('subjects_user')
        ->join('users','users.username','=','subjects_user.username')
        // ->join('Subjects','Subjects.subject_id','=','subjects_user.subject_id')
        ->join('Student_group','Student_group.student_group_id','=','subjects_user.student_group_id')
        ->where('users.username','=',$username)
        ->get();     
        
        dd($subject_user);

        return view('admin/user/viewUserInfo',compact('subject_user','username'));
    }
}
