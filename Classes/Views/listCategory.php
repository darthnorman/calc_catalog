<?php echo pageHeader('Kategorien', 'glyphicon-list-alt') ?>
<div id="categories">
	<form class="filterform center-block">
		<div class="input-group input-group-lg">
			<div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
			<span class="searchclear glyphicon glyphicon-remove-circle"></span>
			<input class="search form-control" placeholder="Filter nach Name" type="text"/>
		</div>
	</form>
	<div class="text-center">
		<a class="btn btn-success" href="/?controller=category&action=add"><span class="glyphicon glyphicon-plus"></span> Kategorie hinzufügen</a>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover table-sort">
			<thead>
				<tr>
					<th>Name</th>
					<th>Anzahl Kalkulationspositionen</th>
				</tr>
			</thead>
			<tbody class="list">
				<?php foreach($categories as $category) { ?>
				<tr>
					<td class="title">
						<a class="edit" title="Bearbeiten" href="/?controller=category&action=show&id=<?php echo $category->id ?>">
							<?php echo $category->name ?>
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
					</td>
					<td class="category">
						<?php echo $category->getElementCount($category->id) ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<script>
			var options = {
				valueNames: [ 'title' ]
			};
			var userList = new List('items', options);
		</script>
	</div>
</div>
<div class="text-center">
	<a class="btn btn-success" href="/?controller=category&action=add"><span class="glyphicon glyphicon-plus"></span> Kategorie hinzufügen</a>
</div>
