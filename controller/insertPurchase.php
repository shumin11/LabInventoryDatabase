<div class="insertPurchase" style="text-align: center;
        color: #6A4C9C;
        align-items: center;
        font-family: 'Press Start 2P';
        font-size: 30px;">
    Insert Purchase List
</div>
<br>
<form method="POST" ,action="main.php" style="text-align: left;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    Catalog number: <input type="text" name="CatalogNumber"> <br /><br />
    Admin ID: <input type="text" name="AdminID"> <br /><br />
    Vendor Name: <input type="text" name="VendorName"> <br /><br />
    Vendor Address: <input type="text" name="VendorAddress"> <br /><br />
    Date: <input type="text" name="Date"> <br /><br />
    Unit Price: <input type="text" name="UnitPrice"> <br /><br />
    <input type="submit" value="insertPurchase" name="insertPurchase"></p>
</form>



<?php
if (isset($_POST['insertPurchase'])) {
    addToDB(
        "CurrentStock",
        $_POST['CatalogNumber'],
        $_POST['AdminID'],
        $_POST['VendorName'],
        $_POST['VendorAddress'],
        $_POST['Date'],
        $_POST['UnitPrice'],
        null,
        null
    );
}
?>