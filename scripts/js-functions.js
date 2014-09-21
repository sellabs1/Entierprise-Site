function change(){
	document.getElementById("select-table-form").submit();
}

function deleteRecord(id){

	var answer = confirm('Are you sure you want to delete this record?');
	if(answer){
		
	}
}

$(document).ready(function(){
	
	var passFlag = 0;
	var userFlag = 0;

	$("#regUsername").keyup(function (e) { //user types username on inputfiled

   		var username = $(this).val(); //get the string typed by user
   		var button = $('#button');

   		$.post('usernameCheck.php', {'username':username}, function(data) { //make ajax call to usernameCheck.php
  			if(data == "1"){
  				$("#user-result").html("<img src='../images/userExists.gif' />").fadeIn();
  				userFlag = 0;
  			}
  			else{
  				$("#user-result").html("<img src='../images/userAvailable.gif' />").fadeIn();
  				userFlag = 1;
  			} 
   		});

   		if(userFlag == 1 && passFlag == 1){
   			button.prop('disabled', false);
   		}
   		else{
   			button.prop('disabled', true);
   		}
	});

	//Tests to see whether the user has input the same passwords for registering
	$("#confPass").on('keyup', function(){

		var pass = $("#pass").val();
		var confPass = $("#confPass").val();
		var button = $('#button');

		if(pass != confPass){
			$("#pass-result").html("<img src='../images/passMatch.gif' />").fadeIn();
			passFlag = 0;
		}
		else{
			$("#pass-result").html("");
			passFlag = 1;
		};

		if(userFlag == 1 && passFlag == 1){
   			button.prop('disabled', false);
   		}
   		else{
   			button.prop('disabled', true);
   		}
	});
})


