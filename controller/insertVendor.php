<div class="insertVendor" style="text-align: center;
        color: #6A4C9C;
        align-items: center;
        font-family: 'Press Start 2P';
        font-size: 30px;">
    Insert Vendors
</div>
<br>
<form method="POST" ,action="main.php" style="text-align: center;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    Name: <input type="text" name="Name"> <br /><br />
    Address: <input type="text" name="Address"> <br /><br />
    Phone: <input type="text" name="Phone"> <br /><br />
    Emai: <input type="text" name="Email"> <br /><br />

    <input type="submit" value="insertVendor" name="insertVendor"></p>
</form>



<?php
if (isset($_POST['insertVendor'])) {
    addToDB(
        "Vendors",
        $_POST['Name'],
        $_POST['Email'],
        $_POST['Address'],
        $_POST['Phone'],
        null,
        null
    );
}
?>