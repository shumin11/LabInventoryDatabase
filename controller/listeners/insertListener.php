    <?php
    
    if (
        isset($_POST['labTag'])|| isset($_POST['insertLab'])
    ) {
        include('insertLab.php');
    } elseif (
        isset($_POST['currentStockTag'])|| isset($_POST['insertCurrentStock']) 
        || isset($_POST['currentStockFilter']) || isset($_POST['currentStockClick'])
    ) {
        include('insertCurrentStock.php');
    } elseif (
        isset($_POST['purchaseTag'])|| isset($_POST['insertPurchase']) || isset($_POST['purchaseFilter'])
    ) {
        include('insertPurchase.php');
    } elseif (
        isset($_POST['vendorTag'])|| isset($_POST['insertVendor'])
        || isset($_POST['vendorClick']) || isset($_POST['deleteVendor'])
    ) {
        include('insertVendor.php');
    } elseif (
        isset($_POST['wasteTag'])|| isset($_POST['insertWaste'])
    ) {
        include('insertWaste.php');
    } elseif (
        isset($_POST['memberTag'])|| isset($_POST['insertMember'])
    ) {
        include('insertMembers.php');
    } 
    ?>

    
  
