<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->sub_category_id; ?>
<tr>
	<td>
		<input type="checkbox" name="ids[]" value="<?php echo $id ?>" id="check_<?= $id ?>" class="chk-col-<?= $active_theme; ?> filled-in" />
		<label for="check_<?= $id ?>"></label>
	</td>
	<td><?php echo $record->sub_category_name ?></td>
	<td><?php echo $record->category_name ?></td>
	<td><img src="<?php echo $record->sub_category_image; ?>" style="width: 50px;height: 50px;"></td>
	<td><?php echo $record->upload_for_user_type ?></td>
	<td>
		<a href="javascript://" class="tooltips" ><?php echo $record->total_upload_count ?></a>
	</td>
	<td><?php echo $record->sort_order ?></td>

	<td><p><a href="<?php echo base_url("$controller/edit/record/$id?c=$timestamp") ?>" class="tooltips" title="Edit <?php ucfirst($m_title) ?>" ><i class="fa fa-edit"></i> Edit <?= ucfirst($m_title) ?></a></p></td>
</tr>
<?php $i++;  } ?>

<?php else: ?>
	<tr><td colspan="<?= (count($columns) + 2) ?>"><center><i>No Record Found</i></center></td><tr>
<?php endif; ?>
<tr>
	<td colspan="<?= (count($columns) + 2) ?>"><?php echo $this->ajax_pagination->create_links(); ?></td>
</tr>