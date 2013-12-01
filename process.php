<?php
	require("connection.php");

	if(isset($_POST['note']) && $_POST['note'] != "")
	{
		$note	= $_POST['note'];
		$query = "INSERT INTO notes (note, created_at) VALUE ('$note', NOW());";
		//echo $query; die();
		mysql_query($query);

	}
	if(isset($_POST['action']) && $_POST['action'] == 'allNotes')
	{
		$query = "SELECT note FROM notes";
		$notes = fetch_all($query);
	}
	else
	{
		$query = "SELECT note FROM notes ORDER BY created_at DESC LIMIT 1";
		$notes = fetch_all($query);
	}
	
	// return $data in json format
	echo json_encode($notes);
?>

