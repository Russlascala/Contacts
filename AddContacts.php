<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Contacts</title>
</head>
<body>
   <h1 style="text-align:center">Contacts</h1>
   <?php
        $ErrMessage = "<p>Error: You must enter all fields</p>";
        $BacktoForm = "<p><a href='Contacts.html'>Click to go back</a></p>";
        # Checks to see if all inputs are filled out. 
        if (empty($_POST['fname']) || empty($_POST['lname'])){
            echo $ErrMessage;
            echo "<p>You must enter your first and last name.</p>";
            echo $BacktoForm;
        }
        elseif (empty($_POST['home']) || empty($_POST['cell'])) {
            echo $ErrMessage;
            echo "<p>You must enter your home and cell number.</p>";
            echo $BacktoForm;
        } 
        elseif (empty($_POST['email'])) {
            echo $ErrMessage;
            echo "<p>You must enter your email.</p>";
            echo $BacktoForm;
        }
        
        else {
            $FirstName = addslashes($_POST['fname']);
            $LastName = addslashes($_POST['lname']);
            $Home = addslashes($_POST['home']);
            $Cell = addslashes($_POST['cell']);
            $Email = addslashes($_POST['email']);
            $Contacts = fopen("contacts.txt", "ab");

            if (is_writeable("contacts.txt")) {
                $info =   "First Name: ". $FirstName . "\nLast Name: " . $LastName . 
                "\nHome Phone: " . $Home . "\nCell Phone: " . $Cell . 
                "\nEmail: " . $Email . "\n\n";

                if(fwrite($Contacts, $info)) {
                    echo "<p>Thank you for adding a contact.</p>\n";
                    echo "<p><a href='Contacts.html'>Click to add another contact</a></p>";
                    echo "<p style='text-align:center'>
                        <button><a href='ShowContacts.php'>View Contacts</a></button>
                        </p>";
                }
                else {
                    echo "<p>Cannot add your name to Contacts.</p>\n";
                }
            }
            else 
                echo "<p>Cannot write to the file.</p>\n";
            fclose($Contacts);
        }
   ?>
</body>
</html>