<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee's Page</title>
</head>
<body>
<?php

if(isset($_POST['app_sub'])) {
  try{
    $sub_date = date('Y-m-d');
    $start = date_create($_POST['start']);
    $end = date_create($_POST['end']);
    $total_days = date_diff($start,$end);
    $total = intval($total_days->format('%a'));
    $start = $_POST['start'];
    $end = $_POST['end'];
    $reason = $_POST['reason'];
    $app_status = "Pending";

    $u_id = intval($_SESSION['u_id']);
    $full_name = $_SESSION['full_name'];
    $user_mail = $_SESSION['user_mail'];
    $u_type = $_SESSION['u_type'];

    $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation','root','password');
    $query = "INSERT INTO vacation (date_sub, vac_start, vac_end, days_in_total, reason, app_status, user_id) VALUES ('$sub_date', '$start', '$end', '$total', '$reason', '$app_status', '$u_id')";
    $result = $pdo->exec($query);

    $query = "SELECT * FROM vacation WHERE vacation.user_id = " .$u_id. " ORDER BY date_sub DESC";
    $result = $pdo->query($query);

    while ($row=$result->fetch()) {
        $date_sub[]=$row['date_sub'];
        $start_date[]=$row['vac_start'];
        $end_date[]=$row['vac_end'];
        $days_in_total[]=$row['days_in_total'];
        $status[]=$row['app_status'];
      }
      
    include 'employee.php';

    $query = "SELECT vac_id FROM vacation WHERE vacation.user_id = " .$u_id. "AND date_sub = " .$sub_date;
    $result = $pdo->query($query);

    while ($row=$result->fetch()) {
    $app_id = $row['vac_id'];
    }    

$reason = wordwrap($reason,50,"<br>\n");

$to = "kathanasa@gapps.auth.gr";
$subject = "Vacation Request";

$message = "
<html>
<head>
<title>Submitted Request</title>
</head>
<body>
<p>Dear supervisor, employee " .$full_name. " requested for some time off, <br />
starting on <b>" .$start. "</b> and ending on <b>" .$end. "<b/> stating the reason: <br /> <i>" .$reason.
"</i> <br /><br />
Click on one of the below links to approve or reject the application
</p>
<form action='answer.php' method='post'>
<input type='submit' name='approve' value='Approve'>
</form>
<form action='answer.php' method='post'>
<input type='submit' name='reject' value='Reject'>
</form>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: ' .$user_mail. "\r\n";

mail($to,$subject,$message,$headers);
}

catch (PDOException $e) {
  $output='Connection Failed';
  echo "$output";
}
}

?>
</body>
</html>