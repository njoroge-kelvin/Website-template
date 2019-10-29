<?php
    

    if(isset($_POST["btn"])){

        include('includes/config.php');

        $email = mysqli_real_escape_string($contact, $_POST["mail"]);
        $pass = mysqli_real_escape_string($contact, $_POST["pwd"]);
        $password = sha1($pass);
        $pass1 = mysqli_real_escape_string($contact, $_POST["pwd-rep"]);
        $passrep = sha1($pass1);
        $username = mysqli_real_escape_string($contact, $_POST["uname"]);
        
        if(empty($email) || empty($password)){
            header('Location:login.php?error=emptyfield&mail='.$email.'&pass='.sha1($password));
            exit();
        }

        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header('Location: login.php?error=invalidemailuid');
            exit();
        }

        elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header('Location: login.php?error=invalidusername&mail='.$email);
            exit();
        }

        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Location: login.php?error=invalidemail&mail='.$email);
            exit();
        }

        elseif($password !== $passrep){
            header('Location: login.php?error=passnotmatch');
            exit();
        }

        else{
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            try{
                    $stmt = $contact->prepare("SELECT userid FROM employees WHERE username = ? ");
                    $stmt->bind_param("s", $username);
                    $stmt->execute();
                    $stmt->store_result();
                    
    
                    if($stmt->num_rows > 0){
                        header('Location: login.php?error=unametaken&mail='.$email);
                        exit($contact->info);
                        $stmt->close();
    
                    }else{
                        header('Location: HTML.html?login=success!!');
                    }
                }catch(Exception $e){
                    error_log($e->getMessage());
                    exit('Error connecting to database');
                    
            }

            try{
                $stmt = $contact->prepare("INSERT INTO employees (email, password, username) VALUES (?,?,?)");
                $stmt->bind_param("sss", $email, $password, $username);
                $stmt->execute();
                $stmt->close();
                $contact->close();

                header('Location: HTML.html?singup=success');
            }catch(Exception $e){
                error_log($e->getMessage());
                if($contact->errno === 1062){
                    echo 'username already exists';
                }
                exit('Error connecting to database');
            }
        }
            $stmt->close();
            $contact->close();
    }
        


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>

<!--styling-->
<style>
    html{
        box-sizing: border-box;
    }

    body{
        margin: 0;
        padding: 0;

    }

    a{
        text-decoration: none;
        color: white;
        font-size: .5em;
        font-family: italic;
    }

    .container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 5%;
        border-radius: 10px;
        background-color: green;
        padding: 20px;
    }

    .heading{
        font-size: 2em;
        color: black;
        text-align: center;
        margin: 20px;
    }
    
    .user, .pass{
        font-size: 1.5em;
        font-weight: 500;
        text-align: center;
        margin: 20px
    }

    .input{
        border-radius: 5px;
        width: 70%;
        height: 30px;

    }

    </style>
<!--styling-->

</head>
<body>
    <form class="container" method="POST">
        <h1 class="heading">Login</h1>
        <!-- <hr style="margin: 0 25%; background-color: white;"> -->
        <label for="email" class="user">Email</label>
        <input type="text" name="mail" class="input" placeholder="Email">
        <label for="pass" class="pass">password</label>
        <input type="password" name="pwd" class="input" placeholder="password" style="margin-bottom: 5px;">
        <input type="password" name="pwd-rep" class="input" placeholder="password-repeat">
        <label for="username" class="user">username</label>
        <input type="text" name="uname" class="input" placeholder="username" style="margin-bottom: 5px;">
        <button type="submit" name="btn" class="btn" style="padding: 10px;"> Login</button>
        <a href="#" class="forgot" style="padding: 10px;">forgot password?</a>
        <a href="#" style="padding: 10px;">Have no account?</a>
    </form>
</body>
</html>
