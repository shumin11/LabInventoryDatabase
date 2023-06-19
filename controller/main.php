<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Lab Inventory Management System</title>
</head>

<body>
    <div class="container">
        <div class="toppane">
            <h1 style="color: white; font-size: 40px;">Lab Inventory Management System</h1>
            <div class="top-buttons">
                <button>Sign Out</button>
            </div>
        </div>

        <div class="d-flex">
            <div class="leftpane">
                <div class="sidebar">


                    <form method="POST" action="main.php">
                        <li>
                            <input type="submit" name="labTag" value="Lab" , style="font-size: 25px;" />
                        </li>

                        <li>
                            <input type="submit" name="currentStockTag" value="CURRENT STOCK" , style="font-size: 25px;" />
                        </li>

                        <li>
                            <input type="submit" name="purchaseTag" value="PURCHASE" , style="font-size: 25px;" />
                        </li>

                        <li>
                            <input type="submit" name="vendorTag" value="VENDOR" , style="font-size: 25px;" />
                        </li>

                        <li>
                            <input type="submit" name="wasteTag" value="WASTE" , style="font-size: 25px;" />
                        </li>

                        <li>
                            <input type="submit" name="memberTag" value="MEMBERS" , style="font-size: 25px;" />
                        </li>
                    </form>
                </div>


            </div>

            <div class="middlepane">
                Test Page



            </div>

            <div class="rightpane">
                <?php
                // echo $record;
                include('listeners/insertListener.php');
                ?>
            </div>
        </div>
    </div>


    <?php
    //this tells the system that it's no longer just parsing html; it's now parsing PHP
    $record = null;

    $success = True; //keep track of errors so it redirects the page only if there are no errors
    $db_conn = NULL; // edit the login credentials in connectToDB()
    $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

    function debugAlertMessage($message)
    {
        global $show_debug_alert_messages;

        if ($show_debug_alert_messages) {
            echo "<script type='text/javascript'>alert('" . $message . "');</script>";
        }
    }

    function executePlainSQL($cmdstr)
    { //takes a plain (no bound variables) SQL command and executes it
        //echo "<br>running ".$cmdstr."<br>";
        global $db_conn, $success;

        $statement = OCIParse($db_conn, $cmdstr);
        //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

        if (!$statement) {
            echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
            $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
            echo htmlentities($e['message']);
            $success = False;
        }

        $r = OCIExecute($statement, OCI_DEFAULT);
        if (!$r) {
            echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
            $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
            echo htmlentities($e['message']);
            $success = False;
        }

        return $statement;
    }

    function executeBoundSQL($cmdstr, $list)
    {
        /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
		See the sample code below for how this function is used */

        global $db_conn, $success;
        $statement = OCIParse($db_conn, $cmdstr);

        if (!$statement) {
            echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
            $e = OCI_Error($db_conn);
            echo htmlentities($e['message']);
            $success = False;
        }

        foreach ($list as $tuple) {
            foreach ($tuple as $bind => $val) {
                //echo $val;
                //echo "<br>".$bind."<br>";
                OCIBindByName($statement, $bind, $val);
                unset($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                echo htmlentities($e['message']);
                echo "<br>";
                $success = False;
            }
        }
    }


    function connectToDB()
    {
        global $db_conn;

        // Your username is ora_(CWL_ID) and the password is a(student number). For example,
        // ora_platypus is the username and a12345678 is the password.
        $db_conn = OCILogon("ora_shumin11", "a70072111", "dbhost.students.cs.ubc.ca:1522/stu");

        if ($db_conn) {
            debugAlertMessage("Database is Connected");
            return true;
        } else {
            debugAlertMessage("Cannot connect to Database");
            $e = OCI_Error(); // For OCILogon errors pass no handle
            echo htmlentities($e['message']);
            return false;
        }
    }

    function disconnectFromDB()
    {
        global $db_conn;

        debugAlertMessage("Disconnect from Database");
        OCILogoff($db_conn);
    }



    function handleResetRequest()
    {
        global $db_conn;
        // Drop old table
        executePlainSQL("DROP TABLE demoTable");

        // Create new table
        echo "<br> creating new table <br>";
        executePlainSQL("CREATE TABLE demoTable (id int PRIMARY KEY, name char(30))");
        OCICommit($db_conn);
    }

    // HANDLE ALL POST ROUTES
    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
    function handlePOSTRequest()
    {
        if (connectToDB()) {
            if (array_key_exists('resetTablesRequest', $_POST)) {
                handleResetRequest();
            } else if (array_key_exists('updateQueryRequest', $_POST)) {
                handleUpdateRequest();
            } else if (array_key_exists('insertQueryRequest', $_POST)) {
                handleInsertRequest();
            }

            disconnectFromDB();
        }
    }

    function addToDB($table, $val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8)
    {
        global $db_conn;
        $plainSQL = "";
        if (connectToDB()) {
            switch ($table) {
                case "Lab":
                    $plainSQL = "INSERT into " . $table . " values('" . $val1 . "','" . $val2 . "','" . $val3 . "')";
                    break;
                case "Current Stock":
                    $plainSQL = "INSERT into " . $table . " values('" . $val1 . "','" . $val2 . "','" . $val3 . "','" . $val4 . "',
                    '" . $val5 . "','" . $val6 . "','" . $val7 . "','" . $val8 . "')";
                    break;
                case "Purchase":
                    $plainSQL = "INSERT into " . $table . " values('" . $val1 . "','" . $val2 . "','" . $val3 . "','" . $val4 . "',
                    '" . $val5 . "','" . $val6 . "')";
                    break;
                case "Vendor":
                    $plainSQL = "INSERT into " . $table . " values('" . $val1 . "','" . $val2 . "','" . $val3 . "','" . $val4 . "')";
                    break;
                case "Waste":
                    $plainSQL = "INSERT into " . $table . " values('" . $val1 . "','" . $val2 . "','" . $val3 . "','" . $val4 . "','" . $val5 . "')";
                    break;
                case "Members":
                    $plainSQL = "INSERT into " . $table . " values('" . $val1 . "','" . $val2 . "','" . $val3 . "','" . $val4 . "')";
                    break;
                default:
                    break;
            }
            if (executePlainSQL($plainSQL)) {
                OCICommit($db_conn);
                echo $val1 . ' has ben added to data base';
            } else {
                echo "Fail to add";
            }
        }
        disconnectFromDB();
    }


    // HANDLE ALL GET ROUTES
    // A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
    function handleGETRequest()
    {
        if (connectToDB()) {
            if (array_key_exists('countTuples', $_GET)) {
                handleCountRequest();
            }
            disconnectFromDB();
        }
    }

    if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit'])) {
        handlePOSTRequest();
    } else if (isset($_GET['countTupleRequest'])) {
        handleGETRequest();
    }
    ?>

</body>

</html>