<?php echo pageHeader('Kalkulationen', 'glyphicon-list-alt') ?>
<div id="offers">
	<form class="filterform center-block has-info">
		<div class="input-group input-group-lg">
			<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
			<span class="searchclear glyphicon glyphicon-remove-circle"></span>
			<input class="search form-control" placeholder="Filter nach Titel, Kunde oder Status" type="text" value=""/>
		</div>
	</form>
	<div class="text-center">
		<a class="btn btn-success" href="/?controller=calculation&action=show"><span class="glyphicon glyphicon-plus"></span> Kalkulation hinzufügen</a>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sort">
			<thead>
				<tr>
					<th>Datum</th>
					<th>Titel</th>
					<th>Kunde</th>
					<th>Netto min. in &euro;</th>
					<th>Netto max. in &euro;</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($calculations as $calculation) { ?>
				<tr>
					<td>
						<?php echo dateFormat($calculation->tstamp); ?>
					</td>
					<td class="title">
						<a class="edit" title="Bearbeiten" href="?controller=calculation&action=show&id=<?php echo $calculation->id ?>">
							<?php echo $calculation->name ?>
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					</td>
					<td class="customer">
						<?php echo $calculation->getCustomer($calculation->id)->name ?>
					</td>
					<td>
						<?php echo formatCurrency($calculation->getCompletePriceMin($calculation->id)) ?>
					</td>
					<td>
						<?php echo formatCurrency($calculation->getCompletePriceMax($calculation->id)) ?>
					</td>
					<td class="status">
						<span class="label label-<?php echo $calculation->getStatus($calculation->id)->cssclass ?>"><?php echo $calculation->getStatus($calculation->id)->name ?></span>
					</td>
					<td class="text-right">
						<a class="delete" href="/?controller=calculation&action=delete&id=<?php echo $calculation->id?>" title="Löschen"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				<?php } ?>
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
