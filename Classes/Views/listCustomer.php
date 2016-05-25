<?php echo pageHeader('Kundenliste', 'glyphicon-list-alt') ?>
<div id="customers">
	<form class="filterform center-block">
		<div class="input-group input-group-lg">
			<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
			<span class="searchclear glyphicon glyphicon-remove-circle"></span>
			<input class="search form-control" placeholder="Filter nach Name und Adresse" type="text" value=""/>
		</div>
	</form>
	<div class="text-center">
		<a class="btn btn-success" href="/?controller=customer&action=show"><span class="glyphicon glyphicon-plus"></span> Kunde hinzufügen</a>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sort">
			<thead>
				<tr>
					<th>Kundenname</th>
					<th>Adresse</th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($customers as $customer) { ?>
				<tr>
					<td class="title">
						<a class="edit" title="Bearbeiten" href="/?controller=customer&action=show&id=<?php echo $customer->id ?>">
							<?php echo $customer->name ?>
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					</td>
					<td class="address">
						<?php echo $customer->address ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<script>
			var options = {
				valueNames: [ 'title', 'address' ]
			};
			var userList = new List('customers', options);
		</script>
	</div>
</div>
<div class="text-center">
	<a class="btn btn-success" href="/?controller=customer&action=show"><span class="glyphicon glyphicon-plus"></span> Kunde hinzufügen</a>
</div>
