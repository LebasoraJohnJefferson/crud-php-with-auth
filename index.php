<?php
    include './src/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do List | Log in</title>
    <link rel="stylesheet" href="./src/css/login.css">

</head>
<body>
    <?php if(isset($_SESSION['msg'])){ ?>
    <div id='notification'></div>
    <?php } ?>
    <h1>LOG IN PAGE</h1>
    <form method="POST" action='./src/actions/login.php'>
        <div class='input-container'>
            <label>Username :</label>
            <input name='username' type='text'/>
        </div>
        <div class='input-container'>
            <label>Password :</label>
            <input name='password' type='password'/>
        </div>
        <button class='submit-btn' name="login-btn" type="submit">LOG IN</button>
        <div class='no_account'>
            <p>Don`t have an account? <a href='./pages/register.php' class="sign-up-link">Sign Up</a></p>
        </div>
    </form>
    <?php if(isset($_SESSION['msg'])){ ?>
    <script>
        var notification = document.getElementById('notification')
        
            notification.innerHTML = '<?php echo $_SESSION["msg"]; ?>'
            notification.style.display = 'flex'
            setTimeout(() => {
                notification.style.display = 'none'
            }, 3000);
    </script>

    <?php } ?>
    
</body>
</html>