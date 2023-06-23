<div style="font-size: 25px;
              width: auto;
              padding: 10px;
              text-align: center;
              font-family: 'Arial, Helvetica, sans-serif';
              color:floralwhite;
              border-style: solid;
              border: 5px;
              background-color: green">
    <?php
    echo $vendor;
    ?>
</div>

<div style = "text-align: center">
    <?php
    global $db_conn;

    if (connectToDB()) {
        echo '<p style="
                    color:black; 
                    font-size: 20px;
                    font-weight: bold"> Items purchased from this vendor: </br> </p>';
        // echo 'Items purchased from this vendor: </br>';
        $result = executePlainSQL("SELECT Items.FullName 
                                   FROM Items, Purchase
                                   WHERE Purchase.Name ='" . $vendor . "' AND
                                   Purchase.CatalogNumber = Items.CatalogNumber");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {       
            echo "<br>" . $row[0] . "<br>";        
        }

        echo "<br><br>";

        echo '<p style="
                    color:black; 
                    font-size: 20px;
                    font-weight: bold"> Number of purchases made from each vendor: </br> </p>';
        $result = executePlainSQL("SELECT Purchase.Name, COUNT(Purchase.Name)
                                   FROM Purchase
                                   GROUP BY Purchase.Name");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo '<br> ' . $row[1] . ' items were purchased from ' . $row[0] . '</br>';
        }

        echo "<br><br>";

        echo '<p style="
                    color:black; 
                    font-size: 20px;
                    font-weight: bold">Popular Vendors:<br></p>';
        $result = executePlainSQL("SELECT Purchase.Name
                                   FROM Purchase
                                   GROUP BY Purchase.Name
                                   HAVING COUNT(Purchase.Name) > 4");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo '<br> 5 or more purchases were made from ' . $row[0] . '</br>';
        }

        echo "<br><br>";

        echo '<p style="
                    color:black; 
                    font-size: 20px;
                    font-weight: bold">Busy Dates:<br></p>';
        $result = executePlainSQL("SELECT DISTINCT p.PurchaseDate
                                   FROM Purchase p
                                   WHERE NOT EXISTS (SELECT v.name
                                                    FROM Vendors v
                                                    WHERE NOT EXISTS (SELECT *
                                                                        FROM Purchase p2
                                                                        WHERE p.PurchaseDate = p2.PurchaseDate AND
                                                                        p2.Name = v.Name))");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo '<br> Purchased items from all vendors on : ' . $row[0] . '</br>';
        }

        echo "<br><br>";

    }
    ?>

</div>

<div>
    <form method="POST" action="main.php" style="text-align: center">
        <input type="submit" name="delete" value="DELETE this vendor">
        <input type="hidden" name="deleteVendor" value=<?php echo $vendor; ?>>
    </form>
</div>

<?php
if (isset($_POST['delete'])) {
    $delVendor = $_POST['deleteVendor'];

    deleteFromDB("Vendors", $delVendor);
    deleteFromDB("Purchase", $delVendor);
}
?>