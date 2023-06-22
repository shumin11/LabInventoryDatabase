<div style="height:30px;" class="middlepane">
    <div class="filter">
        <form method="POST" action="main.php">
            <label> FILTER </label>
            <input class = "purchaseFilter" type="submit" name="purchaseFilter" value="ALL" />
            <?php
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT DISTINCT Name FROM Purchase");
            }
            while ($row = oci_fetch_array($result, OCI_BOTH)) {
                echo '<input class="purchaseFilter" type="submit" name="purchaseFilter"
                value=' . $row["NAME"] . '/>'; 
            }
            disconnectFromDB();
            ?>
        </form>
    </div>
</div>