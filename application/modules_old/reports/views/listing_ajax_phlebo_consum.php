<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->phlebo_id; ?>
<tr>
    <td><?php echo $record->phlebo_name; ?></td>
    <td><?php echo $record->phlebo_mobile; ?></td>
    <td><?php echo "Month" ?></td>
    <td><?php echo "Year"; ?></td>
    <?php foreach($record->consumptions_arr as $con){?>
    	<td><?php echo $con['opening_stock']; ?></td>
    	<td><?php echo $con['used_stock']; ?></td>
    	<td><?php echo $con['closing_stock']; ?></td>
    	<td><?php echo $con['receipt_stock']; ?></td>
    <?php }?>
</tr>
<?php $i++;  } ?>
<?php else: ?>
<tr>
    <td colspan="<?= (count($columns) + 44) ?>">
        <center><i>No Record Found</i></center>
    </td>
<tr>
    <?php endif; ?>
<tr>
    <td colspan="<?= (count($columns) + 44) ?>"><span class="consumption_reports" id="phlebo_consum"></span><?php echo $this->ajax_pagination->create_links_grid(); ?></td>
</tr>