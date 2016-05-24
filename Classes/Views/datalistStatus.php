<select id="calculationStatus" name="status" class="form-control">
<?php foreach($stati as $status) { ?> 
	<option value="<?php echo $status->id ?>" <?php if ($currentId == $status->id) echo "selected" ?>><?php echo $status->name ?></option>
<?php } ?>
</select>
