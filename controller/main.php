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
                <h1>Lab Inventory Management System</h1>
            <div class="top-buttons">
                <button>Sign Out</button>
            </div>
        </div>

        <div class="d-flex">
            <div class="leftpane">
                <div class = "sidebar">
                    

                    <form method="POST" action="main.php">
                        <li>
                            <input type="submit" name="teamTag" value="Lab" />
                        </li>

                        <li>
                        <input type="submit" name="currentStockTag" value="CURRENT STOCK" />
                        </li>

                        <li>
                        <input type="submit" name="purchaseTag" value="PURCHASE" />
                        </li>

                        <li>
                        <input type="submit" name="vendorTag" value="VENDOR" />
                        </li>

                        <li>
                        <input type="submit" name="wasteTag" value="WASTE" />
                        </li>

                        <li>
                        <input type="submit" name="memberTag" value="MEMBERS" />
                        </li>           
                     </form>

                        <!-- <li>
                            <a href="Lab.php">LAB</a>
                        </li>
                        <li><a href="CurrentStock.php">CURRENT STOCK</a></li>
                        <li><a href="Purchase.php">PURCHASE</a></li>
                        <li><a href="Vendor.php">VENDOR</a></li>
                        <li><a href="Waste.php">WASTE</a></li>
                        <li><a href="Members.php">MEMBERS</a></li> -->
                    
                </div>
                 

             </div>

            <div class="middlepane">
                Test Page



            </div>

            <div class="rightpane">
                
            <h2>Insert </h2>
                <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
                    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
                     Number: <input type="text" name="insNo"> <br /><br />
                     Name: <input type="text" name="insName"> <br /><br />

                    <input type="submit" value="Insert" name="insertSubmit"></p>
                 </form>

            <h2>Update </h2>   
                <form method="POST" action="oracle-test.php"> <!--refresh page when submitted-->
                    <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                        Old Name: <input type="text" name="oldName"> <br /><br />
                        New Name: <input type="text" name="newName"> <br /><br />

                    <input type="submit" value="Update" name="updateSubmit"></p>
                </form>

            </div>
         </div>
    </div>
            


    </body>
</html>