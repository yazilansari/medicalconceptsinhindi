<div class="grid-filter-div">
    
    <a class="btn btn-primary grid_close_btn" href="javascript://" style="float: right;margin-bottom: 5px;">Close</a>
</div>
<table>
    <thead>
        <tr>
            <?php foreach ($columns as $headers) { ?>
            <th class="font-bold" style="min-width: 75px;color:black;"><?= $headers ?></th>
            <?php } ?>
            
        </tr>
    </thead>
    <tbody id="tbody11">
        <?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->comments_id; ?>
        <tr>
            <td><?php echo $record->users_name; ?></td>
            <td><?php echo $record->users_email; ?></td>
            <td><?php echo $record->comment; ?></td>
            <td><?php echo date('jS M,Y H:i:s',strtotime($record->comments_dt)); ?></td>
            
        </tr>
        <?php $i++;  } ?>
        <?php else: ?>
        <tr>
            <td colspan="<?= (count($columns) + 2) ?>">
                <center><i>No Record Found</i></center>
            </td>
        <tr>
            <?php endif; ?>
        <tr>
			<td colspan="<?= (count($columns) + 2) ?>"><?php echo $this->ajax_pagination->create_links_grid(); ?></td>
		</tr>
    </tbody>
</table>