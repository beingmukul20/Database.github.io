<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";
    $con = mysqli_connect($server, $username, $password);

    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`,  `other`) VALUES ('$name', '$desc');";

    if ($con->query($sql) == true) {
        // echo "Successfully inserted";

        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IIT BOMBAY</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;

            font-family: 'Roboto', sans-serif;
        }

        .container {
            max-width: 80%;
            padding: 34px;
            margin: auto;
        }

        .container h1 {
            text-align: center;
            font-family: 'Sriracha', cursive;
            font-size: 40px;
        }

        p {
            font-size: 17px;
            text-align: center;
            font-family: 'Sriracha', cursive;
        }

        input,
        textarea {

            border: 2px solid black;
            border-radius: 6px;
            outline: none;
            font-size: 16px;
            width: 80%;
            margin: 11px 0px;
            padding: 7px;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .btn {
            color: white;
            background: purple;
            padding: 8px 12px;
            font-size: 20px;
            border: 2px solid white;
            border-radius: 14px;
            cursor: pointer;
        }

        .bg {
            width: 100%;
            position: absolute;
            z-index: -1;
            opacity: 0.6;
        }

        .submitMsg {
            color: green;
        }

        table {
            width: 50%;
            margin: 30px auto;
            border-collapse: collapse;
        }

        tr {
            border-bottom: 1px solid #cbcbcb;
        }

        th {
            font-size: 19px;
        }

        th,
        td {
            text-align: center;
            border: none;
            height: 30px;
            padding: 2px;
        }

        tr:hover {
            background: #E9E9E9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to IIT Bombay</h3>
            <p>Enter your details. </p>

            <form action="index.php" method="post">
                <input type="text" name="name" id="name" placeholder="Enter your name" required>
                <textarea name="desc" id="desc" cols="3" rows="1" placeholder="Enter Your Roll No." required></textarea>
                <button class="btn">Submit</button>
                <script>
                    history.pushState({}, "", "")
                </script>

            </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>SNo.</th>
                <th>Name</th>
                <th>Roll No.</th>
            </tr>
        </thead>

        <tbody>
            <?php
            // select all tasks if page is visited or refreshed
            $con = mysqli_connect("127.0.0.1", "root", "", "trip");
            // $sql = "SELECT * FROM trip";

            // $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            $trip = mysqli_query($con, "SELECT * FROM trip");

            $i = 1;
            while ($row = mysqli_fetch_array($trip)) { ?>
                <tr>
                    <td> <?php echo $i; ?> </td>
                    <td> <?php echo $row['name']; ?> </td>
                    <td> <?php echo $row['other']; ?> </td>

                </tr>
            <?php $i++;
            } ?>
        </tbody>
    </table>
</body>

</html>