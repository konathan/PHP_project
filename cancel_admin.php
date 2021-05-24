<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Admin's Page</title>
</head>

<body style="background-color: rgba(0, 0, 0, 0.8);">
    <form class="upper_btn" action="new.html" method="post">
        <input id="add_button" type="submit" name="new" value="Add User">
    </form>
    <table cellpadding="10" cellspacing="20">
        <tr>
            <th> ID</th>
            <th> First Name</th>
            <th> Last Name</th>
            <th> Email</th>
            <th> User Type</th>
            <th> </th>
        </tr>

        <?php

        $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation', 'root', 'password');
        $query = 'SELECT * FROM users';
        $result = $pdo->query($query);

        while ($row = $result->fetch()) {
            $user_id[] = $row['user_id'];
            $first_name[] = $row['first_name'];
            $last_name[] = $row['last_name'];
            $email[] = $row['email'];
            $password[] = $row['passcode'];
            $type[] = $row['user_type'];
        }

        for ($j = 0; $j < count($email); $j++) {
            if ($j == 0 || $j % 2 == 0) {
                $tr_class = "even";
            } elseif ($j == 1 || $j % 2 != 0) {
                $tr_class = "odd";
            }
            $btn_id = "btn_" . strval($j);
            $up_u_id = "id_" . strval($j);
            echo "<tr class=" . $tr_class . ">";
            echo "<td>" . $user_id[$j] . "</td>";
            echo "<td>" . $first_name[$j] . "</td>";
            echo "<td>" . $last_name[$j] . "</td>";
            echo "<td>" . $email[$j] . "</td>";
            echo "<td>" . $type[$j] . "</td>";
            echo "<td> <form action='update_form.php' method='post'>
        <input type='hidden' name=" . $up_u_id . " value=" . $user_id[$j] . ">
        <input class='update_btn' type='submit' name=" . $btn_id . " value='Update'></td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>

</html>