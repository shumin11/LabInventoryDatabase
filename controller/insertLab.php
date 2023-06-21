<div class="insertLab" style="text-align: center;
        color: #6A4C9C;
        align-items: center;
        font-family: 'Press Start 2P';
        font-size: 30px;">
    Insert Lab
</div>
<br>
<form method="POST" ,action="main.php" style="text-align: center;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
    Name: <input type="text" name="Name"> <br /><br />
    Lab ID: <input type="text" name="LabID"> <br /><br />
    Address: <input type="text" name="Address"> <br /><br />
    <input type="submit" value="insertLab" name="insertLab"></p>
</form>

<?php
if (isset($_POST['insertLab'])) {
    // addTeam($_POST['teamName'], $_POST['region']);
    addToDB("Lab", $_POST['LabID'], $_POST['Name'],$_POST['Address'], null, null, null, null, null);
}
?>