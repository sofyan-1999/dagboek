<?php

require 'users.php';

class Diaries extends Users{

	public function create()
	{

 		$connection = $this->db();


		try {
		    // prepare sql and bind parameters
		    $stmt = $connection->prepare("INSERT INTO posts (id_gebruiker, post, datum)
		    VALUES (:id_gebruiker, :post, :datum)");
		    $stmt->bindParam(':id_gebruiker', $_SESSION['id']);
		    $stmt->bindParam(':post', $_POST['story']);
		    $stmt->bindParam(':datum', date("Y-m-d"));

		    $stmt->execute();						
		    return true;
		    }
		catch(PDOException $e)
		    {
		    echo "Error: " . $e->getMessage();
		    }
				$connection = null;
	}

	public function select(){
		$conn = $this->db();
		$stories = $conn->prepare('SELECT * FROM posts WHERE id_gebruiker = :id_gebruiker');
		$stories->execute(['id_gebruiker' => $_SESSION['id']]);
		$stories = $stories->fetchAll(PDO::FETCH_ASSOC);

		return $stories;
	}


}
?>