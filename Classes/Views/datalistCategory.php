<select id="itemCategory" name="category" class="form-control">
<?php foreach($categories as $category) { ?> 
	<option value="<?php echo $category->id ?>" <?php if ($currentId == $category->id) echo "selected" ?>><?php echo $category->name ?></option>
<?php } ?>
</select>
