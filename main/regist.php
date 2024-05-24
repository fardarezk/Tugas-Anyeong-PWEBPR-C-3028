<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>regist</title>
    <link rel="stylesheet" href="/anyeong/style/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="flex-direct-row">
            <div class="kiri">
                <div class="flex-direct-column-left">
                    <h1>Anyeong~</h1>
                    <h3>Welcome, Chingu</h3>
                    <h4>Already have an account, click below </h4>
                    <a href="/anyeong"><button id="signInButton">Sign In</button></a>
                </div>
            </div>
            <div class="kanan">
                <div class="flex-direct-column-right">
                    <form id="form" action="regist" method="post" >
                        <h1>Create An Account</h1>
                        <div class="input-control">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" required>
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <label for="email">Email</label>
                            <input type="text" name="email" text="email" id="email">
                            <div class="error"></div>
                        </div>
                        <div class="input-control">
                            <label for="password"> Password</label>
                            <input type="password" name="password" id="password">
                            <div class="error"></div>
                        </div>
                        <button id="signUpButton" type="submit" value="Signup">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>