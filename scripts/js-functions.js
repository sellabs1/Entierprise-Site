function change(){
	document.getElementById("select-table-form").submit();
}

// function deleteRecord(id){

// 	var answer = confirm('Are you sure you want to delete this record?');
// 	if(answer){
		
// 	}
// }

$("#regUsername").keyup(function (e) { //user types username on inputfiled

   	var username = $(this).val(); //get the string typed by user

   	$.post('usernameCheck.php', {'username':username}, function(data) { //make ajax call to usernameCheck.php
  		$("#user-result").html(data); //dump the data received from PHP page
   	});
});

