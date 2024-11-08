<?php
session_start();

if (session_status() >= 0) {
    if (isset($_SESSION["email"])) {
        header("refresh: 0.5; url=PRIVATE.PHP");
        exit();
    }
}

if (isset($_POST["reset"])) {
    $email = $_POST["email"];
    $newpass = $_POST["newpass"];
    $confirmpass = $_POST["confirmpass"];
    $securityAnswer = $_POST["security_question"];

    $conn = mysqli_connect('localhost', 'root', '', 'bookborrow');
    $sql = "SELECT * FROM logintb WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
     
        if (strcasecmp($row['security_question'], $securityAnswer) === 0) {
            $sql = "UPDATE logintb SET Password = '$newpass' WHERE Email = '$email'";
            mysqli_query($conn, $sql);
            echo "Your Password Change Successfully done";
            header("refresh: 2; url=index.html");
            exit();
        } else {
            echo "Incorrect security answer.";
            header("refresh: 2; url=index.php");
            exit();
        }
    } else {
        echo "User not found";
        header("refresh: 2; url=index.php");
        exit();
    }
}

if (!isset($_POST["reset"])) {
    echo "Fill in all fields." . "<br>";
    header("refresh: 2; url=index.php");
}
?>
