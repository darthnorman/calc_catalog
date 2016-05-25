
<?php echo pageHeader('Einstellungen', 'glyphicon-cog') ?>

<form class="form-horizontal" action="/?controller=company&action=show&id=<?php echo $company->id ?>" method="POST">
	<input type="hidden" name="id" value="1" />
	<div class="form-group">
		<label class="col-sm-3 col-lg-2 control-label" for="companyName">Firmenname</label>
		<div class="col-sm-8 col-lg-6">
			<input id="companyName" name="name" class="form-control" type="text" value="<?php echo $company->name ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-2 control-label" for="companyTaxrate">Mehrwertsteuer</label>
		<div class="col-sm-5 col-lg-2">
			<div class="input-group">
				<input id="companyTaxrate" name="taxrate" class="form-control" type="text" value="<?php echo $company->taxrate ?>" />
				<div class="input-group-addon">%</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<div class="col-sm-8 col-md-5 col-lg-3 col-sm-offset-3 col-lg-offset-2">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Speichern</button>
		</div>
	</div>
</form>
