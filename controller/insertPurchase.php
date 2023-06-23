<div class="insertPurchase" style="text-align: center;
        color: #6A4C9C;
        align-items: center;
        font-family: 'Press Start 2P';
        font-size: 30px;">
    Insert Purchase List
</div>
<br>
<form method="POST" ,action="main.php" style="text-align: center;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    Catalog number *: <input type="text" name="CatalogNumber"> <br /><br />
    Admin ID: <input type="text" name="AdminID"> <br /><br />
    Vendor Name: <input type="text" name="VendorName"> <br /><br />
    Vendor Address: <input type="text" name="VendorAddress"> <br /><br />
    Date: <input type="text" name="PurchaseDate"> <br /><br />
    Unit Price: <input type="text" name="UnitPrice"> <br /><br />
    <input type="submit" value="insertPurchase" name="insertPurchase"></p>
</form>



<?php
if (isset($_POST['insertPurchase'])) {
    $CatalogNumber = $_POST['CatalogNumber'];

    addToDB(
        "Purchase",
        $_POST['CatalogNumber'],
        $_POST['AdminID'],
        $_POST['VendorName'],
        $_POST['VendorAddress'],
        $_POST['PurchaseDate'],
        $_POST['UnitPrice'],
    );


    if (connectToDB()) {

        $result = executePlainSQL("select I.Quantity from Items I where I.CatalogNumber = '" . $CatalogNumber . "'");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            $currQuantity = $row[0] + 1;

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("UPDATE Items SET Quantity='" . $currQuantity . "' WHERE CatalogNumber='" . $CatalogNumber . "'");
            OCICommit($db_conn);
            echo '<br>' . $CatalogNumber . " : current quantity has been updated to " . $currQuantity;
            echo '<br> The Items table has also been updated. Please go to the CurrentStock Page.
            <br>';
        }
    }
    disconnectFromDB();
}

?>