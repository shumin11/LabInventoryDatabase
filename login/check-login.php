<?php

if (isset($_POST["userid"]) && isset($_POST["password"]) && isset($_POST["role"])) {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $userid = test_input($_POST["userid"]);
    $password = test_input($_POST["password"]);
    $role = test_input($_POST["role"]);

    if (empty($userid)) {
        header("Location: index.php?error=UserID is Required");
    } else if (empty($password)) {
        header("Location: index.php?error=Password is Required");
    } else {
        header("Location: ../controller/main.php");
    }
} else {
    header("Location: index.php");
}
