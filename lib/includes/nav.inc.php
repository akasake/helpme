<nav>
    <?php if($title != "HELPME"):?> 
    <?php if($title == "INSTELLINGEN"):?> 
    <h1 class="pageTitle"><?php echo $title ?></h1>
    <a class="close" href="index.php"><img  src="images/close.svg" alt="close"></a>
    <?php elseif($title == "account"):?> 
    <a class="logo" href="index.php"><img src="images\logo.svg" alt="logo"></a>
    <?php else: ?>
    <h1 class="pageTitle"><?php echo $title ?></h1>
    <a class="back" href="index.php"><img  src="images/back.svg" alt="back"></a>
    <a class="settings" href="form.php"><img src="images/settings.svg" alt="settings"></a>
    <?php endif; ?> 
    <?php else: ?>
    <a class="logo" href="index.php"><img src="images\logo.svg" alt="logo"></a>
    <a class="settings" href="form.php"><img src="images/settings.svg" alt="settings"></a> 
    <?php endif; ?>    
</nav>