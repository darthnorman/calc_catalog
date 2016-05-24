<select id="calculationCustomer" name="customer" class="form-control">
<?php foreach($customers as $customer) { ?> 
	<option value="<?php echo $customer->id ?>" <?php if ($currentId == $customer->id) echo "selected" ?>><?php echo $customer->name ?></option>
<?php } ?>
</select>
