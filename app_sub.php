<?php

if(isset($_POST['app_sub'])) {
    $sub_date = date('Y-m-d');
    $start = $_POST['start'];
    $end = $_POST['end'];
    $total_days = date_diff($start,$end);
    $total_days = $total_days->format("%a");
    $reason = $_POST['reason'];
    $app_status = "Pending";

    $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation','root','password');
    $query = "INSERT INTO vacation (date_sub, start_date, end_date, days_in_total, reason, app_status, used_id) VALUES ('$sub_date', '$start', '$end', '$total_days', '$reason', '$app_status', '$u_id')";
    $pdo->exec($query);

    $query = 'SELECT * FROM users';
    $result = $pdo->query($query);

    while ($row=$result->fetch()) {
        $date_sub[]=$row['date_sub'];
        $start_date[]=$row['start_date'];
        $end_date[]=$row['end_date'];
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

?>