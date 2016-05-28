<?php echo pageHeader('Kalkulationspositionen', 'glyphicon-list-alt') ?>
<div id="items">
	<form class="filterform center-block">
		<div class="input-group input-group-lg">
			<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
			<span class="searchclear glyphicon glyphicon-remove-circle"></span>
			<input class="search form-control" placeholder="Filter nach Name oder Kategorie" type="text" value=""/>
		</div>
	</form>
	<div class="text-center">
		<a class="btn btn-success" href="/?controller=item&action=add"><span class="glyphicon glyphicon-plus"></span> Position hinzufügen</a>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sort">
			<thead>
				<tr>
					<th>Positionsname</th>
					<th>Beschreibung</th>
					<th>PT min.</th>
					<th>PT max.</th>
					<th colspan="2">Kategorie</th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($items as $item) { ?>
				<tr>
					<td class="title">
						<a class="edit" title="Bearbeiten" href="/?controller=item&action=show&id=<?php echo $item->id ?>">
							<?php echo $item->name ?>
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					</td>
					<td>
						<?php echo nl2br($item->description) ?>
					</td>
					<td>
						<?php echo pt($item->tmin) ?>
					</td>
					<td>
						<?php echo pt($item->tmax) ?>
					</td>
					<td class="category">
						<?php echo $item->getCategory($item->category)->name ?>
					</td>
					<td class="text-right">
						<a class="delete" href="/?controller=item&action=delete&id=<?php echo $item->id?>" title="Löschen"><span class="glyphicon glyphicon-trash"></span></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<script>
			var options = {
				valueNames: [ 'title', 'category' ]
			};
			var userList = new List('items', options);
		</script>
	</div>
</div>
