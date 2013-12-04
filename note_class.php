<?php 
require_once 'db.php';

class Note
{
	// private $database;

	function __construct()
	{
		// $this->database = new Database();
	}

	public function retrieve_all_notes()
	{
		global $database;
		$query = "SELECT * FROM posts";
		return $database->fetch_all($query);
	}

	public function add_note($note)
	{
		global $database;
		$msg = $database->db->real_escape_string($note);
		$query = "INSERT INTO posts(description, created_at, updated_at)
			VALUES ('{$msg}', NOW(), NOW())";
		$database->db->query($query);

		$note_id = $database->fetch_record("SELECT id FROM posts ORDER BY id DESC LIMIT 1");
		return $note_id['id'];
	}

	public function update_note($note_id, $note)
	{
		global $database;
		$msg = $database->db->real_escape_string($note);
		$id = $database->db->real_escape_string($note_id);
		$query = "UPDATE posts 
				  SET description='{$msg}', updated_at=NOW() 
				  WHERE id={$id}";
		$database->db->query($query);
	}

	public function delete_note($note_id)
	{
		global $database;
		$id = $database->db->real_escape_string($note_id);
		$query = "DELETE FROM posts WHERE id={$id};";
		$database->db->query($query);
	}
}

?>
