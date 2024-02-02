<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('form_login.php');</script>";
}
?>
<html>
    <head>
        <title>Epic Games</title>
        <link rel="stylesheet" href="css/styles.css">
        <link rel="icon" href="img/epic-games-icon-web.jpeg">
    </head>

    <body>
    <header>
        <a href="index.php"><img src="img/Epic Games Story.jpeg" alt="" height="30" width="30"></a>
        <img src="img/Down-Arrow.jpeg" alt="" height="15" width="15">
        <div id="vertikal-line"></div>
        <h1><a href="index.php">STORE</a></h1>
    </header>
        <h3>Change Password</h3>
        <form method="post" action="update_password.php">
            <table>
                <tr>
                    <td>New Password</td>
                    <td>: <input type="password" name="new_password" id="new" required /></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp; <input type="checkbox" onclick="show()">Show Password</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;
                        <input type="submit" name="change" value="CHANGE">
                        <input type="submit" name="reset" value="RESET">
                    </td>
                </tr>
            </table>
            <a href="index.php">Cancel</a>
        </form>
        <script>
            function show() {
                var x = document.getElementById("new");
                if (x.type === "password") {
                    x.type = "text";
                }else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>