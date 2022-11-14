<?php
    require 'connectdb.php';
    session_start();
    if (isset($_SESSION['user'])) {
        echo '<script>window.location.replace("./index.php");</script>';
    } else {
        
        if (isset($_POST["submit"])) {

            $user = $_POST["user"];
            $password = $_POST["password"];

            $result = mysqli_query($conn, "SELECT * FROM accounts WHERE username = '$user'");
            $result1 = mysqli_query($conn, "SELECT * FROM accounts WHERE password = '$password'");
            
            if ($user == "admin" && $password == "admin") {
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['login'] = true;
                
                echo "<script>
                alert('Selamat Datang Administrator');
                document.location.href = 'admin.php';
                </script>";
                
            } else if ($user != "admin" && $password == "admin") {
                echo "<script>
                alert('Username salah');
                document.location.href = 'login.php';
                </script>";
                
            } else if ($user == "admin" && $password != "admin") {
                echo "<script>
                alert('Password salah');
                document.location.href = 'login.php';
                </script>";
                
            } else if ($user = $result && $password = $result1) {    
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['password'] = $password;
                echo "<script>
                alert('Welcome To MWI');
                document.location.href = 'index.php';
                </script>";
                                
            } else if ($user != $result && $password = $result1) {    
                session_start();
                echo "<script>
                alert('username salah');
                document.location.href = 'login.php';
                </script>";
                                
            } else if ($user = $result && $password != $result1) {    
                session_start();
                echo "<script>
                alert('password salah');
                document.location.href = 'login.php';
                </script>";
                                
            } else {
                echo "<script>
                alert('Username atau Password salah');
                document.location.href = 'register.php';
                </script>";
            }

        } else {   
            // if ($user == $accnt && $password == $passw) {
            //     // echo '<meta http-equiv="refresh" content="2 ; url=./index.php"/>';
            //     header("Location: index.php");
            //     exit;
            // }
        }
    }  
?>