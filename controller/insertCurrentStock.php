<div class="insertCurrentStock" style="text-align: center;
        color: #6A4C9C;
        align-items: center;
        font-family: 'Press Start 2P';
        font-size: 30px;">
    Insert Current Stock
</div>
<br>
<form method="POST" ,action="main.php" style="text-align: left;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    Type: <input type="text" name="Type"> <br /><br />
    Full Name: <input type="text" name="FullName"> <br /><br />
    Catalog number: <input type="text" name="CatalogNumber"> <br /><br />
    Description: <input type="text" name="Description"> <br /><br />
    Quantity: <input type="text" name="Quantity"> <br /><br />
    Units: <input type="text" name="Units"> <br /><br />
    Expiry date: <input type="text" name="ExpiryDate"> <br /><br />
    Maintenance frequency: <input type="text" name="MaintenanceFrequency"> <br /><br />
    <input type="submit" value="insertCurrentStock" name="insertCurrentStock"></p>
</form>

<?php
if (isset($_POST['insertCurrentStock'])) {
    addToDB(
        "Items",
        $_POST['CatalogNumber'],
        $_POST['FullName'],
        $_POST['Description'],
        $_POST['Quantity'],
        $_POST['Units'],
        $_POST['Type'],
        null, null
    );
} 
if (isset($_POST['ExpiryDate'])) {
    addToDB(
        "Chemicals",
        $_POST['CatalogNumber'],      
        $_POST['ExpiryDate'],
        null, null, null, null, null, null
    );
}
if (isset($_POST['MaintenanceFrequency'])) {
    addToDB(
        "Equipment",
        $_POST['CatalogNumber'],
        $_POST['MaintenanceFrequency'],
        null, null, null, null, null, null
    );
}

?>