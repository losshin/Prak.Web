 <?php
    session_start();
    require 'connectdb.php';

    // if (isset($_SESSION['login'])) {
    //     header("Location: user.php");
    //     exit;
    // }

    if (isset($_SESSION['user'])==TRUE) {
        header("Location: index.php");
        exit;
        session_destroy();
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style.css">
            <title>Sign In</title>
        </head>
        <body>
            <div class="login" >
                <a href="opening.php">Back</a>
                <center>
                    <form class="formlog" action="./check.php" method="post">
                        <h1>Sign In</h1>
                        <?php if(isset($error)) {
                            echo "<p style='color: red;'>Username atau password salah!</p>";
                        } ?>
                        <input type="text" name="user" placeholder="Username" alt="user" required="required"/><br/><br>
                        <input type="password" name="password" placeholder="Password" alt="password" required="required"/><br/><br/>
                        <input type="submit" name="submit" value="Submit" alt="submit"/>
                    </form><br/>
                </center>
            </div>

            <style>
                .login a {
                    text-decoration: none;
                    padding: 5px;
                    color: rgb(35, 173, 0);
                }

                form.formlog {
                    margin-top: 200px;
                    border: #11002a;
                    padding: 20px;
                    background-color: rgba(53, 53, 53, 0.308);
                    width: 400px;
                    padding-bottom: 45px;
                    border-radius: 10px;
                }

                form.formlog input{
                    background-color: black;
                    border: none;
                    color: rgb(35, 173, 0);
                    padding: 9px;
                    border-radius: 5px;
                }

                form.formlog input[type="submit"] {
                    color: rgba(53, 53, 53);
                    background-color: rgb(35, 173, 0);
                }
                
                form.formlog input[type="submit"]:hover {
                    color: rgb(35, 173, 0);;
                    background-color: black;
                    transition: 0.5s;
                }

                h1 {
                    padding: 25px;
                }
            </style>
        </body>
        </html>
<?php } ?>
