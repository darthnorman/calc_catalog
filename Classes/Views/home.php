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
<h2 class="sub-header">Aktuelle Kalkulationen</h2>
<div id="offers">
	<form class="filterform center-block has-info">
		<div class="input-group input-group-lg">
			<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
			<input class="search form-control" placeholder="Filter&hellip;" type="text"/>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sort">
			<thead>
				<tr>
					<th>Datum</th>
					<th>Titel</th>
					<th>Auftraggeber</th>
					<th>Summe in &euro;</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody class="list">
				<?php render('calculation','index') ?>
			</tbody>
		</table>
		<script>
			var options = {
				valueNames: [ 'title', 'customer', 'status' ]
			};
			var userList = new List('offers', options);
		</script>
	</div>
</div>
