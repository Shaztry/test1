<html>

<head>
    <title>User Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: rgba(150, 150, 150,0.4);
            background-image: url('register.jpg');
            background-size: cover;
        }

        .container {
            position: absolute;
            width: 60%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 5px;
            width: 40%
        }
        div.container {
            background-color: rgba(0,0,0,0.5) !important;
            color: white;
        }

        #header2 {
            background-color: rgb(30, 200, 50);
            color: white;
            height: 50px;
            width: 100%;
            padding: 5px;
            text-align: center;
        }

        #result {
            height: 150px;
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
            document.getElementById('divAlert').style.visibility = "visible";
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var confirmpass = document.getElementById('confirmpass').value;
            var alert = document.getElementById('divAlert');
            var checkpass = password.localeCompare(confirmpass);
            if (username == "") {
                alert.innerHTML += "username cannot be empty";
            } else if (password == "") {
                alert.innerHTML += "Password cannot be empty";
            } else if (confirmpass == "") {
                alert.innerHTML += "Confirm password cannot be empy";
            } else if (password != confirmpass) {
                alert.innerHTML += "Password not matching";
                return false;
            }
        }

        function hideAlert() {
            var alertDiv = document.getElementById('divAlert');
            alertDiv.innerHTML = "";
            alertDiv.style.visibility = "hidden";
        }
    </script>
    <div class="container">
        <h1 class="mb-3">User Register</h1>
        <form class="form-horizontal" name="user_registration" id="user_registration" method="POST" action="register.php">
            <div class="form-group">
                <label class="control-label col-sm-2" for="username">User Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" placeholder="Enter user name" name="username" onclick="hideAlert()" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" onclick="hideAlert()" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="confirmpass">Confirm Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmpass" placeholder="Confirm password" name="confirmpass" onclick="hideAlert()" required>
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
    </div>


</body>

</html>