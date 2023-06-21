<div style="font-size: 25px;
width: auto;
padding: 10px;
text-align: center;
font-family: 'Press Start 2P';
color: #5c2223;
border-style: groove;
border-radius: 10px;
border: 5px;
background-color: #fcc307">
    <?php
    echo "Low Stock Item Type";
    ?>
</div>
<div>
    <?php
    global $db_conn;

    if (connectToDB()) {
        echo 'The following items are running out of stock: </br>';
        $result = executePlainSQL("select Type, avg(Quantity) from Items group by Type having avg(Quantity) < (select avg(Quantity) from Items)");
        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo $row[0] . "      " . $row[1] . '</br>';
        }
    }
    ?>
</div>