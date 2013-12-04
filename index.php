<?php require 'note_class.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Notes</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="css.css" />

	<!-- js -->
	<!-- external -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<!-- internal -->
	<script type="text/javascript">
		$('document').ready(function(){
			// POST A NEW NOTE
			$('form').on('submit', function(){
				$.post($(this).attr('action'), $(this).serialize(), function(data){
					if (data.error){
						$('.errors').html(data.error).show().fadeOut(1000);
					}else{
						$('#notes').append(
							"<li id='"+data.id+"'>"+
							"<textarea>"+data.note+"</textarea class='posted_note'><a class='delete' href='#'>X</a>"+
							"</li>");
						$('.note_msg').val("");
					}
				}, "json");
				return false;
			});
		});

		// UPDATE AN OLD NOTE
		// written outside of ready give this behavior to dynamically created notes as well
		$(document).on('change', '.posted_note', function(){
			$.post(
				$("#note_form").attr('action'), 
				{action: "update", note: $(this).val(), id: $(this).parent().attr('id')});
		});

		// DELETE AN OLD NOTE
		$(document).on('click', '.delete', function(){
			$.post(
				$("#note_form").attr('action'),
				{action: "delete", id: $(this).parent().attr('id')});
			// remove it visually from the page
			$(this).parent().slideUp(200, function(){
				$(this).remove();
			});
		});
	</script>
</head>
<body>
	<h1>My Notes:</h1>
	<ul id="notes">
<?php 
	$note = new Note();
	$notes = $note->retrieve_all_notes();
	foreach ($notes as $note): ?>
		<li id="<?= $note['id'] ?>"><textarea class="posted_note"><?= $note['description'] ?></textarea><a class='delete' href='#'>X</a></li>
<?php endforeach; ?>
	</ul>
	<form action="process.php" method="post" id="note_form">
		<input type="hidden" name="action" value="post" />
		Add a note:<br />
		<textarea name="note" class="note_msg" placeholder="type here to make a note"></textarea>
		<button type="submit">Post It!</button>
	</form>
	<p class="errors"></p>
</body>
</html>