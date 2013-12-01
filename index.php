<?php
	require("connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Ajax</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		 $(document).ready(function(){
		 	$('#note_form, #allNotes').on('submit', function(){
		 		var form = $(this);
		 		$.post(
		 			form.attr('action'), 
		 			form.serialize(), 
		 			function(data){
		 			if(data)
		 			{
		 				console.log(data);
		 				for(var i=0; i<data.length; i++)
		 				{
		 					var note = data[i]['note'];
		 					//console.log(data[i]['note']);
							$('#posted_notes').append("<p>'" + note + "'</p>");		
			 			}
		 			}
		 			else
		 			{
		 				console.log('no notes');
		 			}
				
		 			},
		 			"json");
		 		// prevent redirect to process.php
		 		return false;
		 	});
			$('#allNotes').submit();
		 });
	</script>
</head>
<body>
	<div id="wrapper">
		<h1>My Posts:</h1>
		<div id='posted_notes'>

<?php
		// $query = "SELECT note FROM notes";
		// $notes = fetch_all($query);

		// foreach ($notes as $note)
		// {
?>
<?php		
		//}
?>
		</div>
		<div class="clear"></div>
		<div id="add_notes">
			<form id="note_form" action="process.php" method="post">
				Add a note:<br>
				<textarea id="note" name="note"></textarea><br>
				<input type="hidden" name="action" value="oneNote">
				<input id="post_it" type="submit" value="Post It!"/>
			</form>
			<form id="allNotes" action="process.php" method="post">
				<input type="hidden" name="action" value="allNotes">
			</form>	
		</div>
	</div> <!-- end of wrapper-->
</body>
</html>