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
    echo "Low Stock Item Type";
    ?>
</div>
<div style = "text-align: center; font-weight: bold">
    <?php
    global $db_conn;

    if (connectToDB()) {
        echo '<br> The following type(s) is/are running out of stock: </br>';
        $result = executePlainSQL("select Type, avg(Quantity) from Items group by Type having avg(Quantity) < (select avg(Quantity) from Items)");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo $row[0] . '</br>';
        }
    }
    disconnectFromDB();
    ?>
</div>