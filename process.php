<?php 
require 'note_class.php';

$data = NULL;
if (isset($_POST) && !empty($_POST)){
	$note = new Note();
	// POST A NEW NOTE
	if ($_POST['action'] === "post" && !empty($_POST['note'])){
		$id = $note->add_note($_POST['note']);

		$data['note'] = $_POST['note'];
		$data['id'] = $id;
	}

	// UPDATE AN OLD NOTE
	else if ($_POST['action'] === "update" && !empty($_POST['note'])) {
		$note->update_note($_POST['id'], $_POST['note']);
	}

	// DELETE AN OLD NOTE
	else if ($_POST['action'] === "delete" && !empty($_POST['id'])) {
		$note->delete_note($_POST['id']);
		header("Location: index.php");
		exit();
	}

	// ERROR
	else {
		$data['error'] = "I need some text...";
	}
} else {
	header("Location: index.php");
	exit();
}

echo json_encode($data);

 ?>