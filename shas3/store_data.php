<?php
//database details and variables
global $hostserver;
global $username;
global $password;
global $database;
global $conn;
$hostserver = '127.0.0.1';
$username = 'shas3';
$password = 'shas3@123';
$database = 'mydb';
$conn = mysqli_connect($hostserver, $username, $password, $database);
$getQuery = "select * from form";
$result = mysqli_query($conn, $getQuery);
if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}
class Student
{
    public function main()
    {
        $hostserver = '127.0.0.1';
        $username = 'shas3';
        $password = 'shas3@123';
        $database = 'mydb';
        $conn = mysqli_connect($hostserver, $username, $password, $database);
        //When user submits the form run the below code
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // collect value of input field
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $address = $_POST['address'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            //fetch firstname exist or not
            $fnameQuery = "SELECT fname FROM form";
            $fnameResult = mysqli_query($conn, $fnameQuery);
            while ($fnameFetch = mysqli_fetch_array($fnameResult)) {
                if ($fname == $fnameFetch['fname']) {
                    echo "
                <script>
                    alert('User Already exist');
                    history.back();
                </script>
            ";
                    die();
                }
            }
            //insertion Query
            $sqlQuery = "insert into form(fname, mname, lname, email, gender, dob, address) values('$fname','$mname','$lname','$email','$gender','$dob','$address')";
            $commit = "commit;";
            if (mysqli_query($conn, $sqlQuery)) {
                mysqli_query($conn, $commit);
                echo "
            <script>alert('Data Inserted Successfully');</script>
                ";
            } else {
                die("something went Wrong : " . mysqli_connect_error());
            }
        }
    }
}
$obj1 = new Student();
$obj1->main();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        div.container {
            border-radius: 5px;
            position: absolute;
            opacity: 100%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }

        table,
        thead,
        tr,
        th {
            opacity: 100%;
        }
    </style>
</head>

<body>

    <script>
        this.blur();
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <div class="container-fluid">
        <div class="container">
            <h1>Student database</h1>
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Middle name</th>
                        <th>Last name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Date of birth</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "
                            <tr>
                                <td> " . $data['fname'] . "</td>
                                <td> " . $data['mname'] . "</td>
                                <td> " . $data['lname'] . "</td>
                                <td> " . $data['gender'] . "</td>
                                <td> " . $data['email'] . "</td>
                                <td> " . $data['dob'] . "</td>
                                <td> " . $data['address'] . "</td>
                            </tr>
                            ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>