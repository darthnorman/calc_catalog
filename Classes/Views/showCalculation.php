
<?php echo pageHeader($calculation->name, 'glyphicon-list-alt') ?>

ID: <?php echo $calculation->id ?>
<br />
NAME: <?php echo $calculation->name ?>
<br />
KUNDE: <?php echo $calculation->getKunde($calculation->kunde)->name ?>
<br />
STATUS: <span class="<?php echo $calculation->getStatus($calculation->status)->cssclass ?>"><?php echo $calculation->getStatus($calculation->status)->name ?></span>
