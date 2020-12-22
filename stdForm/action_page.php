<?php
require 'dbStore.php';
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