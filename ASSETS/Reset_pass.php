<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--========= Meta Data ============-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--======== Title ===========-->
    <title>Rica: Reset Password</title>
    <link rel="icon" href="/IMAGES/lightning.png" type="image/x-icon">

    <!--======= Style Sheet =======-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="Js/Reset.css">

    <style>
        body {
            padding: 0;
            margin: 0;
            height: 100%;
            outline: none;
            color: #042A38 !important;
            background-image: url(Img/Pattern.png);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: 'Courier New', Courier, monospace;
        }

        img {
            position: absolute;
        }

        a {
            text-decoration: none;
        }

        /*======= Header Section =======*/
        header {
            z-index: 99999;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            backdrop-filter: blur(20px);
            transition: .6s ease;
        }

        header.sticky {
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0px 0px 20px rgb(0 0 0 / 10%);
        }

        .nav-bar {
            position: relative;
            height: calc(4rem + 1rem);
            width: auto;
            max-width: 1150px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-left: auto;
            margin-right: auto;
            padding: 0 20px;
            transition: .6s ease;
        }

        header.sticky .nav-bar {
            height: 8vh;
            height: calc(2.5rem + 1 rem);
            transition: .6s ease-in-out;
        }

        .nav-bar .logo {
            color: #fff;
            font-size: 0.6rem;
            font-weight: 600;
        }

        .nav-bar .logo span {
            cursor: default;
        }

        .nav-bar .logo img {
            width: 18vh;
            transition: .3s ease;
        }

        h1 {
            color: #fff;
            /* text-transform: uppercase; */
            width: auto;
            /* background: #fff; */
            padding: 1vw;
        }

        .inp {
            width: 30vw;
            height: 3vw;
            border-radius: 10px;
            border: 2px solid black;
            padding-left: 2vw;
            font-weight: bolder;
            outline: none;
        }

        ::placeholder {
            font-weight: bold;
        }

        label {
            font-weight: bolder;
        }

        button:hover {
            background-color: #fff !important;
        }

        .bg {
            margin-top: 100px;
            background-size: 100%;
            font-weight: bolder;
            opacity: 0.9;
            height: auto;
            padding-bottom: 5vw;
        }

        .login {
            width: 40vw;
            background-color: #fff;
            padding: 2vw;
            font-weight: bolder;
            margin-top: 6vh;
            border-radius: 10px;
            display: block;
        }

        #login_submit {
            height: 3vw;
            width: 10vw;
            font-family: 'Courier New', Courier, monospace;
            font-weight: bolder;
            border-radius: 10px;
            border: 2px solid black;
            background-color: lightblue;
        }

        /* 1070px screen szie */
        @media screen and (max-width: 1070px) {

            /* Header Section */
            .navigation {
                position: fixed;
                width: 100%;
                height: 100vh;
                top: 0;
                left: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                background: var(--transprent-color-01);
                visibility: hidden;
                opacity: 0;
                transition: .3s ease;
            }

            .nav-bar .logo {
                color: var(--first-color);
                font-size: 0.6rem;
                font-weight: 600;
            }

            .nav-bar .logo img {
                width: 16vh;
                transition: .3s ease;
            }
        }

        @media screen and (max-width: 730px) {
            body {
                margin: 5rem 0 0 0;
            }
        }

        @media screen and (max-width: 620px) {
            input {
                height: 6vw !important;
            }

            .seluser {
                display: grid;
            }

            .sub {
                width: 20vw !important;
            }
        }
    </style>

</head>

<?php global $message; ?>

<body>
    <!--======== Header Section ========-->
    <header>
        <div class="nav-bar">
            <a href="#" class="logo">
                <img src="/IMAGES/Rica_transparent.png" alt="logo">
                <span>(P)Ltd.</span>
            </a>
            <h1>Rica: Troubleshooting and Automation</h1>
    </header>
    <div class="bg">
        <center>
            <div class="login">
                <div id="getcode" style="display: initial">
                    <form method="POST">
                        <h1>Reset the Password</h1>
                        <input name="code" id="usercode1" value="" style="display:none;">
                        <div class="signin">
                            <label for="email1" style="text-transform: uppercase;">Email</label><br><br>
                            <input type="email" name="email1" placeholder=" Email" class="inp" required>
                            <br><br>
                            <label for="pass1" style="text-transform: uppercase;">Password</label><br><br>
                            <input type="password" name="pass1" placeholder="******" class="inp" required>
                            <br><br>
                            <label for="cpass1" style="text-transform: uppercase;">Confirm Password</label><br><br>
                            <input type="password" name="cpass1" placeholder="******" class="inp" required>
                            <br><br>
                            <input name="submit" class="sub" type="submit" value="Get the Code" id="login_submit">
                    </form><br><br>
                </div>
                <a href="Login.php">Cancel</a>
            </div>
        </center>
    </div>

</body>


<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['email1']) && isset($_POST['pass1']) && isset($_POST['cpass1'])) {
        require_once 'sql.php';
        $conn = mysqli_connect($host, $user, $ps, $project);
        if (!$conn) {
            echo "<script>alert(\"Database error retry after some time !\")</script>";
        }
        $type = mysqli_real_escape_string($conn, $_POST['usertype']);
        $username = mysqli_real_escape_string($conn, $_POST['email1']);
        $password = mysqli_real_escape_string($conn, $_POST['pass1']);
        $password = crypt($password, 'rakeshmariyaplarrakesh');
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpass1']);
        $cpassword = crypt($cpassword, 'rakeshmariyaplarrakesh');
        if ($password === $cpassword) {
            $sql = "select * from " . $type . " where mail='{$username}'";
            $res =   mysqli_query($conn, $sql);
            if ($res == true) {
                global $dbmail, $dbpw;
                while ($row = mysqli_fetch_array($res)) {
                    $dbmail = $row['mail'];
                    $dbname = $row['name'];
                }
                if ($dbmail === $username) {

                    require 'PHPMailer/PHPMailerAutoload.php';
                    // $mail = new PHPMailer;
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = $_ENV["gmail"];
                    $mail->Password = $_ENV["ps"];                        // SMTP password
                    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 465;                                    // TCP port to connect to
                    $mail->setFrom('osesvit2021@gmail.com');
                    $mail->addAddress($dbmail);
                    $mail->addReplyTo('osesvit2021@gmail.com');
                    $mail->isHTML(true);
                    $mail->Subject = 'Reset your Online Examination system password';
                    $mail->Body = '<center><div style="width:100%;background-color:#042A38;color: #fff;height:auto; "><h1>Hello ' . $dbname . '<br></h1><br>here is your security code to reset the password <h1>' . $otp . '</h1><br>  don\'t share security code with any one. <br><br><br>Thank You<br>Online Examination System<br><br><a href="mailto:osesvit2021@gmail.com">Contact Us</a></div></center>';
                    if (!$mail->send()) {
                        echo "<script>alert(" + $mail->ErrorInfo + "<)</script>";
                    } else {
                        $_SESSION["otp"] = $otp;
                        $_SESSION["username"] = $dbmail;
                        $_SESSION["pw"] = $password;
                        $_SESSION["type"] = $type;
                        header("location: #");
                    }
                } else {
                    echo "<script>alert('not a user ,Please Sign up');</script>";
                }
            }
        } else {
            echo "<script>alert('Both password should be same');</script>";
        }
    }
}
?>

</html>