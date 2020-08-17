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
        // if form submitted , insert values into the database

        if(isset($_REQUEST['username'])) {
            // removes backslashes
            $username = stripslashes($_REQUEST['username']);
            // escape special charecters in a srting|
            $username= mysqli_real_escape_string($con,$username );
            $email = stripslashes($_REQUEST['email']);
            $email= mysqli_real_escape_string($con,$email);
            $password = stripslashes($_REQUEST['password']);
            $password= mysqli_real_escape_string($con,$password );
            $trn_date=date("Y-m-d H:i:s");

            if ($username != "" || $password != "" || $email != "") {
                $query = "INSERT INTO users (username, password,email,trn_date)
                VALUES('$username','".md5($password)."','$email','$trn_date')";
                            
                $result = mysqli_query($con,$query);
                if($result){
                echo "
                    You are registered successfully
                    <br> Click here to <a href='login.php'>login</a>               
                
                ";
            }
            }
            else {
                echo "login fail" ;
                echo "<br> Click here to <a href='registration.php'>registration</a>";
            }
               
           
            

            
            }else {
    ?>
        <div class="form">
            <h1>Registration</h1>
            <form name="registration" action="" method="post">
                <input type="text" name="username" placeholder="Username" require>
                <input type="email" name="email" placeholder="Email" require>
                <input type="password" name="password" placeholder="Password" require>
                <input type="submit" name="submit" value="Register">
            </form>
            
            <p>Click Here To Login! <a href="login.php">Login Here</a></P>
        </div>
    <?php }?>
</body>
</html>