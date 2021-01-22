<?php

    require_once '../connectdb.php';

    session_start();

    if (isset($_POST['btn_login'])) {
        $email = $_POST['txt_email']; // textbox name
        $password = $_POST['txt_password']; // password

        if (empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if ($email AND $password) {
            try {
                $select_stmt = $db->prepare("SELECT email, password FROM user WHERE email = :uemail AND password = :upassword");
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->bindParam(":upassword", $password);
                $select_stmt->execute();

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                }
                if ($email != null AND $password != null) {
                    if ($select_stmt->rowCount() > 0) {
                        if ($email == $dbemail AND $password == $dbpassword) {

                            $_SESSION['email'] = $dbemail;
                            $_SESSION['success'] = "... Successfully Login...";
                            header("location: index.php");

                        }
                    } else {
                        $_SESSION['error'] = "Wrong email or password or role";
                        header("location: login.php");
                    }
                }
            } catch(PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>