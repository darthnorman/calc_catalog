
<?php echo pageHeader($customer->name, 'glyphicon-list-alt') ?>

<form class="form-horizontal" action="/?controller=customer&action=show&id=<?php echo $customer->id ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $customer->id ?>" />
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="customerName">Kundenname</label>
		<div class="col-sm-8 col-lg-6">
			<input id="customerName" name="name" class="form-control" autocomplete="off" type="text" value="<?php echo $customer->name ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="customerAddress">Adresse</label>
		<div class="col-sm-8 col-lg-6">
			<input id="customerAddress" name="address" class="form-control" autocomplete="off" placeholder="Straße Hausnr., PLZ Ort" type="text" value="<?php echo $customer->address ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label">Kalkulationen (<?php echo $customer->getCalculationCount($customer->id) ?>)</label>
		<div class="col-sm-5 col-lg-3">
			<div class="list-group">
			<?php 
			$calculations = $customer->getCalculation($customer->id);
			foreach ($calculations as $calculation) {
				echo '<a class="list-group-item" title="Kalkulation ansehen" href="/?controller=calculation&action=show&id='.$calculation->id.'">'.$calculation->name.'</a>';
			} 
			?>
			</div>
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
