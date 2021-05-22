<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Employee's Page</title>
</head>
<body>

<form action="app_form.html" method="post">
        <input id="add_button" type="submit" name="app" value="Submit Request">
</form>
    <table cellpadding = "10" cellspacing="20">
    <tr>
    <th> </th>
    <th> Submission Date</th>
    <th> Start Date</th>
    <th> End Date</th>
    <th> Days Requested</th>
    <th> Status</th>
    </tr>

<?php

$a=0;

for ($j=0; $j<count($date_sub); $j++) {
  $a = $j +1;
  echo "<tr>";
  echo "<td>". $a ."</td>";
  $a = date_create($date_sub[$j]);
  echo "<td>" .date_format($a, 'd/m/Y') ."</td>";
  $a = date_create($start_date[$j]);
  echo "<td>" .date_format($a, 'd/m/Y') ."</td>";
  $a = date_create($end_date[$j]);
  echo "<td>" .date_format($a, 'd/m/Y') ."</td>";
  echo "<td>" .$days_in_total[$j] ."</td>";
  echo "<td>" .$status[$j] ."</td>";
  echo "</tr>";
}
?> 

</table>
 
</body>
</html>