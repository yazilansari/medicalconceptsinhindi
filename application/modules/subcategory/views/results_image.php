<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->id; ?>
<tr>
	<td>
		<input type="checkbox" name="ids[]" value="<?php echo $id ?>" id="check_<?= $id ?>" class="chk-col-<?= $active_theme; ?> filled-in" />
		<label for="check_<?= $id ?>"></label>
	</td>
	<td><?php echo $record->sub_category_name ?></td>
	<td><?php echo $record->category_name ?></td>
	<td><?php echo $record->parent_category_name ?></td>
	<?php if(explode('.', $record->image)[3] == 'mp4') { ?>
	<td><video width="50" height="50" controls="" poster="">
			<source src="<?php echo $record->image; ?>" type="video/mp4">
		</video>
	</td>
	<?php } else { ?>
	<td><img src="<?php echo $record->image; ?>" style="width: 50px;height: 50px;"></td>
	<?php } ?>
</tr>
<?php $i++;  } ?>

<?php else: ?>
	<tr><td colspan="<?= (count($columns) + 2) ?>"><center><i>No Record Found</i></center></td><tr>
<?php endif; ?>
<tr>
	<td colspan="<?= (count($columns) + 2) ?>"><?php echo $this->ajax_pagination->create_links(); ?></td>
</tr>