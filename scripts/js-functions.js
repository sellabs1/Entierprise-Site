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
  				$("#user-result").html("Username already exists");
  				$('#button').prop('disabled', true);
  			}
  			else{
  				$("#user-result").html("Username is available");
  				$('#button').prop('disabled', false);
  			} 
   		});
	});
})


