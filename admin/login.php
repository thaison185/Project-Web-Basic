<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/login.css"> 
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="form-area">
            <div class="form-area__title">
                Q's Coffee - Staff Only
            </div>
            <div class="form-area__warn">
                This page is the Staff only page. If you are not a staff of our company, please go back to <a href="../index.php">page for customers</a> 
            </div>
            <div class="form-area__login-form">
                <p>Welcome back! Please login to your account.</p>
                <form action="./handle-login.php" method="post">
                    <label >
                        Email
                        <br>
                        <input type="email" name="email" required>
                    </label>
                    <label >
                        Password
                        <br>
                        <input type="password" name="password" required>
                    </label>
                    <button type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- assmin@qcoffee.com:BigBossofQCoffee! -->