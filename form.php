<?php
    include_once("lib/settings/config.php");
    $title = "INSTELLINGEN";


    try {
        
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
    <title><?php echo $title ?></title>
</head>
<body>
    <?php include_once("lib/includes/nav.inc.php"); ?>   
    
    <form action="" method="post">
        <div class="name">
            <label for="name" type="hidden" >name</label>
            <input type="text" id="name" placeholder="name" name="name">
        </div>
        <div class="geboortedatum">
            <label for="geboortedatum" type="hidden" >geboortedatum</label>
            <input type="date" id="geboortedatum" placeholder="geboortedatum" name="geboortedatum">
        </div>
        <div class="huis">
            <label for="huis">in nood huis betreden mag</label>
            <label class="switch">
            <input type="checkbox" id="huis" name="huis">
            <span class="slider round"></span></label>
        </div>
        <div class="risicogroep">
            <label for="risicogroep">hebt u een aandoening</label>
            <label class="switch">
            <input type="checkbox" id="risicogroep" name="risicogroep">
            <span class="slider round"></span></label>
        </div>
        <div class="aandoening">
            <select name="aandoening">
                <option value="aandoening">aandoening</option>
                <option value="diabetes">diabetes</option>
                <option value="hoge bloeddruklijders">hoge bloeddruklijders</option>
                <option value="epilepsie">epilepsie</option>
            </select>
        </div>
        <div class="gewicht">
            <label for="gewicht" type="hidden" >gewicht</label>
            <input type="number" id="gewicht" placeholder="gewicht" name="gewicht">
        </div>
        <div class="bloedgroep">
            <select name="bloedgroep">
                <option value="bloedgroep">bloedgroep</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
        </div>
        <div class="arts">
            <label for="arts">bent u hulpverlener</label>
            <label class="switch">
            <input type="checkbox" id="arts" name="arts">
            <span class="slider round"></span></label>
        </div>
        <div class="riziv">
            <label for="riziv" type="hidden" >riziv</label>
            <input type="number" id="riziv" placeholder="riziv" name="riziv">
        </div>
        <div class="job">
            <label for="job" type="hidden" >job</label>
            <input type="text" id="job" placeholder="job" name="job ">
        </div>
        <div class="melding">
            <label for="melding">wil meldingen ontvangen</label>
            <label class="switch">
            <input type="checkbox" id="melding" name="melding">
            <span class="slider round"></span></label>
        </div>
    </form>
    
    
    <?php include_once("lib/includes/footer.inc.php"); ?>
</body>
</html> 