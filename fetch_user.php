<?php

include('database_connection.php');

session_start();

$query = "SELECT * FROM login WHERE user_id != '".$_SESSION['user_id']."' ";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table>
	<tr>
		<th>Username</td>
		<th>Action</td>
	</tr>
';

foreach($result as $row)
{
	$output .= '
	<tr>
		<td>'.$row['username'].' </td>
		
		<td><button type="button" class="start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">Start Chat</button></td>
	</tr>
	';
}


$output .= '</table>';

echo $output;

?>

