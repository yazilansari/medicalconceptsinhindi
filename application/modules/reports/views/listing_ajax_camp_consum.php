<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->phlebo_id; ?>
<tr>
    <td><?php echo $record->camp_date; ?></td>
    <td><?php echo $record->start_time; ?></td>
    <td><?php echo $record->end_time; ?></td>
    <td><?php echo $record->phlebo_name; ?></td>
    <?php foreach($record->consumptions_arr as $con){?>
        <td><?php echo $record->patient_count; ?></td>
    	<td><?php echo $con['consumptions_used_quantity']; ?></td>
    <?php }?>
</tr>
<?php $i++;  } ?>
<?php else: ?>
<tr>
    <td colspan="<?= (count($columns) + 20) ?>">
        <center><i>No Record Found</i></center>
    </td>
<tr>
    <?php endif; ?>
<tr>
    <td colspan="<?= (count($columns) + 20) ?>"><span class="consumption_reports" id="camp_consum"></span><?php echo $this->ajax_pagination->create_links_grid(); ?></td>
</tr>