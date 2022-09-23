<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $issue = $_POST['issue'];

    //Database Connection
    $conn = new mysqli('localhost', 'root', '', 'conncect');

    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("insert into registration(name , email, subject, issue) values(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $issue);
        $stmt->execute();
        echo "Registration Successfully...";
        $stmt->close();
        $conn->close();
    }

?>