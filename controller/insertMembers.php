<div class="insertMembers" style="text-align: center;
        color: #6A4C9C;
        align-items: center;
        font-family: 'Press Start 2P';
        font-size: 30px;">
    Insert/Update Lab Members
</div>
<br>
<form method="POST" ,action="main.php" style="text-align: center;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    User ID: <input type="text" name="UserID"> <br /><br />
    Name: <input type="text" name="Name"> <br /><br />
    Email: <input type="text" name="Email"> <br /><br />
    Phone: <input type="text" name="Phone"> <br /><br />
    <input type="submit" value="insertMembers" name="insertMembers"></p>
</form>

<form method="POST" ,action="main.php" style="text-align: center;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    Old User ID: <input type="text" name="oldUserID"> <br /><br />
    New User ID: <input type="text" name="newUserID"> <br /><br />
    Old Name: <input type="text" name="oldName"> <br /><br />
    New Name: <input type="text" name="newName"> <br /><br />
    Old Email: <input type="text" name="oldEmail"> <br /><br />
    New Email: <input type="text" name="newEmail"> <br /><br />
    Old Phone: <input type="text" name="oldPhone"> <br /><br />
    New Phone: <input type="text" name="newPhone"> <br /><br />
    <input type="submit" value="Update" name="updateMembers"></p>
</form> 


<?php
if (isset($_POST['insertMembers'])) {

    addToDB(
        "LabMembers",
        $_POST['UserID'],
        $_POST['Name'],
        $_POST['Email'],
        $_POST['Phone'],
        null,
        null
    );
}

if (isset($_POST['updateMembers'])) {
    if (connectToDB()) {
       
        $plainSQL = "UPDATE LabMembers SET 
        UserID ='" . $_POST['newUserID'] . "', Name ='" . $_POST['newName'] . "',
        Email ='" . $_POST['newEmail'] . "', Phone ='" . $_POST['newPhone'] . "'
        WHERE UserID='" . $_POST['oldUserID'] . "' 
        AND Name='" . $_POST['oldName'] . "' 
        AND Email='" . $_POST['oldEmail'] . "'
        AND Phone='" . $_POST['oldPhone'] . "'";

        if (executePlainSQL($plainSQL)) {
            OCICommit($db_conn);
            echo '<br> The LAB MEMBERS table has been updated. Please refresh the page by clicking MEMBERS button to get updated table.
            <br>';
    
        } else {
            echo "Fail to add";
        }
    }
    

    disconnectFromDB();
}
?>