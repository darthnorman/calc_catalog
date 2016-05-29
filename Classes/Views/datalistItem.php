<div id="addNewItem" class="hide">
	<div class="input-group">
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
		<div class="input-group-btn">
			<button type="submit" class="btn btn-primary" name="send" value="1"><span class="glyphicon glyphicon-ok"></span> Speichern</button>
			<button type="button" title="Ausblenden" class="btn btn-default hideChooseItem" ><span class="glyphicon glyphicon-remove"></span></button>
		</div>
	</div>
</div>