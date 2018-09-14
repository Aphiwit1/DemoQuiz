@extends('layouts.main')

@section('content')
<div class="container" > 



    <div class="row" id="app">
    <form action="{{URL::route('saveChoice')}}">
    {{ csrf_field() }}

                <div class="row mb-2">

                                <div class="col-md-4">
                                <h2 > Multiple Question</h2>
                                </div>
                    
                                <div class="col-md-8">
                                    <a href="#" class="btn btn-success btn-sm float-right" >Add Question</a>
                                </div>   
                </div>

               <div class="form-group col-md-12" >
             

                    {{-- Question 1 --}}
                    <div class="col-md-12">  
                            
                        <div class="row">
                                <div class="col-md-6 ">
                                        {{-- id question means question name --}}
                                        <label for="question">Plase Enter your Question:</label>
                                </div>

                                <div class="col-md-2">
                                        <button class="btn btn-primary btn-sm">Add Choice</button>
                                </div> 

                                <div class="col-md-2">
                                        <button class="btn btn-danger btn-sm">Delete choice</button>
                                </div> 
                        </div>

                        <div class="row mt-2">
                                {{-- <input type="text" class="form-control" id="#" name="#" value="" style="width:600px;"> --}}
                                {{-- question means question description --}}
                                <input style="width:600px;" id="question" type="text" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" name="question" value="{{ old('question') }}" required autofocus>
                                        @if ($errors->has('question'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('question') }}</strong>
                                        </span>
                                        @endif
                        </div>    
                         
                                
                            {{-- Multiple Choice --}}
                            
                        <div class="row">
                                <div class="mt-2">
                                        <div class="checkbox mt-3">
                                                <label><input type="checkbox" value="{{ old('choice_id')}}" name="choice_id">
                                                        {{-- choice means choice description --}}
                                                        <input type="text" value="{{old('choice')}}" name ="choice_name" required autofocus>
                                                </label>
                                        </div>
                                 </div>
                        </div>

                        <div class="row">
                                <div class="mt-2">
                                        <div class="checkbox mt-3">
                                                <label><input type="checkbox" value="{{ old('choice_id')}}" name="choice_id">
                                                        {{-- choice means choice description --}}
                                                        <input type="text" value="{{old('choice')}}" name ="choice_name" required autofocus>
                                                </label>
                                        </div>
                                </div>
                        </div>
                        
                        <div class="row">
                                <div class="mt-2">
                                        <div class="checkbox mt-3">
                                                <label><input type="checkbox" value="{{ old('choice_id')}}" name="choice_id">
                                                        {{-- choice means choice description --}}
                                                        <input type="text" value="{{old('choice')}}" name ="choice_name" required autofocus>
                                                </label>
                                        </div>
                                </div>
                        </div>

                        <div class="row">
                                        <div class="mt-2">
                                                <div class="checkbox mt-3">
                                                        <label><input type="checkbox" value="{{ old('choice_id')}}" name="choice_id">
                                                                {{-- choice means choice description --}}
                                                                <input type="text" value="{{old('choice')}}" name ="choice_name" required autofocus>
                                                        </label>
                                                </div>
                                        </div>
                        </div>        

                        <br>

                        {{-- score --}}
                        <div class="row">
                                <div class="col-md-10">
                                        <label for="question">Score:</label><br>
                                <input type="text"  value="{{old('score')}}" name="score" style="width:100px;">
                                </div>
                            </div>  
                            
        
                    </div> 

                    <hr>
                    <br>
                    
                     <button type="submit" class="btn btn-primary btn-lg float-right"><i class="fa fa-save"></i>Next -></button>
               </div>
        </form>
    </div>

</div>
  <script>
        var app = new Vue({
                el : '#app',
                data : {
                        choice : '4',
                        quiz : [], 
                },
                methods : {

                        addQuiz: function(choice){

                        var numQuiz = this.quiz.length + 1
                        var countChocie = []
                        for(var i=1; i<=this.choice;i++){
                            countChocie.push(i)
                        }

                        this.quiz.push({
                            'value':numQuiz,
                            'choice':countChocie
                        })

                }
                }

        })
  </script>

    @endsection