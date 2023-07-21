<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->id; ?>

<tr>
	<td>
		<input type="checkbox" name="ids[]" value="<?php echo $id ?>" id="check_<?= $id ?>" class="chk-col-<?= $active_theme; ?> filled-in" />
		<label for="check_<?= $id ?>"></label>
	</td>
	<td><?php echo $record->title ?></td>
	<!-- <td><?php //echo $record->designation ?></td> -->
	<td><img src="<?php echo $record->image; ?>" style="width: 50px;height: 50px;"></td>
	<td><?php echo date('jS M,Y',strtotime($record->created_at)); ?></td>
	<!-- <td><?php //echo substr(str_replace('\r\n', '', $record->data),0,500) ?></td> -->
	<td><p><a href="<?php echo base_url("$controller/edit/record/$id?c=$timestamp") ?>" class="tooltips" title="Edit <?php ucfirst($m_title) ?>" ><i class="fa fa-edit"></i> Edit <?= ucfirst($m_title) ?></a></p></td>
	
</tr>
<?php $i++;  } ?>

<?php else: ?>
	<tr><td colspan="<?= (count($columns) + 2) ?>"><center><i>No Record Found</i></center></td><tr>
<?php endif; ?>
<tr>
	<td colspan="<?= (count($columns) + 2) ?>"><?php echo $this->ajax_pagination->create_links(); ?></td>
</tr>