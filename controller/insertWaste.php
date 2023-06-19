<div class="insertWaste" style="text-align: center;
        color: #6A4C9C;
        align-items: center;
        font-family: 'Press Start 2P';
        font-size: 30px;">
    Insert Chemical Waste
</div>
<br>
<form method="POST" ,action="main.php" style="text-align: left;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    Name: <input type="text" name="Name"> <br /><br />
    ID: <input type="text" name="ID"> <br /><br />
    Description: <input type="text" name="Description"> <br /><br />
    Admin ID: <input type="text" name="AdminID"> <br /><br />
    Date: <input type="text" name="Date"> <br /><br />

    <input type="submit" value="insertWaste" name="insertWaste"></p>
</form>



<?php
if (isset($_POST['insertWaste'])) {
    addToDB(
        "CurrentStock",
        $_POST['Name'],
        $_POST['ID'],
        $_POST['Description'],
        $_POST['AdminID'],
        $_POST['Date'],
        null,
        null,
        null
    );
}
?>