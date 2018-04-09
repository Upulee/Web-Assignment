<!-- phonebook - index.php -->
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
    <section class="navigation">
        <button id="btnToggleAddView">View Contacts</button>
    </section>
    <section id="addContactSection" class="addContact">
            <header>
                <h3>ADD CONTACT</h3>
            </header>
            <form name="addContactForm" method="post" action="addContact.php">
                <!-- contact name -->
                <label for="contactName">Contact Name</label><br>
                <input id="contactName" type="text" name="contactName"><br>

                <!-- phone no -->
                <label for="phoneNo">Phone No</label><br>
                <input id="phoneNo" type="number" name="phoneNo"><br>

                <!-- tags -->
                <label for="contactTags">Tags</label><br>
                <input id="contactTags" type="text" name="contactTags"><br>

                <!-- add button and reset button -->
                <button type="submit" name="btnAddContact">Add Contact</button>
                <button type="reset" name="btnResetAddContact">Clear</button>
            </form>
    </section>
    <section id="viewPhonebookSection" class="viewPhonebookSection">
        <header>
            <h3>VIEW CONTACTS</h3>
        </header>
        <table>
            <tr>
                <th>Name</th>
                <th>Phone</th>
            </tr>
            <?php
            try{
                $database = new PDO('mysql:host=localhost;dbname=phonebookdb;charset=utf8mb4', 'root', '');
                foreach ($database->query('SELECT * FROM tbl_contact') as $row) {
                    echo "<tr><td>" . $row['contact_name'] . "</td><td>" . $row['phone_no'] . "</td></tr>";
                }
            } catch(PDOException $ex){
                echo "An Error occured!<br>";
                echo $ex->getMessage();
            }
            ?>
        </table>
    </section>
    <footer>
      <address>Department of Industrial Management</address>
    </footer>
    <!-- script -->
    <script type="text/javascript" src="js/phonebook.js"></script>
</body>
</html>