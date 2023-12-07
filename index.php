<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SD HTML/CSS Instructiepagina</title>
    <meta name="author" content="Bethuel Heldt">
    <link rel="stylesheet" href="css/style.css">

<?php
// Read the JSON file content
$jsonContent = file_get_contents('video-instructies.json');
// Decode the JSON into a PHP array
$videoArray = json_decode($jsonContent, true);
// Check if decoding was successful
if ($videoArray === null && json_last_error() !== JSON_ERROR_NONE) {
    die('Error decoding JSON: ' . json_last_error_msg());
}
?>
</head>

<body>
    <header>
        <h1>SD HTML/CSS Instructiepagina</h1>
        <h2>leerjaar 1 - Module 2 - SKILL</h2>
        <h3>Docent: Bethuel Heldt</h3>
    </header>

    <nav>
        <label><input type="radio" name="nav_check"><a href="#intro" class="nav__link">intro</a></label>
<?php
// Looping through the 3D array
foreach ($videoArray as $depthKey => $depthValue) {
    $les = $depthKey+1;
    echo '<label><input type="radio" name="nav_check"><a href="#les'.$les.'" class="nav__link">les '.$les.'</a></label>';
}
?>            
        </nav>
    
    <main>
        <article id="intro">
<?php
require_once('lessen/introductie.html');
?>

        </article>
<?php
// Looping through the 3D array
$video_nr = 1;
$cntr = 0;
foreach ($videoArray as $depthKey => $depthValue) {
    $les = $depthKey+1;

?>
        <article id="les<?=$les?>">
            <h2>Les <?=$les?></h2>
<?php 
    require_once('lessen/les'.$les.'.html');
?>
            <h3>Video instructies</h3>
            <ol start="<?=$video_nr?>">
<?php
    foreach ($depthValue as [$link, $linktekst, $tekst]) {

        if($cntr === 0){
            //start van de reeks...deze is alleen als titel in de json
        } else {
            echo '<li><a href="' .$link.'" class="video-instructie" target="_blank">'.$linktekst.'</a>';
            if ($tekst) echo '<br>'.$tekst;
            echo '</li>';
         $video_nr++;
        }
        $cntr++;
    }
    $cntr = 0;
?>
            </ol>
        </article>
<?php
}
?>
    </main>
    <footer>
        <p>&copy;De video-instructies zijn geproduceerd door Jeroen Rijsdijk - deze lespagina is geproduceerd door Bethuel Heldt, 2023</p>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>