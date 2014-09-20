function change(){
	document.getElementById("select-table-form").submit();
}

function deleteRecord(id){

	var answer = confirm('Are you sure you want to delete this record?');
	if(answer){
		
	}
}

$(document).ready(function(){
	//Tests to see whether the username exists in the database
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

	//Tests to see whether the user has input the same passwords for registering
	$("#confPass").on('keyup', function(){

		var pass = $("#pass").val();
		var confPass = $("#confPass").val();
		var button = $('#button');

		if(pass != confPass){
			$("#pass-result").html("<img src='../images/passMatch.gif' />").fadeIn();
			button.prop('disabled', true);
		}
		else{
			$("#pass-result").html("").fadeIn();
			button.prop('disabled', false);
		}
	});
})


