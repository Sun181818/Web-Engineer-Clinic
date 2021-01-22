<?php 

    require_once '../connectdb.php';

    session_start();

    if (isset($_POST['btn_login'])) {
        $email = $_POST['txt_email']; // textbox name
        $password = $_POST['txt_password']; // password
        $role = $_POST['txt_role']; // select option role

        if (empty($email)) {
            $errorMsg[] = "Please enter email";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if (empty($role)) {
            $errorMsg[] = "Please select role";
        } else if ($email AND $password AND $role) {
            try {
                $select_stmt = $db->prepare("SELECT email, password, role FROM adminlogin WHERE email = :uemail AND password = :upassword AND role = :urole");
                $select_stmt->bindParam(":uemail", $email);
                $select_stmt->bindParam(":upassword", $password);
                $select_stmt->bindParam(":urole", $role);
                $select_stmt->execute();

                while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
                    $dbemail = $row['email'];
                    $dbpassword = $row['password'];
                    $dbrole = $row['role'];
                }
                if ($email != null AND $password != null AND $role != null) {
                    if ($select_stmt->rowCount() > 0) {
                        if ($email == $dbemail AND $password == $dbpassword AND $role == $dbrole) {

                            switch($dbrole) {
                                case 'officer':
                                    $_SESSION['email'] = $dbemail;
                                    $_SESSION['role'] = $drole;
                                    $_SESSION['success'] = "... Successfully Login...";
                                    header("location: index.php");
                                break;
                                case 'manager':
                                    $_SESSION['email'] = $dbemail;
                                    $_SESSION['role'] = $drole;
                                    $_SESSION['success'] = "... Successfully Login...";
                                    header("location: index.php");
                                break;
                                    $_SESSION['email'] = $dbemail;
                                    $_SESSION['role'] = $drole;
                                    $_SESSION['success'] = "... Successfully Login...";
                                    header("location: index.php");
                                break;
                                default:
                                    $_SESSION['error'] = "Wrong email or password or role";
                                    header("location: login.php");
                            }
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