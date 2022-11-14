<?php
    session_start();
    include 'connectdb.php';

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit;
    }

    if (isset($_GET['search'])) {
        $keywoard = $_GET['keywoard'];
        $result = mysqli_query($conn, "SELECT * FROM warships WHERE ships_name LIKE '%$keywoard%'");
    } else {
        $result = mysqli_query($conn, "SELECT * FROM warships");
    }

    $warships = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $warships[] = $row;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MW-Information</title>
</head>
<body>

    <?php
        require 'connectdb.php';

        $result = mysqli_query($conn, "SELECT * FROM warships");

        $warships = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $warships[] = $row;
        }
    ?>

    <style>
        nav {
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            width: auto;
            margin: 30px 15px 20px;
            border-radius: 5px;
            padding: 25px;
            color: rgb(35, 173, 0);
            background-color: rgba(128, 128, 128, 0.062);
            align-items: center;
        }
        
        .btn-head .add-btn {
            text-decoration: none;
            margin-right: -100px;
            color: black;
        }
        
        .btn-head .add-btn:hover {
            transition: 0.5s;
            color: rgb(35, 173, 0);
        }
        
        .heading h2 {
            margin: 20px;
            margin-left: 0;
        }
        
        .heading .btn-head {
            right: -120px;
            padding: 10px;
            margin: 5px;
            display: block;
            background-color: rgb(35, 173, 0);
            align-self: center;
        }
        
        .heading .btn-head:hover {
            transition: 0.5s;
            background-color: black;
        }

        .table{
            color: rgb(35, 173, 0);
            padding: 30px;
            width: 100%;
        }

        .table .heading {
            align-items: center;
        }

        .table .thead {
            border: 20px red;
        }

        .heading {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            background-color: black;
            color: rgb(35, 173, 0);
        }

        .heading .form-outline {
            padding: 20px;
            margin-top: 3px;
        }

        .form-outline input {
            text-align: center;
            margin-top: -5px;
            background-color: green;
            border-radius: 2px;
            padding: 2px;
            border: none;
        }

        .form-outline button {
            background-color: rgb(35, 173, 0);
            color: black;
            border: none;
            padding: 2px;
            border-radius: 5px;
        }
        
        .form-outline button:hover {
            background-color: black;
            color: rgb(35, 173, 0);
        }

        .logout {
            border-radius: 5px;
            background-color:  rgb(35, 173, 0);
            text-decoration: none;
            color: black;
            padding: 3px;
        }
        
        .logout:hover {
            text-decoration: none;
            color: rgb(35, 173, 0);
            transition: 0.5s;
            background-color: transparent;
        }

        @media screen and (max-width: 476px) {
            .heading .btn-head {
                right: -20px;
                padding: 10px;
                margin: 5px;
            }

        }
        
        @media screen and (max-width: 876px) {
            .heading .btn-head {
                right: -100px;
                padding: 10px;
                margin: 5px;
            }
            
            .heading h2 {
                width: 0px;
            }
        }
    </style>

    <nav>
        <div class="title">Warships Information</div>
        <div class="btn-out">
            
            <a href="opening.php" class="logout">Log out
                <?php
                    session_destroy();
                ?>
            </a>
        </div>
    </nav>
    <table class="table">
        <div class="heading">
            <h2>Ships Information</h2>
            <div class="form-outline">
                <input type="text" name="search" id="search" class="search-control" placeholder="search">
                <button type="submit" name="search">
                    Search
                </button>
            </div>
        </div>
        <thead class="thead">
            <tr>
                <th scope="col">Thumbnail</th>
                <th scope="col">Ships_name</th>
                <th scope="col">Equipment</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($warships as $wrshp) :?>
            <tr>
                <th><?php echo $wrshp["thumbnail"] ?></th>
                <th><?php echo $wrshp["ships_name"] ?></th>
                <th><?php echo $wrshp["equipments"] ?></th>
                <th><?php echo $wrshp["date"] ?></th>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
</body>
</html>