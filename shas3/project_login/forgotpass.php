<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.5.1.min.js"></script>
    <title>User Registeration | project_login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form class="box" method="POST" action="login_check.php">
                        <h1>Forgot Password</h1>
                        <p class="text-muted"> Please enter your email and date of birth!</p> 
                        <input type="email" name="email" placeholder="Email-id"> 
                        <input type="date" name="date" placeholder="mm/dd/yyy"> 
                        <a class="cancel text-muted" href="admin_login.php">Cancel?</button>
                        <input type="submit" name="" value="Verify" href="changepass.php"> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>