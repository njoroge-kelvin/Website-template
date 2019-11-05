<?php
  if(isset($_POST['signin'])){

    include('config.php');
    $name = mysqli_real_escape_string($contact, $_POST['sub_name']);
    $email = mysqli_real_escape_string($contact, $_POST['sub_email']);

    if(empty($name) || empty($email)){
    header('Location: HTML.php?error=emptypassorname');
    exit();
    }elseif(empty($name && $email)){
    header('Location: HTML.php?error=empty fields.');
    exit();
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header('Location: login.php?error=invalidemail');
    exit();
    }else{
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try{
            $stmt = $contact->prepare("SELECT memberid FROM subscription WHERE email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows > 0){
                header('Location: HTML.php?error=emailalreadyregistered');
                $stmt->close();
                exit();
            }else{
                header('Location: HTML.php?success!!');
            }
        }catch(Exception $e){
        error_log($e->getMessage());
        exit('error connecting to database');
        }

        try{
            $stmt = $contact->prepare("INSERT INTO subscription (name, email) VALUES(?,?)");
            $stmt->bind_param("ss", $name, $email);
            $stmt->execute();
            $stmt->close();
            $contact->close();
        }catch(Exception $e){
        error_log($e->getMessage());
        exit('Error connecting to database');
        }
    }
  }
?>