<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Reservation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: rgb(150, 150, 150);
            background-image: url('reservation.jpg');
            background-size: cover;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 5px;
            width: 65%;
        }

        div.container {
            background-color: rgba(0,0,0,0.5) !important;
            color: white;
        }

        #result {
            height: 1OOpx;
            width: 100px;
        }

        .alert {
            padding: 20px;
            margin-bottom: 15px;
            visibility: hidden;
            position: absolute;
        }
    </style>
</head>

<body>
    <script>
        document.body.style.zoom = 1.0;
        this.blur();

        function chippi() {
            var alert = document.getElementById('divAlert');
            alert.style.visibility = "visible";
            var userid = document.getElementById('userid');
            var srcaddr = document.getElementById('srcaddr').value;
            var destaddr = document.getElementById('destaddr').value;
            if (srcaddr == destaddr) {
                alert.innerHTML += "Source and destination address cannot be same!";
                return false;
            }
        }

        function selOpt() {
            var srcaddr = document.getElementById('srcaddr').value;
            var destaddr = document.getElementById('destaddr').value;
            var amount = document.getElementById('amount');
            if (srcaddr == "Bangalore") {
                if (destaddr == "Bangalore") {
                    alert.innerHTML += "Source and destination address cannot be same!";
                    return false;
                } else if (destaddr == "Maharastra") {
                    amount.value = "1000";
                    return false;
                } else if (destaddr == "Delhi") {
                    amount.value = "1200";
                    return false;
                } else if (destaddr == "Chennai") {
                    amount.value = "500";
                    return false;
                } else if (destaddr == "Kerala") {
                    amount.value = "750";
                    return false;
                }
            } else if (srcaddr == "Maharastra") {
                if (destaddr == "Maharastra") {
                    alert.innerHTML += "Source and destination address cannot be same!";
                    return false;
                } else if (destaddr == "Bangalore") {
                    amount.value = "1000";
                    return false;
                } else if (destaddr == "Delhi") {
                    amount.value = "1200";
                    return false;
                } else if (destaddr == "Chennai") {
                    amount.value = "500";
                    return false;
                } else if (destaddr == "Kerala") {
                    amount.value = "750";
                    return false;
                }
            } else if (srcaddr == "Delhi") {
                if (destaddr == "Delhi") {
                    alert.innerHTML += "Source and destination address cannot be same!";
                    return false;
                } else if (destaddr == "Maharastra") {
                    amount.value = "1000";
                    return false;
                } else if (destaddr == "Bangalore") {
                    amount.value = "1200";
                    return false;
                } else if (destaddr == "Chennai") {
                    amount.value = "500";
                    return false;
                } else if (destaddr == "Kerala") {
                    amount.value = "750";
                    return false;
                }
            } else if (srcaddr == "Chennai") {
                if (destaddr == "Chennai") {
                    alert.innerHTML += "Source and destination address cannot be same!";
                    return false;
                } else if (destaddr == "Maharastra") {
                    amount.value = "1000";
                    return false;
                } else if (destaddr == "Delhi") {
                    amount.value = "1200";
                    return false;
                } else if (destaddr == "Bangalore") {
                    amount.value = "500";
                    return false;
                } else if (destaddr == "Kerala") {
                    amount.value = "750";
                    return false;
                }
            } else if (srcaddr == "Kerala") {
                if (destaddr == "Kerala") {
                    alert.innerHTML += "Source and destination address cannot be same!";
                    return false;
                } else if (destaddr == "Maharastra") {
                    amount.value = "1000";
                    return false;
                } else if (destaddr == "Delhi") {
                    amount.value = "1200";
                    return false;
                } else if (destaddr == "Chennai") {
                    amount.value = "500";
                    return false;
                } else if (destaddr == "Bangalore") {
                    amount.value = "750";
                    return false;
                }
            }
        }

        function hideAlert() {
            var alertDiv = document.getElementById('divAlert');
            alertDiv.innerHTML = "";
            alertDiv.style.visibility = "hidden";
        }
    </script>
    <div class="container">
        <h2>User Reservation</h2>
        <form class="form-horizontal" name="user_reservation" method="POST" action="reserve.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="userid">User id:</label>
                <div class="col-sm-10">
                    <?php
                    $hostserver = '127.0.0.1';
                    $username = 'root';
                    $password = '';
                    $database = 'mydb';
                    $conn = mysqli_connect($hostserver, $username, $password, $database);
                    if (!$conn) {
                        die("Connection Failed : " . mysqli_connect_error());
                    }
                    $q_uid = "SELECT * from user_register";
                    $res_uid = mysqli_query($conn, $q_uid);
                    while ($a_uid = mysqli_fetch_assoc($res_uid)) {
                        $uid = $a_uid['userid'];
                    }

                    echo "
                    <input type='text' class='form-control' id='userid' placeholder='' name='userid' onclick='hideAlert()' value='$uid' readonly>
                    ";
                    ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label col-sm-2" for="srcaddr">Source Address:</label>
                    <select class="form-control" name="srcaddr" id="srcaddr" onchange=" return selOpt();" required>
                        <option selected disabled>SELECT A PLACE</option>
                        <option value="Maharastra">MAHARASTRA</option>
                        <option value="Bangalore">BANGALORE</option>
                        <option value="Delhi">DELHI</option>
                        <option value="Chennai">CHENNAI</option>
                        <option value="Kerala">KERALA</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <label class="control-label col-sm-2" for="destaddr">Source Address:</label>
                    <select class="form-control" name="destaddr" id="destaddr" onchange="return selOpt();" required>
                        <option selected disabled>SELECT A PLACE</option>
                        <option value="Maharastra">MAHARASTRA</option>
                        <option value="Bangalore">BANGALORE</option>
                        <option value="Delhi">DELHI</option>
                        <option value="Chennai">CHENNAI</option>
                        <option value="Kerala">KERALA</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="amount">Amount :</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="amount" placeholder="Enter amount" name="amount" onclick="hideAlert()" readonly>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" onclick="return chippi()" onmouseover="hideAlert()">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="alert alert-danger" id="divAlert">
        <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
    </div>
</body>

</html>