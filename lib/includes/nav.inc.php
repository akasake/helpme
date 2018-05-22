<nav>
    <?php if($title != "HELPME"):?> 
    <h1 class="pageTitle"><?php echo $title ?></h1>
    <a class="back" href="index.php"><img  src="images/back.svg" alt="back"></a>
    <?php else: ?>
    <a class="logo" href="index.php"><img src="images\logo.svg" alt="logo"></a>
    <?php endif; ?>
    <a class="settings" href="form.php"><img src="images/settings.svg" alt="settings"></a>    
</nav>