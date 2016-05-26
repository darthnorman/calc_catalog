<?php echo pageHeader('Kalkulationspositionen', 'glyphicon-list-alt') ?>

<ul>
	<?php 
	echo '<pre>';
	var_dump($items);
	echo '</pre>';
	?>
	<br />
	<?php foreach($items as $item) { ?>
	<li>
		<?php echo $item->id ?> | <?php echo $item->name ?> | <?php echo nl2br($item->description) ?> | <?php echo pt($item->tmin) ?> | <?php echo pt($item->tmax) ?>
		<?php //echo $item->getCategory($item->category)->name ?>
	</li>
	<?php } ?>
</ul>
			