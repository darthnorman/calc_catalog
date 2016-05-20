
<?php echo pageHeader($calculation->name, 'glyphicon-list-alt') ?>

ID: <?php echo $calculation->id ?>
<br />
TSTAMP: <?php echo $calculation->tstamp ?>
<br />
NAME: <?php echo $calculation->name ?>
<br />
KUNDE: <?php echo $calculation->getCustomer($calculation->customer)->name ?>
<br />
STATUS: <span class="<?php echo $calculation->getStatus($calculation->status)->cssclass ?>"><?php echo $calculation->getStatus($calculation->status)->name ?></span>
