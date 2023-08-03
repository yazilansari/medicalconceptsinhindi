<div class="tab-content">
    <?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->id; ?>
  <tr id="tr_<?php echo $id;?>">
    
    <td><?php echo $record->name; ?></td>
    <td><?php echo str_replace(',', '', $record->number); ?></td>
    <td><?php echo $record->email; ?></td>
    <td><?php echo $record->message; ?></td>
    <td><?php echo date('jS M, Y H:i:s',strtotime($record->created_at)); ?></td>
  </tr>
  <?php $i++;  } ?>

  <?php else: ?>
    <tr><td colspan="<?= (count($columns) + 2) ?>"><center><i>No Record Found</i></center></td><tr>
  <?php endif; ?>
  <tr>
    <td colspan="<?= (count($columns) + 2) ?>"><?php echo $this->ajax_pagination->create_links(); ?></td>
  </tr>
</div>

