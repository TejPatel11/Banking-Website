<!DOCTYPE html>
<head>
<link rel="stylesheet" href="styleSheet.css">
</head>
<body>
</body>
</html>

<?php
error_reporting (0);

$connect = new PDO("mysql:host=localhost;dbname=chat;", "austin", "localhost123");

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
	$query = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."')";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$user_name = '';
		$chat_message = '';
		
		
		if($row["from_user_id"] == $from_user_id)
		{
			$chat_message = $row['chat_message'];
		}
		else
		{
			$chat_message = $row["chat_message"];
			$user_name = '<b class="live">'.get_user_name($row['from_user_id'], $connect).'</b>';
		}
		$output .= '<p>'.$user_name.' '.$chat_message.'</p>';
	}
	$output .= '';
	$query = " UPDATE chat_message SET status = '0' WHERE from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."' AND status = '1'";
	$statement = $connect->prepare($query);
	$statement->execute();
	return $output;
}

function get_user_name($user_id, $connect)
{
	$query = "SELECT username FROM login WHERE user_id = '$user_id'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row['username'];
	}
}

?>

