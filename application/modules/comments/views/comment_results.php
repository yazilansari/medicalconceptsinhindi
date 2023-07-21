<div class="body table-responsive">
    <table class="table table-striped table-condensed">
        <thead>
            <tr>
                
                <?php foreach ($columns as $headers) { ?>
                <th class="font-bold"><?= $headers ?></th>
                <?php } ?>				
            </tr>
        </thead>
        <tbody id="tbody">
            <?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->comments_id; ?>
            <tr>
                <td><?php echo $record->upload_title; ?></td>
                <td><?php echo $record->sub_category_name; ?></td>
                <td><?php echo $record->category_name; ?></td>
                <td><?php echo $record->users_name; ?></td>
                <td><?php echo $record->users_email; ?></td>
                <td><?php echo $record->comment; ?></td>
                <td><?php echo date('jS M,Y',strtotime($record->comments_dt)); ?></td>
                <td><?php if($record->is_approved=='1'){ echo "Approved";}else{echo "Disapproved";}?></td>
                <td>
                    <?php if($record->is_approved=='0' || $record->is_approved==''){?>
                    <a href="javascript://" data-id="<?php echo $id;?>" data-type="<?php echo $record->is_approved;?>" class="comment_approve btn btn-success m-t-15 waves-effect"><i class="material-icons">done_outline</i> Approve</a>
                    <?php }else if($record->is_approved=='1'){?>
                    <a href="javascript://" data-id="<?php echo $id;?>" data-type="<?php echo $record->is_approved;?>" class="comment_approve btn btn-danger m-t-15 waves-effect"><i class="material-icons">clear</i> Disapprove</a>
                    <?php }?>
                </td>
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
        <td colspan="<?= (count($columns) + 2) ?>"><?php echo $this->ajax_pagination->create_links(); ?></td>
    </tr>
       </tbody>
    </table>
</div>