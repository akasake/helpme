<?php
    include_once("lib/settings/config.php");
    $title = "Alle Meldingen";
    

    try {
        $meldingen = Melding::getMeldingen();   
    } 
    catch(Exception $e){
        
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include("lib/includes/head.inc.php"); ?>
    <title>Muse</title>
</head>
<body>  
    <?php if(count($meldingen) != 0):?>
        <?php foreach($meldingen as $m): ?>
            <article class="melding">     
                <div class="meldingInfo">
                    <h3>Location</h3>
                    <?php // add location ?>
                    <h3>Melding type: <?php echo $m['type']?></h3>
                    <h3>Time: <?php echo $m['time']?></h3>
                    <?php if($m['melder_id']!= NULL):?>
                        <h3>Melder ID:  <?php echo $m['melder_id']?> </h3>
                    <?php endif; ?>                     
                </div>
                <?php if($m['user_id']!= NULL):?>
                    <div class="userInfo">
                        <h3>Persoon in nood: <?php echo $m['firstname']." ".$m['lastname'] ?></h3>
                        <p>Met de volgende aandoeningen:</p>
                        <?php $illnesses = User::getUserIllness($m['id']); 
                                foreach($illnesses as $i):
                        ?>
                            <p>- <?php echo $i['name'] ?></p><br>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
                <?php if($m['image']!= NULL):?>
                    <img src="<?php echo $m['image']?>" alt="melding image">
                <?php endif;?>
            </article>
        <?php endforeach; ?>
    <?php endif ?>
    
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>
</html> 