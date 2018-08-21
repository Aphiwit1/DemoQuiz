@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-3">
            <h1 >Quiz Manager</h1>
            </div>
            <div class="col-md-9">
                    <a href="#" class="btn btn-success float-right">Add Quiz</a>
                </div>   
    </div>
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th style="font-size: 1em;">Title</th>
                <th>Description</th>
                <th>Date</th>
                <th style="width:50px;">Subject</th>
                <th style="width:50px;">Group</th>
                <th style="width:50px;">Type</th>
                <th style="width:50px;">Status</th>
                <th></th>
                

            </tr>

            <tbody>
                    @foreach($quizzes as $q)
                <tr>
                        <td style="font-size: 0.8em;">{{$q->title}}</td>
                        <td style="font-size: 0.8em;">{{$q->description}}</td>
                        <td style="font-size: 0.8em;">{{$q->quiz_date}}</td>
                        <td style="font-size: 0.8em;">{{$q->subject_id}}</td>
                        {{-- name is from group_name --}}
                        <td>{{$q->group_name}}</td>
                        <td>{{$q->type_name}}</td>  
                        <td>{{$q->status_name}}</td>
                        
                    

                        <td >
                            <a href="#" class="btn btn-info ">View</a>
                            <a href="#" class="btn btn-warning ">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                     
                        
                </tr>
                     @endforeach
            </tbody>
 
        </table>
        
         
         <hr>
    </div>


</div>
@endsection