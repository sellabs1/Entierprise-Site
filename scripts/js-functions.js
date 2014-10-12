//Function that submits the form when the dropdown option is selected
function change(){
	document.getElementById("select-table-form").submit();
}

$(document).ready(function(){
	
	var passFlag = 0;
	var userFlag = 0;
	var intputElements = document.getElementsByTagName("INPUT");

	$("#regUsername").keyup(function (e) { 

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

	$("#pass").on('keyup', function(){

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


    for (var i = 0; i < intputElements.length; i++) {

        intputElements[i].oninvalid = function (e) {
            
            e.target.setCustomValidity("");

            if (!e.target.validity.valid) {

                if (e.target.name == "username") {
                    e.target.setCustomValidity("Please enter a username with 2-20 characters");
                }
                else if(e.target.name == "password") {
                    e.target.setCustomValidity("Please enter a password with 1 Uppercase letter, 1 Lowercase letter, and 1 number");
                }
                else if(e.target.name == "email") {
                	e.target.setCustomValidity("Please enter a valid email address. Example: joe@outlook.com");
                }
            }
        };
    }
})


