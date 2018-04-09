<!-- addContact.php -->
<!DOCTYPE html>
<html>
<head>
    <title>PhoneBook App</title>
    <link rel="stylesheet" type="text/css" href="css/phonebook.css">
</head>
<body>
    <header>
      <h2>PhoneBook App</h2>
    </header>
    <section class="addContact">
            <header>
                <h3>ADD CONTACT</h3>
            </header>
            <?php
            	$contactName = $_POST["contactName"];
            	$phoneNo = $_POST["phoneNo"];
            	$tags = $_POST["contactTags"];

            	// validation
            	if(!isset($tags)){
            		$tags = "n/a";
            	}

            	print("<p>contact name: $contactName <br> phone no: $phoneNo <br> tags: $tags<br>");

            	// server-side validation should go here

            	//add contact to database using PDO
            	try {
            		// connect to database
            		$database = new PDO('mysql:host=localhost;dbname=phonebookdb;charset=utf8mb4', 'root', '');

            		// // add test contact details to database
            		// $affected_rows = $database->exec("INSERT INTO tbl_contact(contact_name, phone_no, tags) VALUES('Mr Been', 123456789, 'funny guy')");
            		// print("<p>Interted Rows: $affected_rows</p>");

            		// add contact using parameters
            		$statement = $database->prepare("INSERT INTO tbl_contact(contact_name, phone_no, tags) VALUES(?, ?, ?)");
					$statement->execute(array($contactName, $phoneNo, $tags));
					$rows = $statement->rowCount();

            		// show phonebook contact count
            		$query_contactCount = $database->query("SELECT * FROM tbl_contact");
            		$contactCount = $query_contactCount->rowCount();
            		print("<p>Total Entries: $contactCount</p>");

            	} catch(PDOException $ex) {
            		echo "An Error occured!<br>";
            		echo $ex->getMessage();
            	}

            ?>
            <footer>
            	<button id="btnHome">Main Menu</button>
            </footer>
    </section>
    <footer>
      <address>Department of Industrial Management</address>
    </footer>

    <!-- script -->
    <script type="text/javascript" src="js/phonebook.js"></script>
</body>
</html>