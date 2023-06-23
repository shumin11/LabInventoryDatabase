<?php
global $currentStock;
global $vendor;

if (isset($_POST['labTag']) || isset($_POST['insertLab'])) {
    displayFromDB("Lab", "ALL", null);
} elseif (isset($_POST['currentStockFilter'])) {
    $value = $_POST['currentStockFilter'];
    if ($value == "ALL") {
        displayFromDB("Items", "ALL", null);
    } else {
        displayFromDB("Items", "Type", $value);
    }
} elseif (isset($_POST['purchaseFilter'])) {
    $value = $_POST['purchaseFilter'];
    if ($value == "ALL") {
        displayFromDB("Purchase", "ALL", null);
    } else {
        displayFromDB("Purchase", "Name", $value);
    }
} elseif (isset($_POST['vendorTag']) || isset($_POST['insertVendor'])) {
    displayFromDB("Vendors", "ALL", null);
} elseif (isset($_POST['wasteTag']) || isset($_POST['insertWaste'])) {
    displayFromDB("Chemical_Waste_Dispose", "ALL", null);
} elseif (isset($_POST['memberTag']) || isset($_POST['updateMembers']) || isset($_POST['insertMembers'])) {
    displayFromDB("LabMembers", "ALL", null);
} elseif (isset($_POST['currentStockClick'])) {
    $currentStock = $_POST['currentStockClick'];
    include('currentStockDisplay.php');
} elseif (isset($_POST['vendorClick']) || isset($_POST['delete'])) {
    $vendor = $_POST['vendorClick'];
    include('vendorDisplay.php');
}
