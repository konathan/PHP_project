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
<body>
    <form action="new.html" method="post">
        <input id="add_button" type="submit" name="new" value="Add User">
    </form>
    <table id="users_table" cellpadding = "10" cellspacing="20">
    <tr>
    <th> ID</th>
    <th> First Name</th>
    <th> Last Name</th>
    <th> Email</th>
    <th> User Type</th>
    <th> </th>
    </tr>

    <?php
    for ($j=0; $j<count($email); $j++) {
        $btn_id = "btn_" .strval($j);
        $up_u_id = "id_" .strval($j);
        echo "<tr>";
        echo "<td>" .$user_id[$j] ."</td>";
        echo "<td>" .$first_name[$j] ."</td>";
        echo "<td>" .$last_name[$j] ."</td>";
        echo "<td>" .$email[$j] ."</td>";
        echo "<td>" .$type[$j] ."</td>";
        echo "<td> <form action='update_form.php' method='post'>
        <input type='hidden' name=" .$up_u_id. " value=" .$user_id[$j]. ">
        <input type='submit' name=" .$btn_id. " value='Update'></td>";
        echo "</tr>"; 
    }
    ?>
    
</table>
</body>
</html>