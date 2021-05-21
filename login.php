<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Vacation Booking</title>
</head>
<body>

<?php
if (isset($_POST['submit'])) {
try {
  $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation','root','password');
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

  $k=0;

  for ($i=0; $i<count($first_name); $i++) {
    if ($_POST['user_email'] == $email[$i] && $_POST['user_password'] == $password[$i]) {
      $k=0;
      $u_id=$user_id[$i];
      $full_name = $first_name[$i]. " " .$last_name[$i];
      $user_mail = $email[$i];
      $u_type=$type[$i];
      break;
    } 
    else {
      $k++;
    } 
  }

  if ($k==0) {
    if ($u_type == 'employee') {
    $query = 'SELECT * FROM vacation WHERE vacation.user_id = ' .$u_id. ' ORDER BY date_sub DESC';
    $result = $pdo->query($query);

    while ($row=$result->fetch()) {
      $date_sub[]=$row['date_sub'];
      $start_date[]=$row['start_date'];
      $end_date[]=$row['end_date'];
      $days_in_total[]=$row['days_in_total'];
      $status[]=$row['app_status'];
    }
      include 'employee.php';
    }
    elseif ($u_type == 'admin') {
      include 'admin.php';
    }
  }
  else {
    include 'login.html';
  }
}
catch (PDOException $e) {
  $output='Connection Failed';
  echo "$output";
}
}
?> 
 
</body>
</html>