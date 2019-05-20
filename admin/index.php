<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>



        <link rel="stylesheet" href="css/style.css">
        <style>
            body {
                background:url(images/images.jpg);
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                font: 87.5%/1.5em 'Open Sans', sans-serif;
                margin: 0;
                height: 800px;
            }
            #login form input[type="submit"] {
                background: #000;
                border: 1px solid #444;
                width: 100%;
                height: 40px;
                border-radius: 3px;
                color: white;
                cursor: pointer;
                transition: background 0.3s ease-in-out;
            }
            #login form {
                margin: auto;
                padding: 22px 22px 22px 22px;
                width: 100%;
                border-radius: 5px;
                background: #000;
                border-top: 3px solid #171819;
                border-bottom: 3px solid #171819;
            }
            #login form input[type="submit"]:hover {
                background: #101111;
                border:0;
                transition: all linear 0.3s;
            }
            #login form input[type="text"] {
                background-color: #101111;
                border-radius: 0px 3px 3px 0px;
                color: #a9a9a9;
                margin-bottom: 1em;
                padding: 0 16px;
                width: 235px;
                height: 50px;
            }

            #login form input[type="password"] {
                background-color: #101111;
                border-radius: 0px 3px 3px 0px;
                color: #a9a9a9;
                margin-bottom: 1em;
                padding: 0 16px;
                width: 235px;
                height: 50px;
            }
            #login form span {
                background-color: #181919;
                border-radius: 3px 0px 0px 3px;
                border-right: 3px solid #434a52;
                color: #606468;
                display: block;
                float: left;
                line-height: 50px;
                text-align: center;
                width: 50px;
                height: 50px;
            }
        </style>


    </head>

    <body>
    <html lang="en-US">
        <head>
            <meta charset="utf-8">
            <title>Login</title>

            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">

        </head>
        <div id="login">
            <h2 style="color:#606468;text-align: center;">Welcome To Admin Panel</h2>
            <form action="function/function.php" method="post" name='login'>
                <span class="fontawesome-user"></span>
                <input type="text" name="username" id="user" placeholder="Username">

                <span class="fontawesome-lock"></span>
                <input type="password" name="password" id="pass" placeholder="Password">

                <input type="submit" name="submit" value="Login">
            </form>
        </div>


    </body>
</html>
