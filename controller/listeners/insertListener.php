    <?php
    echo "why";
    if (
        isset($_POST['labTag'])|| isset($_POST['insertLab'])
    ) {
        include('insertLab.php');
    } elseif (
        isset($_POST['currentStockTag'])|| isset($_POST['insertCurrentStock'])
    ) {
        include('insertCurrentStock.php');
    } elseif (
        isset($_POST['purchaseTag'])|| isset($_POST['insertPurchase'])
    ) {
        include('insertPurchase.php');
    } elseif (
        isset($_POST['vendorTag'])|| isset($_POST['insertVendor'])
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

    
  
