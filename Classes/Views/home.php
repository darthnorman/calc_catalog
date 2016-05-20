<?php echo pageHeader($title,'glyphicon-th-large');?>
<div class="row placeholders">
	<a class="col-xs-4 placeholder" href="#">
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" height="100" width="100">
		<h4>Angebote verwalten</h4>
		<span class="hidden-xs text-muted">Angebote erstellen und bearbeiten</span>
	</a>
	<a class="col-xs-4 placeholder" href="/?controller=item&action=index">
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" height="100" width="100">
		<h4>Angebots&shy;position verwalten</h4>
		<span class="hidden-xs text-muted">Angebotsposition verfassen und bearbeiten</span>
	</a>
	<a class="col-xs-4 placeholder" href="#">
		<img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" class="img-responsive" alt="Generic placeholder thumbnail" height="100" width="100">
		<h4>Kunden verwalten</h4>
		<span class="hidden-xs text-muted">Auftraggeber anlegen und bearbeiten</span>
	</a>
</div>
<?php render('calculation','index') ?>
