<select id="calculationCustomer" name="customer" class="form-control">
<?php 
if (!$currentId)
	echo '<option value="0">Bitte wählen...</option>';
foreach($customers as $customer) { ?> 
	<option value="<?php echo $customer->id ?>" <?php if ($currentId == $customer->id) echo "selected" ?>><?php echo $customer->name ?></option>
<?php } ?>
</select>
