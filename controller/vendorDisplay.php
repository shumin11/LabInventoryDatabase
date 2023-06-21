<div style="font-size: 25px;
              width: auto;
              padding: 10px;
              text-align: center;
              font-family: 'Arial, Helvetica, sans-serif';
              color:floralwhite;
              border-style: solid;
              border: 5px;
              background-color: black">
    <?php
    echo $vendor;
    ?>
</div>

<div>
    <?php
    global $db_conn;

    if (connectToDB()) {
        echo 'Items purchased from this vendor: </br>';
        $result = executePlainSQL("SELECT Items.FullName 
                                   FROM Items, Purchase
                                   WHERE Purchase.Name ='" . $vendor . "' AND
                                   Purchase.CatalogNumber = Items.CatalogNumber");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo '<br>' . $row[1] . '</br>';
        }

        echo 'Number of purchases made from this vendor: </br>';
        $result = executePlainSQL("SELECT Purchase.Name, COUNT(Purchase.Name)
                                   FROM Purchase
                                   GROUP BY Purchase.Name");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo '<br>' . $row[1] . 'items were purchased from' . $row[0] . '</br>';
        }

        echo 'I do not know what to say here..</br>';
        $result = executePlainSQL("SELECT Purchase.Name
                                   FROM Purchase
                                   GROUP BY Purchase.Name
                                   HAVING COUNT(Purchase.Name) > 4");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo '<br> 5 or more purchases were made from ' . $row[0] . '</br>';
        }
    }
    ?>

</div>

<div>
    <form method="GET" action="main.php">
        <input type="submit" name="delete" value="DELETE this vendor">
        <input type="hidden" name="deleteVendor" value=<?php echo $vendor; ?>>
    </form>
</div>

<?php
if (isset($_GET['deleteVendor'])) {
    $delVendor = $_GET['deleteVendor'];
    deleteFromDB("Vendor", $delVendor);
    deleteFromDB("Purchase", $delVendor);
}
?>