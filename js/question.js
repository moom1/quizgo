class question {

  constructor(statement, a) {
    this.statement = statement;
    this.a = a;
  }


}

var questions = new Array();
function addQuestion(questions, s,a){
  var q = new question(s,a)
  this.questions.push(q)

}

function numbOfQuestions(num){
  var myDiv = document.getElementById("form1");

  //Create and append the options
  for (var i = 0; i < this.num; i++) {
      myDiv.appendChild(option);
  }



}

$(document).ready(function(e){
        $("#build").click(function(e){
          var newId = $('.row').length + 1;

          $(".container")
          .append('<div class="row"><input type="text" id="ip' + newId+'" class="ip1"> '+
         '<input type="text" id="ip'+newId+'" class="ip1"> '+
         '<input type="button" value="Delete" id="del'+newId+'" class="del"></div>');
        });
   $(document).on('click','.del', function(){
     $(this).closest('.row').remove();
  })
     });
