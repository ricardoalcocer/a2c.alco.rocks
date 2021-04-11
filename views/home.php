<?php $this->extend('mainlayout') ?>
<?php $this->block('title',$title) ?>

<?php // START CONTENT ?>
<?php // WHAT FOLLOWS IS RECEIVED BY mainlayout as $this['content] ?>
<h1>Hi there!</h1>

<p>I'm your home page</p>

<p>Here's a Call To Action that we've received from the controller:</p>
<?php // END CONTENT ?>

<?php $this->block('cta') ?>
    <?php echo $ctamessage ?>
<?php $this->endblock() ?>