<?php

if (isset($_POST['update'])) {
    try {
        $id = $_POST['hidden_id'];
        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $mail = $_POST['email'];
        $pass = $_POST['pass'];
        $t = $_POST['type'];

        $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation','root','password');
        $query = "UPDATE users SET first_name='$fn', last_name='$ln', email='$mail', passcode='$pass', user_type='$t' WHERE user_id='$id'";
        $result = $pdo->exec($query);

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