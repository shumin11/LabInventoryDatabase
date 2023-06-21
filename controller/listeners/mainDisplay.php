<?php
global $...;;

if (isse($_POST['labTag'])|| isset($_POST['insertLab'])) {
    displayFromDB("Lab", "ALL", null);
} elseif (isset($_POST['currentStockTag'])) {
    $value = $_POST['currentStockFilter'];
    if ($value == "ALL") {
        displayFromDB("Items", "ALL", null);
    } else {
        displayFromDB("Items", "Type", $value);
    }
} elseif (isset($_POST['purchaseTag'])) {
    $value = $_Post['purchaseFilter'];
    if ($value == "ALL") {
        displayFromDB("Purchase", "ALL", null);
    } else {
        displayFromDB("Purchase", "Name", $value);
    }
} elseif (isset($_POST['vendorTag'])|| isset($_POST['insertVendor'])) {
    displayFromDB("Vendors", "ALL", null);
} elseif (isset($_POST['wasteTag'])|| isset($_POST['insertWaste'])) {
    displayFromDB("Chemical_Waste","ALL", null);
} elseif (isset($_POST['memberTag'])|| isset($_POST['insertMember']) || isset($_POST['insertMembers'])) {
    displayFromDB("LabMember","ALL", null);
} elseif (isset($_POST['currentStockClick'])) {
    $currentStock = $_POST['currentStockClick'];
    include('currentStockDisplay.php');
} elseif (isset($_POST['vendorClick'])) {
    $vendor = $_POST['vendorClick'];
    include('vendorDisplay.php');
} 