
<?php echo pageHeader($category->name, 'glyphicon-list-alt') ?>

<form class="form-horizontal" action="/?controller=category&action=add&id=<?php echo $category->id ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $category->id ?>" />
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="categoryName">Bezeichnung</label>
		<div class="col-sm-8 col-lg-6">
			<input id="categoryName" name="name" class="form-control" autocomplete="off" type="text" value="<?php echo $category->name ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label">Kalkulationspositionen (<?php echo $category->getItemCount($category->id) ?>)</label>
		<div class="col-sm-5 col-lg-3">
			<div class="list-group">
			<?php 
				$items = $category->getItems($category->id);
				foreach ($items as $item) {
					echo '<a class="list-group-item" title="Position ansehen" href="/?controller=item&action=show&id='.$item->id.'">'.$item->name.'</a>';
				} 
			?>
			</div>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<div class="col-sm-8 col-md-5 col-lg-3 col-sm-offset-3 col-lg-offset-3">
			<button type="submit" class="btn btn-primary" name="send" value="1"><span class="glyphicon glyphicon-ok"></span> Speichern</button>
			<a class="btn btn-default pull-right" href="/?controller=category&action=index" role="button"><span class="glyphicon glyphicon-remove"></span> Abbrechen</a>
		</div>
	</div>
</form>
