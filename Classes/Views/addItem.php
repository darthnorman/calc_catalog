
<?php echo pageHeader('Kalkulationsposition anlegen', 'glyphicon-list-alt') ?>

<form class="form-horizontal" action="/?controller=item&action=show" method="POST">
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="itemName">Positionsname</label>
		<div class="col-sm-8 col-lg-6">
			<input id="itemName" name="name" class="form-control" autocomplete="off" type="text" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="itemDescription">Beschreibung</label>
		<div class="col-sm-8 col-lg-6">
			<textarea id="itemDescription" name="description" class="form-control" rows="5" placeholder="maximal 1000 Zeichen"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="itemTmin">min. Aufwand</label>
		<div class="col-sm-5 col-lg-3">
			<div class="input-group">
				<input id="itemTmin" name="tmin" class="form-control" type="text" placeholder="0" value="" />
				<div class="input-group-addon">PT</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="itemTmax">max. Aufwand</label>
		<div class="col-sm-5 col-lg-3">
			<div class="input-group">
				<input id="itemTmax" name="tmax" class="form-control" type="text" placeholder="0" value="" />
				<div class="input-group-addon">PT</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="itemCategory">Kategorie</label>
		<div class="col-sm-5 col-lg-3">
			<?php render('category','datalist') ?>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<div class="col-sm-8 col-md-5 col-lg-3 col-sm-offset-3 col-lg-offset-3">
			<button type="submit" class="btn btn-primary" name="submit" value="1"><span class="glyphicon glyphicon-ok"></span> Speichern</button>
			<a class="btn btn-default pull-right" href="/?controller=item&action=index" role="button"><span class="glyphicon glyphicon-remove"></span> Abbrechen</a>
		</div>
	</div>
</form>
