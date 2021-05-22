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
        $row_id = "row_" .strval($j);
        echo "<tr>";
        echo "<td>" .$user_id[$j] ."</td>";
        echo "<td id=" .$row_id. "_0>" .$first_name[$j] ."</td>";
        echo "<td id=" .$row_id. "_1>" .$last_name[$j] ."</td>";
        echo "<td id=" .$row_id. "_2>" .$email[$j] ."</td>";
        echo "<td id=" .$row_id. "_3>" .$type[$j] ."</td>";
        echo "<td> <a href='update_form.php'><button onclick='onClick(this)'> Update </button></a> </td>";
        echo "</tr>"; 
    }
    
    echo '<script type="text/Javascript">
    function onClick(btn) {    
        var y=[];
        for ($q=0; $q<4; $q++) {
            y[$q] = document.getElementById("row_" .srtval($q));
        }
    }
    <script>';
    ?>
    
</table>
</body>
</html>