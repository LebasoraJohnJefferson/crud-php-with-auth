<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do List | Register
    </title>
    <link rel="stylesheet" href="../src/css/register.css">
</head>
<body>
    <h1>REGISTER PAGE</h1>
    <form method="POST" action='../src/actions/register.php'>
    <div class='input-container'>
            <label>Full Name :</label>
            <input type='text' name='full_name'/>
        </div>
        <div class='input-container'>
            <label>Username :</label>
            <input type='text' name='username'/>
        </div>
       
        <div class='input-container'>
            <label>Password :</label>
            <input type='password' name='password'/>
        </div>
        <button name='register-btn' class='submit-btn' type="submit">LOG IN</button>
        <div class='no_account'>
            <p>Already have an account? <a href='../' class="sign-up-link">Log In</a></p>
        </div>
    </form>
</body>
</html>