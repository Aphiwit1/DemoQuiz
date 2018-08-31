@extends('layouts.main')

@section('content')
<div class="container">
        @foreach($subject_user as $subject_user)
    <div class="row mb-2">
        <div class="col-md-3">
        <h2 >User {{$subject_user->username}}</h2>
            </div>
            <div class="col-md-9">
         
            </div>   
    </div>


    <div class="row">
            <table class="table table-bordered">
                <tr>
                    <th style="font-size: 1em;width:30px;">Username</th>
                    <th style="width:50px;">Remark</th>
                    <th style="width:50px;">Firstname</th>
                    <th style="width:50px;">Lastname</th>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>Student Group</th>
                    <th style="width:100px;"></th>
                </tr>
                <tbody>
                    <tr>
                        <td style="font-size: 0.8em;">{{$subject_user->username}}</td>
                        <td style="font-size: 0.8em;">{{$subject_user->remark}}</td>
                        <td style="font-size: 0.8em;">{{$subject_user->firstname}}</td>
                        <td style="font-size: 0.8em;">{{$subject_user->lastname}}</td>
                        <td style="font-size: 0.8em;">{{$subject_user->subject_id}}</td>
                        <td style="font-size: 0.8em;">{{$subject_user->subject_name}}</td>
                        <td style="font-size: 0.8em;">{{$subject_user->student_group_name}}</td>
                        <td >
                                <a href="#" class="btn btn-info btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                 
                </tbody>
            </table>
            
             <hr>
        </div>
        @endforeach
</div> 

 @endsection

