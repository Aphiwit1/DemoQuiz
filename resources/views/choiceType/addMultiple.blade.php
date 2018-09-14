
            <div class="container" id="app">
                    <form action="">
                            {{ csrf_field() }}
                                   <div class="form-group col-md-12">
                           
                                        <div class="col-md-12">  
                                                 
                                            <div class="row">
                                                    <div class="col-md-6 ">
                                                            <label for="question">Plase Select Number of Choice:</label>
                                                            <input class="form-control" type="text" v-model="choice">
                                                    </div>
                           
                                                    <div class="col-md-2">
                                                            <button type="button" class="btn btn-primary btn-sm" v-on:click="addQuiz(this.choice)">Add Choice</button>
                                                    </div> 
                           
                                                    <div class="col-md-2">
                                                            <button class="btn btn-danger btn-sm">Delete choice</button>
                                                    </div> 
                                            </div>
               
                                            <br>
               
                                           <div class="row">
                                               <div class="mt-2" v-for="quizs in quiz">
                                                           <div class="row">
                                                                  
                                                                   <input style="width:600px;" id="question" type="text" class="form-controls" name="question" value="" >
                                                                  
                                                           </div>
               
                                                           <div class="row" v-for="ch in quizs.choice">
                                                               
                                                                   <div class="mt-2">
                                                                           <div class="checkbox mt-3">
                                                                                   <label><input type="checkbox" value="" name="choice_id">
               
                                                                                           <input type="text" value="" name ="choice_name" s>
                                                                                   </label>
                                                                           </div>
                                                                   </div>
                                                           </div> 
               
                                                           <div class="row">
                                                               <div class="col-md-10">
                                                                       <label for="question">Score:</label><br>
                                                               <input type="text"  value="" name="score" style="width:100px;">
                                                               </div>
                                                            </div> 
                                                           <br><br><br>
                                               </div>  
                                           </div>
                                        </div> 
                           
                                        <hr>
                                        <br>
                                        
                                         <button type="submit" class="btn btn-primary btn-lg float-right"><i class="fa fa-save"></i>Next -></button>
                                   </div>
                               </form>
            </div>
            

        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script>
            var vm = new Vue({
                el: '#app',
                data: {
                    choice: '4',
                    quiz: [],

                },
                methods: {
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


