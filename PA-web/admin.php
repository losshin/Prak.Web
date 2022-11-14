
<?php
session_start();
include 'connectdb.php';

if(!isset($_SESSION['login'])==TRUE) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <title>Administrator</title>
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
        * {
            padding: 0;
            margin: 0;
            font-family:'Courier New', Courier, monospace;
        }

        body {
            width: 100%;
            background-color:rgb(1, 4, 24);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }
        
        nav {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: auto;
            margin: 30px 15px 0px;
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
            margin-left: -150px;
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

        .logout {
            border-radius: 5px;
            background-color:  rgb(35, 173, 0);
            text-decoration: none;
            color: black;
            padding: 5px;
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

    <nav class="navigator-admin">
        <div class="adminpage">
            <h1>Administrator</h1>
        </div>
        <ul>
        
        </ul>
    </nav>
    <br>
    <table class="table">
        <div class="heading">
            <h2>Ships Information</h2>
            <nav class="btn-head">
                <a href="tambah.php" class="add-btn" style="height: 40px;" rol="button">
                    Tambah    
                </a>
            </nav>
        </div>
        <thead class="thead">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Thumbnail</th>
                <th scope="col">Ships_name</th>
                <th scope="col">Equipment</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($warships as $wrshp) :?>
            <tr>
                <th><?php echo $wrshp["id"] ?></th>
                <th><?php echo $wrshp["thumbnail"] ?></th>
                <th><?php echo $wrshp["ships_name"] ?></th>
                <th><?php echo $wrshp["equipments"] ?></th>
                <th><?php echo $wrshp["date"] ?></th>
                <th>
                    <a href="edit.php?id=<?php echo $wrshp["id"]; ?>" class="succes-btn">edit</a>
                    <a href="delete.php?id=<?php echo $wrshp["id"]; ?>" class="danger-btn" onclick="return confirm('yakin mas?');" role="button"><i>delete</i></a>
                </th>
            </tr>
            <?php $i++; endforeach; ?>
        </tbody>
    </table>
    <center>
        <div class="btn-out">
            <a href="logout.php" class="logout">Log out</a>
        </div>
    </center>
</body>
</html>

