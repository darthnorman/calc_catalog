<?php
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id'])) {
	// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
	// make sure the 'id' in the URL is valid
		if (is_numeric($_POST['id'])) {
			// get variables from the URL/form
			$id = $_POST['id'];
			$firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
			$lastname = htmlentities($_POST['lastname'], ENT_QUOTES);

			// check that firstname and lastname are both not empty
			if ($firstname == '' || $lastname == '') {
				// if they are empty, show an error message and display the form
				$error = 'ERROR: Please fill in all required fields!';
				renderForm($firstname, $lastname, $error, $id);
			} else {
				// if everything is fine, update the record in the database
				if ($stmt = $mysqli->prepare("UPDATE players SET firstname = ?, lastname = ? WHERE id=?")) {
					$stmt->bind_param("ssi", $firstname, $lastname, $id);
					$stmt->execute();
					$stmt->close();
				} else {
					// show an error message if the query has an error
					echo "ERROR: could not prepare SQL statement.";
				}
				// redirect the user once the form is updated
				header("Location: view.php");
			}
		} else {
			// if the 'id' variable is not valid, show an error message
			echo "Error!";
		}
	} else {
		// if the form hasn't been submitted yet, get the info from the database and show the form
		// make sure the 'id' value is valid
		if (is_numeric($_GET['id']) && $_GET['id'] > 0) {
			// get 'id' from URL
			$id = $_GET['id'];

			// get the recod from the database
			if($stmt = $mysqli->prepare("SELECT * FROM players WHERE id=?")) {
				$stmt->bind_param("i", $id);
				$stmt->execute();

				$stmt->bind_result($id, $firstname, $lastname);
				$stmt->fetch();

				// show the form
				renderForm($firstname, $lastname, NULL, $id);

				$stmt->close();
			} else {
				// show an error if the query has an error
				echo "Error: could not prepare SQL statement";
			}
		} else {
			// if the 'id' value is not valid, redirect the user back to the view.php page
			header("Location: view.php");
		}
	}
} else {
	/*
	NEW RECORD
	*/
	// if the 'id' variable is not set in the URL, we must be creating a new record
	
	// if the form's submit button is clicked, we need to process the form
	if (isset($_POST['submit'])) {
		// get the form data
		$firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
		$lastname = htmlentities($_POST['lastname'], ENT_QUOTES);

		// check that firstname and lastname are both not empty
		if ($firstname == '' || $lastname == '') {
			// if they are empty, show an error message and display the form
			$error = 'ERROR: Please fill in all required fields!';
			renderForm($firstname, $lastname, $error);
		} else {
			// insert the new record into the database
			if ($stmt = $mysqli->prepare("INSERT players (firstname, lastname) VALUES (?, ?)")) {
				$stmt->bind_param("ss", $firstname, $lastname);
				$stmt->execute();
				$stmt->close();
			} else {
				// show an error if the query has an error
				echo "ERROR: Could not prepare SQL statement.";
			}
			// redirec the user
			header("Location: view.php");
		}
	} else {
		// if the form hasn't been submitted yet, show the form
		renderForm();
	}
}

// close the mysqli connection
$mysqli->close();
?>