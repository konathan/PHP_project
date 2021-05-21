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
    <table cellpadding = "10" cellspacing="20">
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
        echo "<tr>";
        echo "<td>" .$user_id[$j] ."</td>";
        echo "<td>" .$first_name[$j] ."</td>";
        echo "<td>" .$last_name[$j] ."</td>";
        echo "<td>" .$email[$j] ."</td>";
        echo "<td>" .$type[$j] ."</td>";
        echo "<td> <button onclick='onClick(this)'> Update </button> </td>";
        echo "</tr>"; 
    }
    ?>

<script type="text/Javascript">
function onClick(e) {
    var currentRow = $(e).closest('tr');
    alert(currentRow.id);
}
<script>
    
</table>
</body>
</html>