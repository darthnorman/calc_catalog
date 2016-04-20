<?php foreach($calculations as $calculation) { ?>
<tr>
	<td class="id">
		<a href="?controller=calculation&action=show&id=<?php echo $calculation->id ?>">
			<?php echo $calculation->id ?>
			<!-- TODO: Nummer -->
		</a>
	</td>
	<td>
		<!-- TODO: Datum -->
	</td>
	<td class="title">
		<?php echo $calculation->name ?>
	</td>
	<td class="customer">
    	<?php echo $calculation->getKunde($calculation->kunde)->name ?>
    </td>
    <td>
    	<!-- TODO: Summe in Euro -->
    </td>
    <td>
    	<span class="<?php echo $calculation->getStatus($calculation->status)->cssclass ?>"><?php echo $calculation->getStatus($calculation->status)->name ?></span>
    </td>
</tr>
<?php } ?>
