<?php $this->extend('mainlayout') ?>
<?php $this->block('title',$title) ?>

<?php // START CONTENT ?>
<?php // WHAT FOLLOWS IS RECEIVED BY mainlayout as $this['content] ?>
        
<?php
    $baseURL    = "http://"    . $_SERVER["HTTP_HOST"];
    $gURL       = $baseURL      . "/cal/{$hash}/g";
    $iURL       = $baseURL      . "/cal/{$hash}/i";
?>
  
<div class="card card-body bg-light">
    <h1>Your URLS</h1>
    <ul>
        <li>Google Calendar: <a href="<?php echo $gURL ?>"><?php echo $gURL ?></a></li>
        <li>Apple Calendar: <a href="<?php echo $iURL ?>"><?php echo $iURL ?></a></li>
    </ul>
    <h1>Your Buttons</h1> 
    <small>(download the buttons and host them yourself, or use your own images)</small>
    <ul>
        <li>Google Calendar: <a href="<?php echo $gURL ?>"><img src="<?php echo $baseURL . "/images/add-to-g-cal.png" ?>" width="150"></a></li>
        <li>Apple Calendar: <a href="<?php echo $iURL ?>"><img src="<?php echo $baseURL . "/images/add-to-apple-cal.png" ?>" width="150"></a></li>
    </ul>
</div>

<?php // END CONTENT ?>
