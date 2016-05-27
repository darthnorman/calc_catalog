<?php foreach($items as $item) { ?>
<div class="panel panel-info" id="<?php echo $item->id ?>">
	<div class="panel-heading">
		<button type="button" title="Entfernen" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h3 class="panel-title"><?php echo $item->name ?></h3>
	</div>
	<div class="panel-body">
		<?php echo nl2br($item->description) ?>
	</div>
	<div class="panel-footer">
		<div class="pull-left"><strong><?php echo pt($item->tmin) ?></strong></div>
		<div class="pull-right"><strong><?php echo pt($item->tmax) ?></strong></div>
		<div class="text-center"><?php echo $item->getCategory($item->category)->name ?></div>
	</div>
</div>
<?php } ?>
			