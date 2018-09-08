@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-3">
            <h2 >Question Manager</h2>
            </div>
            <div class="col-md-9">
            {{-- <a href="{{ URL::to('multipleChoice/addMultipleChoice')}}" class="btn btn-success float-right">Add Question</a> --}}
            <div class="btn-group float-right">
                <button type="button" class="btn btn-success dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add Question
                </button>

                      
           
                <div class="dropdown-menu">
                    <a class="dropdown-item"  
                        href="{{ URL::to('choiceType/addMultiple/{id?}')}}">multipleChoice</a>
                    <a class="dropdown-item"  
                            href="{{ URL::to('/question/blankQuestion/{id?}')}}">BlankQuestion</a>
                    <a class="dropdown-item"  
                            href="{{ URL::to('/question/shortAnswer/{id?}')}}">shortAnswer</a>
                    <a class="dropdown-item" 
                            href="{{ URL::to('/question/UploadQuestion/{id?}')}}">UploadQuestion</a>
                        <a class="dropdown-item" href="#">TrueFalse</a>
                        
                </div>
               
    </div>       

            </div>   
    </div>
    <div class="row">
          

        {{-- <div class="col-md-12 mb-3" name="Blank">
           <a href="{{ URL::route('addQuestion', ['quizs_id'=>$quizs_id])}}" class="btn btn-success " value="1">
                Add Blank Question
            </a>
            <a href="{{ URL::to('multipleChoice/addMultipleChoice')}}" class="btn btn-success ml-2" value="2">
                Add Multiple Question
            </a>
            <a href="{{ URL::to('multipleChoice/addMultipleChoice')}}" class="btn btn-success ml-2" value="3">
                Add Short Question
            </a>
            <a href="{{ URL::to('multipleChoice/addMultipleChoice')}}" class="btn btn-success ml-2" value="4">
                Add True/False Question
            </a>
            <a href="{{ URL::to('multipleChoice/addMultipleChoice')}}" class="btn btn-success ml-2" value="5">
                Add Upload Question
            </a>
        </div> --}}

        <div class="dropdown-menu">
            <a class="dropdown-item"  
                    href="{{ URL::to('/question/blankQuestion/{id?}')}}">BlankQuestion</a>
            <a class="dropdown-item"  
                    href="{{ URL::to('/question/shortAnswer/{id?}')}}">shortAnswer</a>
            <a class="dropdown-item" 
                    href="{{ URL::to('/question/UploadQuestion/{id?}')}}">UploadQuestion</a>
            <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">TrueFalse</a>
        </div>
        
        @foreach($question as $questions)    
        
        <h1>{{$questions->questions_id}}</h1>
                
        @endforeach
    </div>


</div>
@endsection
