<?php
if ($items) {
	$newCat = '';
	foreach($items as $item) {
		$currentCat = $item->getCategory($item->id)->name;
		if ($currentCat != $newCat)
			echo '<h3 class="text-center">'.$item->getCategory($item->id)->name.'</h3>'; ?>
		<div class="panel panel-info" data-itemid="<?php echo $item->id ?>">
			<input type="hidden" name="item[]" value="<?php echo $item->id ?>"/>
			<div class="panel-heading">
				<button type="button" title="Entfernen" class="close delete" ><span aria-hidden="true">&times;</span></button>
				<h3 class="panel-title"><?php echo $item->name ?></h3>
			</div>
			<div class="panel-body">
				<?php echo nl2br($item->description) ?>
			</div>
			<div class="panel-footer clearfix">
				<div class="pull-left"><strong><?php echo pt($item->tmin) ?></strong></div>
				<div class="pull-right"><strong><?php echo pt($item->tmax) ?></strong></div>
			</div>
		</div>
		<?php 
		$newCat = $item->getCategory($item->id)->name;
	} 
}
?>
