<html>

<head>
    <title>Epic Games</title>
    <link rel="stylesheet" href="css/form_sign_up_style.css">
    <link rel="icon" href="img/epic-games-icon-web.jpeg">
</head>

<body>
    <div class="container">
            <div class="paper">
                <div class="content">
                    <div class="innerContent">
                        <span class="logo">
                            <img src="img/Epic Games Story.jpeg" alt="logo-epic-game" height="75" width="75">
                        </span>
                        <div class="content-form">
                            <h1>Sign Up Admin</h1>
                            <!-- Form login -->
                            <form action="sign_up.php" method="post" id="frmLogin">
                                <table>
                                
                                    <tr>
                                        <td><label for="">Email Address</label></td>
                                        <td><input type="email" name="email" required></td>
                                    </tr>
                                    
                                
                                    <tr>
                                        <td><label for="">Username</label></td>
                                        <td><input type="text" name="username" required></td>
                                    </tr>
                                
                                
                                    <tr>
                                        <td><label for="">Password</label></td>
                                        <td><input type="password" name="password" required></td>
                                    </tr>

                                    <tr>
                                        <td>User Type</td>
                                        <td>
                                            <input type="radio" name="user_type" value="admin"> Admin 
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Fullname</td>
                                        <td><input type="text" name="fullname"></td>
                                    </tr>
                                
                                </table>

                                <div class="button-continue">
                                    <input type="submit" name="sign_up" value="Continue">
                                </div>
                                <div>
                                    <p>or continue with</p>
                                </div>
                                <div class="photo">
                                    <div class="grid">
                                        <div class="item">
                                            <img src="img/Xbox-One-Logo.jpeg" alt="" height="85" width="69">
                                        </div>
                                        <div class="item">
                                            <img src="img/PlayStation-logo.jpeg" alt="" height="85" width="69">
                                        </div>
                                        <div class="item">
                                            <img src="img/Nintendo-Logo.jpeg" alt="" height="85" width="69">
                                        </div>
                                        <div class="item">
                                            <img src="img/Steam-Logo.jpeg" alt="" height="85" width="69">
                                        </div>
                                        <div class="item">
                                            <img src="img/Facebook PNG Ícone Logo Transparente Sem Fundo.jpeg" alt=""
                                                height="85" width="69">
                                        </div>
                                        <div class="item">
                                            <img src="img/Google-Logo.jpeg" alt="" height="85" width="69">
                                        </div>
                                        <div class="item">
                                            <img src="img/Apple-Logo.jpeg" alt="" height="85" width="69">
                                        </div>
                                        <div class="item">
                                            <img src="img/Lego-logo.jpeg" alt="" height="85" width="69">
                                        </div>
                                    </div>
                                    <p>By signing in or signing up, you agree with our <a href="">Privacy Policy</a></p>
                                    <a href="form_login.php">Back to Form Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>