<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <title>Update User</title>
</head>

<body class="back_grad">
    <div class="container">
        <?php
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=employee_vacation','root','password');
            $query = 'SELECT * FROM users';
            $result = $pdo->query($query);

            while ($row=$result->fetch()) {
            $user_id[]=$row['user_id'];
            }

            for ($k=0; $k<count($user_id); $k++) {
                $btn_id = "btn_" .strval($k);
                $up_u_id = "id_" .strval($k);
                if (isset($_POST["$btn_id"])) {
                    $j = $_POST["$up_u_id"];
                    
                    $query = 'SELECT * FROM users WHERE user_id=' .$j;
                    $result = $pdo->query($query);
                    
                    while ($row=$result->fetch()) {
                        $first_name[]=$row['first_name'];
                        $last_name[]=$row['last_name'];
                        $email[]=$row['email'];
                        }
                    break;
                }
            }
            echo '<form id="s_form" action="update_db.php" method="post">
            <div class="row row-content align-items-center justify-content-center">
                <div class="col-12">
                <button id="cancel_button"><a href="cancel_admin.php"> <i class="fa fa-times"></i></a> </button>
                </div>
            </div><br />
            <div class="row row-content align-items-center justify-content-center">
                <div class="col-12">
                    <h3>Update User</h3>
                </div>
            </div>
                <hr><br />
                <div class="row row-content align-items-center justify-content-center">
                    <div class="col-12">
                        <label for="first_name">
                            First Name
                        </label>
                        <input type="hidden" name="hidden_id" value=' .$j. '>
                        <input type="text" name="first_name" value=' .$first_name[0]. ' required><br /><br />
                    </div>
                </div>
                <br /><br />
            <div class="row row-content align-items-center justify-content-center">
                <div class="col-12">
                    <label for="last_name">
                        Last Name
                    </label>
                    <input type="text" name="last_name" value=' .$last_name[0]. ' required><br /><br />
                </div>
            </div>
            <br /><br />
            <div class="row row-content align-items-center justify-content-center">
                <div class="col-12">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" value=' .$email[0]. ' required><br /><br />
                </div>
            </div>
                <br /><br />
                <div class="row row-content align-items-center justify-content-center">
                    <div class="col-12">
                        <label for="pass">
                            Password
                        </label>
                        <input type="password" name="pass" required><br /><br />
                    </div>
                </div>
                    <br /><br />
                    <div class="row row-content align-items-center justify-content-center">
                    <div class="col-12">
                        <label for="c_pass">
                            Confirm Password
                        </label>
                        <input type="password" name="c_pass" required><br /><br />
                    </div>
                    </div>
                    <br /><br />
                    <div class="row row-content align-items-center justify-content-center">
                    <div class="col-12">
                        <label for="type">
                            User Type
                        </label>
                        <select name="type">
                            <option value="employee">employee</option>
                            <option value="admin">admin</option>
                        </select>
                    </div>
                    </div>
                    <br /><br />
                    <div class="row row-content align-items-center justify-content-center">
                        <div class="col-12">
                            <input class="submit_btn" type="submit" name="update" value="Update">
                        </div>
                    </div>
        </form>';
        }
        catch (PDOException $e) {
            $output='Connection Failed';
            echo "$output";
          }

        ?>
    </div>
</body>
</html>