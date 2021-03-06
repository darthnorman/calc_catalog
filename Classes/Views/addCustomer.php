
<?php echo pageHeader('Kunden anlegen', 'glyphicon-list-alt') ?>

<form class="form-horizontal" action="/?controller=customer&action=show" method="POST">
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="customerName">Kundenname</label>
		<div class="col-sm-8 col-lg-6">
			<input id="customerName" name="name" class="form-control" autocomplete="off" type="text" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="customerAddress">Adresse</label>
		<div class="col-sm-8 col-lg-6">
			<input id="customerAddress" name="address" class="form-control" autocomplete="off" placeholder="Straße Hausnr., PLZ Ort" type="text" value="" />
		</div>
	</div>
	<hr>
	<div class="form-group">
		<div class="col-sm-8 col-md-5 col-lg-3 col-sm-offset-3 col-lg-offset-3">
			<button type="submit" class="btn btn-primary" name="send" value="1"><span class="glyphicon glyphicon-ok"></span> Speichern</button>
			<a class="btn btn-default pull-right" href="/?controller=customer&action=index" role="button"><span class="glyphicon glyphicon-remove"></span> Abbrechen</a>
		</div>
	</div>
</form>
