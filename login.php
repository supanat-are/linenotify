<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        require('db.php');
        session_start();

        if(isset($_POST['username'])){
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            // escape special charecters in a srting|
            $username= mysqli_real_escape_string($con,$username );
            $password = stripslashes($_REQUEST['password']);
            $password= mysqli_real_escape_string($con,$password );

            //Checking is user existing in the database ro not
            $query = "SELECT * FROM users WHERE username='$username' AND password='".md5($password)."'";

            $result = mysqli_query($con,$query) or die(mysqli_error());
            $row =mysqli_num_rows($result);

            if($row == 1){
                $_SESSION['username'] = $username;
                // Refirect user to index.php
                header("LOcation: showdata.php");
            }
            else{
                echo "<div class='form'>
                        <h3>Username/Password is incorrect.</h3>
                        <br> Click here to <a href='login.php'>login</a> 
                    </div>";
            }
        }else {
    ?>
            <div class="form">
                <h1>Log in</h1>
                <form action="line-notify.php" method="post" name="login">
                    <input type="text" name="username" placeholder="Username" require>
                    <input type="password" name="password" placeholder="Password" require>
                    <input type="submit" name="submit" value="Login">
                </form>
                <p><a href="registration.php">Register Here</a></P>
            </div>
            <?php } ?>

</body>
</html>