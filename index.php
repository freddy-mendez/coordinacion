<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include ('scripts.php'); ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col mt-3">
                <form action="validar.php" method="post">
                    <table align="center">
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" id="username" name="username" />
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" id="password" name="password" />
                            </td>
                        </tr>
                        <tr>
                            <td class="" colspan="2" >
                                <button class="btn btn-success align-middle">Login</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</body>
</html>