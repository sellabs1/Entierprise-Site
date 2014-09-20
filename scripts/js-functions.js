function change(){
	document.getElementById("select-table-form").submit();
}

function deleteRecord(id){

	var answer = confirm('Are you sure you want to delete this record?');
	if(answer){
		
	}
}

$(document).ready(function(){
	$("#regUsername").keyup(function (e) { //user types username on inputfiled

   		var username = $(this).val(); //get the string typed by user

   		$.post('usernameCheck.php', {'username':username}, function(data) { //make ajax call to usernameCheck.php
  			if(data == "1"){
  				$("#user-result").html("<img src='../images/userExists.gif' />").fadeIn();
  				$('#button').prop('disabled', true);
  			}
  			else{
  				$("#user-result").html("<img src='../images/userAvailable.gif' />").fadeIn();
  				$('#button').prop('disabled', false);
  			} 
   		});
	});

	$("#confPass").on('keyup', function(){
		var pass = $("#pass").val();
		var confPass = $("#confPass").val;
		var button = $('#button');

		if(pass != confPass){
			$("#pass-result").html("<img src='../images/passMatch.gif' />").fadeIn();
			button.prop('disabled', true);
		}
		else{
			button.prop('disabled', false);
		}
	});
})


