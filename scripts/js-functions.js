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
  			//dump the data received from PHP page
  			$("#user-result").html(data);
  			if(data === "Username already exists"){
  				$('#button').prop('disabled', true);
  			}
  			else{
  				$('#button').prop('disabled', false);
  			} 
   		});
	});
})


