<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Create new User</title>
</head>

<body>
    <div class="container">
        <?php
        echo 
        '<form action="update_db.php" method="post">
            <div class="row row-content align-items-center justify-content-center">
                <div class="col-12">
                    <h3>Update User</h3>
                </div>
                <hr><br />
                <div class="row row-content align-items-center justify-content-center">
                    <div class="col-12">
                        <label for="first_name">
                            First Name
                        </label>
                        <input type="text" name="first_name" value=$....... required><br /><br />
                    </div>
                </div>
            </div>
            <div class="row row-content align-items-center justify-content-center">
                <div class="col-12">
                    <label for="last_name">
                        Last Name
                    </label>
                    <input type="text" name="last_name" required><br /><br />
                </div>
            </div>
            <br /><br />
            <div class="row row-content align-items-center justify-content-center">
                <div class="col-12">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" required><br /><br />
                </div>
                <br /><br />
                <div class="row row-content align-items-center justify-content-center">
                    <div class="col-12">
                        <label for="pass">
                            Password
                        </label>
                        <input type="password" name="pass" required><br /><br />
                    </div>
                    <br /><br />
                    <div class="col-12">
                        <label for="c_pass">
                            Confirm Password
                        </label>
                        <input type="password" name="c_pass" required><br /><br />
                    </div>
                    <br /><br />
                    <div class="col-12">
                        <label for="type">
                            User Type
                        </label>
                        <select name="type">
                            <option value="admin">admin</option>
                            <option value="employee">employee</option>
                        </select>
                    </div>
                    <br /><br />
                    <div class="row row-content align-items-center justify-content-center">
                        <div class="col-12">
                            <input type="submit" name="create" value="Create">
                        </div>
                    </div>
                </div>
            </div>
        </form>';
        ?>
    </div>
</body>

</html>