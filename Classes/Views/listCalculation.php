<?php foreach($calculations as $calculation) { ?>
<tr>
	<td>
		<?php echo dateFormat($calculation->tstamp); ?>
	</td>
	<td class="title">
		<a href="?controller=calculation&action=show&id=<?php echo $calculation->id ?>">
		<?php echo $calculation->name ?>
		</a>
	</td>
	<td class="customer">
    	<?php echo $calculation->getCustomer($calculation->customer)->name ?>
    </td>
    <td>
    	<!-- TODO: Summe in Euro -->
    </td>
    <td class="status">
    	<span class="<?php echo $calculation->getStatus($calculation->status)->cssclass ?>"><?php echo $calculation->getStatus($calculation->status)->name ?></span>
    </td>
</tr>
<?php } ?>
