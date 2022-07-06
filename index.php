<?php

include('database_connection.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:signIn.php");
}

?>

<html>  
    <head>
	<meta charset="utf-8">
        <link rel="stylesheet" href="styleSheet.css">
        <title> Live Chat</title>  
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		
  		
    </head>  
    <body>  
        <div class="container">
			<br />
			<h3 class="center">Live Chat</h3><br />
			<br />
				<div>
					<h4>Online User</h4>
				</div>
					<p>Hi - <?php echo $_SESSION['username']; ?> - <a href="signOut.php">Sign Out</a></p>
				<div class="table-responsive">
				
				<div id="user_details"></div>
				<div id="user_model_details"></div>
			
			</div>
			
		</div>
		
    </body>  
</html>

<script>  
$(document).ready(function(){

	fetch_user();

	setInterval(function(){
		fetch_user();
		update_chat_history_data();
	}, 5000);

	function fetch_user()
	{
		$.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	function make_chat_dialog_box(to_user_id, to_user_name)
	{
		var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
		modal_content += '<div style="height:400px; background-color: #ffffff; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
		modal_content += fetch_user_chat_history(to_user_id);
		modal_content += '</div>';
		modal_content += '<div class="form-group">';
		modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message"></textarea>';
		modal_content += '</div><div class="form-group" align="right">';
		modal_content += '<button type="button" name="send_chat" id="'+to_user_id+'" class="send_chat">Send</button></div></div>';
		$('#user_model_details').html(modal_content);
	}

	$(document).on('click', '.start_chat', function(){
		var to_user_id = $(this).data('touserid');
		var to_user_name = $(this).data('tousername');
		make_chat_dialog_box(to_user_id, to_user_name);
		$("#user_dialog_"+to_user_id).dialog({
			autoOpen:false,
			width:400
		});
	});

	$(document).on('click', '.send_chat', function(){
		var to_user_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+to_user_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"insert_chat.php",
				method:"POST",
				data:{to_user_id:to_user_id, chat_message:chat_message},
				success:function(data)
				{
					$('#chat_history_'+to_user_id).html(data);
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

	function fetch_user_chat_history(to_user_id)
	{
		$.ajax({
			url:"fetch_user_chat_history.php",
			method:"POST",
			data:{to_user_id:to_user_id},
			success:function(data){
				$('#chat_history_'+to_user_id).html(data);
			}
		})
	}

	function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var to_user_id = $(this).data('touserid');
			fetch_user_chat_history(to_user_id);
		});
	}
});  
</script>