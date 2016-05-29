
<?php echo pageHeader($calculation->name, 'glyphicon-list-alt') ?>

<form id="calcForm" class="form-horizontal" action="/?controller=calculation&action=show&id=<?php echo $calculation->id ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $calculation->id ?>" />
	<input type="hidden" name="tstamp" value="<?php echo time() ?>" />
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="calculationName">Titel</label>
		<div class="col-sm-8 col-lg-6">
			<input id="calculationName" name="name" class="form-control" autocomplete="off" type="text" value="<?php echo $calculation->name ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="calculationCustomer">Kunde</label>
		<div class="col-sm-5 col-lg-3">
			<?php render('customer','datalist') ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="calculationStatus">Status</label>
		<div class="col-sm-5 col-lg-3">
			<?php render('status','datalist') ?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="calculationPteam">Tagessatz Entwicklung</label>
		<div class="col-sm-5 col-lg-3">
			<div class="input-group">
				<input id="calculationPteam" name="price_team" class="form-control" type="text" placeholder="0" value="<?php echo formatCurrency($calculation->price_team) ?>" />
				<div class="input-group-addon">&euro;</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label" for="calculationPpm">Tagessatz PM</label>
		<div class="col-sm-5 col-lg-3">
			<div class="input-group">
				<input id="calculationPpm" name="price_pm" class="form-control" type="text" placeholder="0" value="<?php echo formatCurrency($calculation->price_pm) ?>" />
				<div class="input-group-addon">&euro;</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label">Brutto min.</label>
		<div class="col-sm-5 col-lg-3">
			<div class="input-group">
				<input class="form-control" type="text" readonly value="<?php echo getBrutto($calculation->getCompletePriceMin($calculation->id)) ?>" />
				<div class="input-group-addon">&euro;</div>
			</div>
			<span class="help-block"><small>inkl. 10&thinsp;% PM und <?php echo Company::getTaxrate() ?>&thinsp;% Mehrwertsteuer</small></span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label">Brutto max.</label>
		<div class="col-sm-5 col-lg-3">
			<div class="input-group">
				<input class="form-control" type="text" readonly value="<?php echo getBrutto($calculation->getCompletePriceMax($calculation->id)) ?>" />
				<div class="input-group-addon">&euro;</div>
			</div>
			<span class="help-block"><small>inkl. 10&thinsp;% PM und <?php echo Company::getTaxrate() ?>&thinsp;% Mehrwertsteuer</small></span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 col-lg-3 control-label">Kalkulationspositionen</label>
		<div id="calculationItems" class="col-sm-8 col-lg-6">
			<?php $calculation->listItems($calculation->id) ?>
			<div class="panel panel-default panel-ghost">
				<div class="panel-body">
					<a class="btn btn-success position-add" href="#"><span class="glyphicon glyphicon-plus"></span> Position hinzufügen</a>
					<?php render('item','datalist'); ?>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="form-group">
		<div class="col-sm-8 col-md-5 col-lg-3 col-sm-offset-3 col-lg-offset-3">
			<button type="submit" class="btn btn-primary" name="send" value="1"><span class="glyphicon glyphicon-ok"></span> Speichern</button>
			<a class="btn btn-default pull-right" href="/?controller=calculation&action=index" role="button"><span class="glyphicon glyphicon-remove"></span> Abbrechen</a>
		</div>
	</div>
</form>
