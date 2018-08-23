@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-3">
            <h2 >Question Manager</h2>
            </div>
            <div class="col-md-9">
            <a href="{{ URL::to('quiz/addQuiz')}}" class="btn btn-success float-right">Add Quiz</a>
                </div>   
    </div>
    <div class="row">
        this is question
         
         <hr>
    </div>


</div>
@endsection
