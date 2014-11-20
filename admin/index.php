<?php require_once './config/bootstrap.php'; ?>
<?php
$error = false;
if (isset($_POST['email'])) {
    $auth = new Asouza\Admin\Auth();
    if ($auth->authenticate($_POST['email'], $_POST['pass'])) {
        header('location: home.php');
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once './includes/head.php'; ?>
    </head>
    <body id="login">
        <div class="container">
            <?php if ($error) { ?>
                <div class="alert alert-error alert-block">
                    <a class="close" data-dismiss="alert" href="#">×</a>
                    <h4 class="alert-heading">Erro!</h4>
                    Erro no login. Email ou senha inválido. 
                </div>
            <?php } ?>
            <form class="form-signin" action="" method="post">
                <h2 class="form-signin-heading">Login</h2>
                <input type="text" class="input-block-level" placeholder="Email address" name="email">
                <input type="password" class="input-block-level" placeholder="Password" name="pass">
                <!--        <label class="checkbox">
                          <input type="checkbox" value="remember-me"> Remember me
                        </label>-->
                <button class="btn btn-large btn-primary" type="submit">Logar</button>
            </form>

        </div> <!-- /container -->

    </body>
</html>