<?php
class Users{

	public function db()
	{
	   $host = 'localhost';
	   $database = 'dagboek';
	   $username = 'root';
	   $password = '';

	   try {
	       $connection = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
	       $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	       return $connection;
	   }
	   catch(PDOException $e) {
	       dd($e->getMessage());
	   }
	}

 	public function create(){

 		$connection = $this->db();


		try {
		    // prepare sql and bind parameters
		    $stmt = $connection->prepare("INSERT INTO gebruikers (voornaam, tussenvoegsels, achternaam, email, wachtwoord)
		    VALUES (:voornaam, :tussenvoegsels, :achternaam, :email, :wachtwoord)");
		    $stmt->bindParam(':voornaam', $firstname);
		    $stmt->bindParam(':tussenvoegsels', $suffix);
		    $stmt->bindParam(':achternaam', $lastname);
	    	$stmt->bindParam(':email', $email);
		    $stmt->bindParam(':wachtwoord', $password);



			$firstname = $_POST["firstname"];
			$suffix = $_POST["suffix"];
			$lastname = $_POST["lastname"];
			$email = $_POST["email"];
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		    $stmt->execute();
		    return true;
		    }
		catch(PDOException $e)
		    {
		    echo "Error: " . $e->getMessage();
		    }
				$connection = null;
        }

    public function setLoginUser(){
    	$conn = $this->db();

	    $username = $_POST['email'];
	    $passwordAttempt = $_POST['password'];

	    $sql = "SELECT id_gebruiker, email, wachtwoord FROM gebruikers WHERE email = :email";

	    $stmt = $conn->prepare($sql);
	    if ($stmt->execute([':email' => $username])) {
	    	if ($stmt->rowCount() == 1) {
	    		$data = $stmt->fetch(PDO::FETCH_ASSOC);
	    		$conn = null;
	    		$id_user = $data['id_gebruiker'];
	    		$password = $data['wachtwoord'];
	    		if (password_verify($passwordAttempt, $password)) {
	    			$_SESSION['id'] = $id_user;
	    			return true;
	    		} else {
	    			return 'wrong pass';
	    		}
	    	} else {
	    		$conn = null;
	    		return 'Multiple accounts found';
	    	}
	    } else {
	    	$conn = null;
	    	return 'Statement failed';
	    }

    }

    public function select(){



	$conn = $this->db();
	$user = $conn->prepare('SELECT * FROM gebruikers WHERE id_gebruiker = :id_gebruiker');
	$user->execute(['id_gebruiker' => $_SESSION['id']]);
	$user = $user->fetch(PDO::FETCH_ASSOC);

	return $user;
	}

    public function logoutUser()
    {
        unset($_SESSION['id']);
        session_destroy();
		return true;
    }

    public function updateUser()
    {
		$conn = $this->db();
		// $updateUser = $conn->prepare('UPDATE gebruikers SET voornaam, tussenvoegsels, achternaam, email WHERE voornaam = :voornaam, tussenvoegsels = :tussenvoegsels, achternaam = :achternaam, email = :email');
		// $updateUser->execute([
		// 	'voornaam' => $_POST['firstname'],
		// 	'tussenvoegsels' => $_POST['suffix'],
		// 	'achternaam' => $_POST['lastname'],
		// 	'email' => $_POST['email'],
		// ]);
		// $updateUser = $updateUser->fetch(PDO::FETCH_ASSOC);


		$firstname = $_POST["firstname"];
		$suffix = $_POST["suffix"];
		$lastname = $_POST["lastname"];
		$email = $_POST["email"];



		try {

		    $sql = "UPDATE gebruikers SET voornaam='$firstname', tussenvoegsels='$suffix', achternaam='$lastname', email='$email' WHERE id_gebruiker= :id_gebruiker";

		    // Prepare statement
		    $stmt = $conn->prepare($sql);

		    // execute the query
		    $stmt->execute(['id_gebruiker' => $_SESSION['id']]);

		    // echo a message to say the UPDATE succeeded
		    // echo $stmt->rowCount() . " records UPDATED successfully";
		    return true;
		    }
		catch(PDOException $e)
		    {
		    echo $sql . "<br>" . $e->getMessage();
		    }

		$conn = null;
    }

    public function deleteUser()
    {

    $conn = $this->db();

	try {

	    // sql to delete a record
	    $sql = "DELETE FROM gebruikers WHERE id_gebruiker= :id_gebruiker";

		    // Prepare statement
	    $stmt = $conn->prepare($sql);

	    // execute the query
	    $stmt->execute(['id_gebruiker' => $_SESSION['id']]);
        unset($_SESSION['id']);
        session_destroy();
	    return true;
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

	$conn = null;

    }


}
?>
