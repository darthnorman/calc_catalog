<div id="addNewItem" class="row hide">
	<div class="col-xs-6 col-sm-8">
		<select id="chooseItem" disabled class="form-control" name="item[]">
			<option selected value="0">Bitte wählen...</option>
		<?php
		$newCat = '';
		foreach($items as $item) {
			$currentCat = $item->getCategory($item->id)->name;
			
			if ($currentCat != $newCat)
				echo '<optgroup label="'.$item->getCategory($item->id)->name.'"/>';
			
			echo '<option value="'.$item->id.'">'.$item->name.'</option>';
			
			$newCat = $item->getCategory($item->id)->name;
		}
		?>
		</select>
	</div>
	<div class="col-xs-6 col-sm-4">
		<button type="submit" class="btn btn-primary" name="send" value="1"><span class="glyphicon glyphicon-ok"></span> Speichern</button>
	</div>
</div>