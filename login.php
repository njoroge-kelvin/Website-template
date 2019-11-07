<?php
    include('config.php');

    if(isset($_POST['signin'])){
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        if(empty($email) && empty($password)){
            header('Location: login.php?error=emptypassandemail');
            exit('empty password and email');

        }elseif(empty($email) || empty($password)){
            header('Location: login.php?error=passoremailempty');
            exit('password or email cannot b empty');

        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header('Location: login.php?error=invalidemail');
            exit('invalid email');

        }else{
            mysqli_report(MYSQLI_REPORT_ERROR || MYSQLI_REPORT_STRICT);

            try{
                $stmt = $contact->prepare("SELECT userid FROM employees where email=? AND password=? ");
                $stmt->bind_param('ss', $email, $password);
                $stmt->execute();
                $stmt->store_result();

                if($stmt->num_rows > 0){
                    header('Location: HTML.php?success!!');
                    $_SESSION["email"] = $email;
                    exit();
                }else{
                    header('Location: login.php?error=cannotfinduser');
                    $stmt->close();
                    $contact->close();
                }
            }catch(Exception $e){
                error_log($e->gerMessage());
                exit('error connecting to database');
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <style>
        .container{
            color: green;
            display: flex;
            flex-direction: column;
            padding:0 20%;
            justify-content: center;
            align-items: center;
        }

        .input{
            padding: 10px;
            margin: 20px;
            border: .5px solid indigo;
            border-radius: 3.5px;
        }

        .submit{
            padding: 10px;
            width: 80px;
            align-items: center;
        }
    </style>

</head>
<body>
    <form class="container" method="POST">
        <img src="images/blue-rose.JPG" alt="icon" style="align-items: center;">
        <input class="input" type="email" placeholder="Enter Email" name="email">
        <input class="input" type="password" placeholder="Enter Password" name="password">
        <input class="submit" type="submit" value="Sign in." name="signin">
    </form>
</body>
</html>