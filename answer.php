<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Asnwer</title>
</head>
<body>

<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation','root','password');
    
    if (isset($_POST['approve'])) {
        $final = "Approve";
        $query = "UPDATE vacation (app_status) VALUES ('$final') WHERE vacation.user_id = " .$u_id. "AND vac_id = " .$_SESSION['app_id'];
    }
    elseif (isset($_POST['reject'])) {
        $final = "Reject";
        $query = "UPDATE vacation (app_status) VALUES ('$final') WHERE vacation.user_id = " .$u_id. "AND vac_id = " .$_SESSION['app_id'];
    }

$to = $user_mail;
$subject = "Vacation Request Processed";

$message = "
<html>
<head>
<title>Application Status</title>
</head>
<body>
<p>Dear employee, your supervisor has <b>" .$final. "</b> your application <br />
submitted on " .$_SESSION['sub_date']. ".
</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <kathanasa@gapps.auth.gr>' . "\r\n";

mail($to,$subject,$message,$headers);
}
catch (PDOException $e) {
    $output='Connection Failed';
    echo "$output";
}

?>

</body>
</html>