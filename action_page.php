<?php
function primary_alert()
{
    echo "
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
    <div class='alert alert-danger' role='alert'>
      This is primary alert!
    </div>
  ";
}
function dbConnect()
{

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $address = $_POST['address'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $fnameB = true;
    $mnameB = true;
    $addressB = true;
    $lnameB = true;
    $emailB = true;
    $genderB = true;
    $dobB = true;

    if (empty($fname)) {
        //echo "<script> alert('Empty First name'); history.go(-1); </script>";
    } else {
        $fnameB = true;
    }

    if (empty($mname)) {
        //echo "";
    } else {
        $mnameB = true;
    }

    if (empty($lname)) {
        //echo "<script> alert('Last name empty'); history.go(-1); </script>";
    } else {
        $lnameB = true;
    }

    if (empty($email)) {
        //echo "<script> alert('email is empty'); history.go(-1); </script>";
    } else {
        $emailB = true;
    }

    if (empty($gender)) {
        //echo "<script> alert('No Gender selected'); history.go(-1); </script>";
    } else {
        $genderB = true;
    }

    if (empty($dob)) {
        //echo "<script> alert('Empty DOB'); history.go(-1); </script>";
    } else {
        $now = date("Y-m-d");
        if ($dob > $now) {
            //primary_alert();
        } else {
            $dobB = true;
        }
    }

    if (empty($address)) {
        //echo "<script> alert('Address is empty'); history.go(-1); </script>";
    } else {
        $addressB = true;
    }

    $hostname = "127.0.0.1";
    $username = "shas3";
    $password = "shas3@123";
    // Create connection
    $conn = mysqli_connect('127.0.0.1:3307', $username, $password, 'mydb');

    //  Check connection
    if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
    } else {
        $validQuery = "select fname from form";
        $validData = mysqli_query($conn, $validQuery);
        while ($vRow = mysqli_fetch_array($validData)) {
            if ($fname == $vRow['fname']) {
                die("<script>
                  alert('User Already Exist');
                  history.back();
                  </script>");
            }
        }
        $sqlQuery = "insert into form(fname, mname, lname, email, gender, dob, address) values('$fname','$mname','$lname','$email','$gender','$dob','$address')";
        $commit = "commit;";

        //Data Table display code below
        




        if (mysqli_query($conn, $sqlQuery)) {
            $getQuery = "select * from form;";
            $getData = mysqli_query($conn, $getQuery);
            if ($fnameB && $mnameB && $lnameB && $emailB && $genderB && $dobB && $addressB) {
                echo "
                <!DOCTYPE html>
                <html>
                
                <head>
                    <meta charset='utf-8'>
                    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                    <title>Page Title</title>
                    <meta name='viewport' content='width=device-width, initial-scale=1'>
                    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
                    <script src='main.js'></script>
                    <title>Student Form</title>
                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
                    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
                    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>
                    <link rel='stylesheet' type='text/css' href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' />
                    <script src='https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js'></script>
                    <script type='text/javascript' src='https://code.jquery.com/jquery-3.5.1.js'></script>
                    <style>
                        body {
                            background-color: rgb(200, 200, 200);
                            font-family: 'Rosemary';
                        }
                        
                        #mydiv {
                            background-color: whitesmoke;
                            color: black;
                            position: absolute;
                            top: 50%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            padding: 10px;
                            padding-top: 20px;
                            border-radius: 5px;
                        }
                        
                        button {
                            padding: 3px;
                            border-radius: 5px;
                        }
                    </style>
                </head>
                
                <body>
                    <script>
                        alert('Data Stored Successfully');
                        $(document).ready(function() {
                          $('#contact-detail').dataTable({
                          'scrollX': true,
                          'pagingType': 'numbers',
                              'processing': true,
                              'serverSide': true,
                              'ajax': 'server.php'
                          } );
                      } );
                    </script>
                    <div id='mydiv'>
                        <h1> Studen Form </h1>
                        <table class='display' id='table_id' style='width:100%'>
                            <thead>
                                <tr>
                                    <th> First Name </th>
                                    <th> Middle Name </th>
                                    <th> Last Name </th>
                                    <th> Gender </th>
                                    <th> Date Of Birth </th>
                                    <th> Address </th>
                                </tr>
                            </thead>
                        </table>
                        <button onclick='history.back()'>back</button>
                    </div>
                </body>
                
                </html>
            ";

            }
        } else {
            echo "<script>
              alert('Something went terribly Wrong..');
            </script>";
        }

    }
}
