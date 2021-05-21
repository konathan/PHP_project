<?php

if (isset($_POST['create'])) {
    try {
        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $mail = $_POST['mail'];
        $pass = $_POST['pass'];
        $t = $_POST['t'];

        $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation','root','password');
        $query = "INSERT INTO users (first_name, last_name, email, passcode, user_type) VALUES ('$fn', '$ln', '$mail', '$pass', '$t')";
        $pdo->exec($query);

        $query = 'SELECT * FROM users';
        $result = $pdo->query($query);

        while ($row=$result->fetch()) {
            $user_id[]=$row['user_id'];
            $first_name[]=$row['first_name'];
            $last_name[]=$row['last_name'];
            $email[]=$row['email'];
            $password[]=$row['passcode'];
            $type[]=$row['user_type'];
        }
        include 'admin.php';
    }
    catch (PDOException $e) {
        $output='Connection Failed';
        echo "$output";
    }
}
?>