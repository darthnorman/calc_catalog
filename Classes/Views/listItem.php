<?php echo pageHeader('Kalkulationspositionen', 'glyphicon-list-alt') ?>
<div id="items">
	<form class="filterform center-block">
		<div class="input-group input-group-lg">
			<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
			<input class="search form-control" placeholder="Filter&hellip;" type="text"/>
		</div>
	</form>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sort">
			<thead>
				<tr>
					<th>Positionsname</th>
					<th>Beschreibung</th>
					<th>PT min.</th>
					<th>PT max.</th>
					<th>Kategorie</th>
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


