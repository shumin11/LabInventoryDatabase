<div style="height:30px;" class="middlepane">
    <div class="filter">
        <form method="POST" action="main.php">
            <label> FILTER </label>
            <input class = "currentStockFilter" type="submit" name="currentStockFilter" value="ALL" />
            <?php
            if (connectToDB()) {
                global $db_conn;
                $result = executePlainSQL("SELECT DISTINCT Type FROM Items");
            }
            while ($row = oci_fetch_array($result, OCI_BOTH)) {
                echo '<input class="currentStockFilter" type="submit" name="currentStockFilter"
                value=' . $row["TYPE"] . '/>'; 
            }
            disconnectFromDB();
            ?>
        </form>
    </div>
</div>