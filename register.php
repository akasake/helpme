<?php

include_once('lib/classes/User.class.php');
include_once('lib/classes/Db.class.php');
include_once('lib/helpers/Security.class.php');
    $error = [];

    if(!empty($_POST)){

        $security = new Security();

        try {
           $security->setPassword($_POST['password']);
           $security->setPasswordConfirm($_POST['passwordConfirm']);
        }
        catch(Exception $e){
            array_push($error, $e->getMessage());
        }

        $user = new User();

        try {
            $user->setUsername($_POST['username']);
        }
        catch(Exception $e){
            array_push($error, $e->getMessage());
        } 

        try {
            $user->setFirstName($_POST['firstName']);
        }
        catch(Exception $e){
            array_push($error, $e->getMessage());
        }

        try {
            $user->setLastName($_POST['lastName']);
        }
        catch(Exception $e){
            array_push($error, $e->getMessage());
        }

        try {
            $user->setPassword($_POST['password']);
        }
        catch(Exception $e){
            array_push($error, $e->getMessage());
        }

        try {
            if($user->canIRegister() && $security->passwordIsSecure()){
                $user->register();
                $user->login();
            }
        }
        catch(Exception $e){
            array_push($error, $e->getMessage());
        }
    }



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("lib/includes/head.inc.php"); ?>
    <title><?php echo $title ?></title>
</head>
<body>
<div class="canvas">    
    
<?php foreach($error as $e) : ?>
                    <p><?php echo $e; ?></p>
            <?php endforeach; ?>

            <form class"form" action="" method="post">

                <div class="form__item">
                    <label for="firstName">first name</label>
                    <br>
                    <input class="form__item__input" type="text" id="firstName" name="firstName" value="<?php echo (!empty($_POST['firstName']) ? $_POST['firstName'] : ""); ?>">
                </div>

                <div class="form__item">
                    <label for="lastName">last name</label>
                    <br>
                    <input class="form__item__input" type="text" id="lastName" name="lastName" value="<?php echo (!empty($_POST['lastName']) ? $_POST['lastName'] : ""); ?>">
                </div>

                <div class="form__item">
                    <label for="username">username</label>
                    <br>
                    <input class="form__item__input" type="text" id="username" name="username" value="<?php echo (!empty($_POST['username']) ? $_POST['username'] : ""); ?>">
                </div>

                <div class="form__item">
                    <label for="password">password</label>
                    <br>
                    <input class="form__item__input" type="password" id="password" name="password" value="<?php echo (!empty($_POST['password']) ? $_POST['password'] : ""); ?>">
                </div>

                <div class="form__item">
                    <label for="passwordConfirm">confirm password</label>
                    <br>
                    <input class="form__item__input" type="password" id="passwordConfirm" name="passwordConfirm" value="<?php echo (!empty($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : ""); ?>">
                </div>

                <div class="form__item">
                    <input class="button button--long" type="submit" value="create account">
                </div>

                <a class="link" href="login.php">Already have an account?</a>
            
            </form>
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</div>    
</body>
</html> 