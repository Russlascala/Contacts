<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Show Contacts</title>
    </head>
    <body>
        <h1 style="text-align:center">Contacts</h1>
        <h3>Your Contacts:</h3>
       
        
        <?php
            if (filesize('contacts.txt') == 0) {
                echo("<h4>You have not added any contacts yet.</h4>");
            } else {
                #search and button to seach contacts 
                echo "<input type='text' id='searchbox'/> <button type='button' onClick='findContact()'>Search Contacts</button>";
                # Lists the contacts entered 
                echo '<pre>';
                readfile("contacts.txt");
                echo '</pre>';  
            }
            echo "<p><a href='Contacts.html'>Click to add a contact</a></p>";
        ?>
    </body>
    <script type="text/javascript">
        function findContact() {
            var name = document.getElementById("searchbox").value;
            window.find(name);
        }
    </script>
</html>