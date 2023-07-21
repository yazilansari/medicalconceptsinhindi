<div class="tab-content">
    <?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->users_id; ?>
  <tr id="tr_<?php echo $id;?>">
    
    <td><?php echo $record->email_id; ?></td>
    <td><?php echo $record->number; ?></td>
    <td><?php if($record->users_type=='General'){echo "General";}else{echo "Medico";} ?></td>    
    <td><?php echo $record->category_name; ?></td>
    <td><?php echo $record->sub_category_name; ?></td>
    <td><?php echo $record->upload_title; ?></td>
    <td><?php echo $record->upload_for_user_type; ?></td>
    <td><?php echo date('jS M, Y H:i:s',strtotime($record->seen_date_time)); ?></td>
  </tr>
  <?php $i++;  } ?>

  <?php else: ?>
    <tr><td colspan="<?= (count($columns) + 2) ?>"><center><i>No Record Found</i></center></td><tr>
  <?php endif; ?>
  <tr>
    <td colspan="<?= (count($columns) + 2) ?>"><?php echo $this->ajax_pagination->create_links(); ?></td>
  </tr>
</div>

