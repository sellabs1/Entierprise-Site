//Function that submits the form when the dropdown option is selected
function change(){
	document.getElementById("select-table-form").submit();
}

$(document).ready(function(){
	
	var passFlag = 0;
	var userFlag = 0;

	$("#regUsername").keyup(function (e) { //user types username on inputfiled

   		var username = $(this).val(); //get the string typed by user
   		var button = $('#reg-button');

   		$.post('usernameCheck.php', {'username':username}, function(data) { //make ajax call to usernameCheck.php
  			if(data == "1"){
  				$("#user-result").html("<img src='../images/userExists.png' />").fadeIn();
  				userFlag = 0;
  			}
  			else{
  				$("#user-result").html("<img src='../images/userAvailable.png' />").fadeIn();
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
		var button = $('#reg-button');

		if(pass != confPass){
			$("#pass-result").html("<img src='../images/passMatch.png' />").fadeIn();
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


