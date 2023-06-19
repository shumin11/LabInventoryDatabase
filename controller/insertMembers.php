<div class="insertMembers" style="text-align: center;
        color: #6A4C9C;
        align-items: center;
        font-family: 'Press Start 2P';
        font-size: 30px;">
    Insert Lab Members
</div>
<br>
<form method="POST" ,action="main.php" style = "text-align: center;">
    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
            Name: <input type="text" name="Name"> <br /><br />
            Email: <input type="text" name="Email"> <br /><br />
            User ID: <input type="text" name="UserID"> <br /><br />
            Phone: <input type="text" name="Phone"> <br /><br />
           
    <input type="submit" value="insertMembers" name="insertMembers"></p>
</form>


<?php
if (isset($_POST['insertMembers'])) {
    addToDB("CurrentStock",$_POST['Name'], $_POST['Email'],$_POST['UserID'],$_POST['Phone'],
    null, null, null, null);
}
?>