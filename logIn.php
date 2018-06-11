<?php
    include_once('lib/classes/User.class.php');
    include_once('lib/classes/Db.class.php');
    $title = "HELPME";
    // check with cookie if is firsttime user if yes redirect to first_visit.php 
    
    $error = [];

    if(!empty($_POST)){
        
        $user = new User();

        try {
            $user->setUsername($_POST['username']);
        }
        catch(Exception $e){
            array_push($error, $e->getMessage());
        }

        try{
            $user->setPassword($_POST['password']);
        }
        catch(Exception $e){
            array_push($error, $e->getMessage());
        }
         
        try{
        if($user->canILogin()){
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
    
    <h1>Welcome back.</h1>

            <?php foreach($error as $e) : ?>
                    <p><?php echo $e; ?></p>
            <?php endforeach; ?>

            <form class="form" action="" method="post">

                <div class="form__item">
                    <label for="username">username</label>
                    <input class="form__item__input" type="text" id="username" name="username" value="<?php echo (!empty($_POST['username']) ? $_POST['username'] : ""); ?>">
                </div>

                <div class="form__item">
                    <label for="password">password</label>
                    <input class="form__item__input" type="password" id="password" name="password" value="<?php echo (!empty($_POST['password']) ? $_POST['password'] : ""); ?>">
                </div>

                <div class="form__item">
                    <input class="button button--long" type="submit" value="login">
                </div>

                <a class="link" href="register.php">No account yet?</a>
                <a class="link" href="quickAcc.php">Snelle toegang!</a>

            </form>
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</div>    
</body>
</html> 