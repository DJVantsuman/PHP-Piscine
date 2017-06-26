<?php
    session_start();
    if ($_GET['submit'] == "OK"){
        $_SESSION['login'] = $_GET['login'];
        $_SESSION['passwd'] = $_GET['passwd'];
    }
?>

<html>
<head>
    <style>
        body{
            background-color: darkslategrey;
        }
        .reg_form{
            width: 300px;
            height: 400px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 200px;
        }
        .reg_string{
            width: 100%;
            height: 60px;
            margin-bottom: 10px;
        }
        .reg_string input{
            width: 100%;
            height: 100%;
            font-size: large;
        }
        .reg_string button{
            margin-top: 20px;
            width: 100%;
            height: 60%;
            font-size: large;
        }
    </style>
</head>
<body>
    <div class="reg_form">
        <form action="index.php" method="get">
            <div class="reg_string">
                <input placeholder="Login" type="text" name="login" value="<?php echo $_SESSION['login']?>" required/>
            </div>
            <div class="reg_string">
                <input placeholder="Password" type="password" name="passwd" value="<?php echo $_SESSION['passwd']?>" required/>
            </div>
            <div class="reg_string">
                <button type="submit" name="submit" value="OK">Registration</button>
            </div>
        </form>
    </div>
</body>
</html>
