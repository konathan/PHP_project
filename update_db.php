<?php

if (isset($_POST['create'])) {
    try {
        $id = 
        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $mail = $_POST['email'];
        $pass = $_POST['pass'];
        $t = $_POST['type'];

        $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation','root','password');
        $query = 'UPDATE users SET first_name=$fn, last_name=$ln, email=$email, passcode=$pass, user_type=$t WHERE users.user_id=......';
        $pdo->exec($query);

        include 'admin.php';
    }
    catch (PDOException $e) {
        $output='Connection Failed';
        echo "$output";
    }
}
?>