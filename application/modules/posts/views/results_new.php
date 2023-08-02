<?php $i = 1; if(sizeof($collection)) : foreach ($collection as $record) { $id = $record->id; ?>
<tr id="tr_<?php echo $id;?>">
	<td>
		<input type="checkbox" name="ids[]" value="<?php echo $id ?>" id="check_<?= $id ?>" class="chk-col-<?= $active_theme; ?> filled-in" />
		<label for="check_<?= $id ?>"></label>
	</td>
	<td><?php echo $record->title ?></td>
	<td><?php echo $record->category_name ?></td>
	<td><?php echo $record->sub_category_name ?></td>
	<td>
		<?php if($record->comment_count!='0'){?>
			<!-- <a href="javascript://" class="grid-table-anchor" data-id="<?php echo $id;?>" data-from="comments" data-type="posts" data-column='10'> --><a href="<?php echo base_url("comments/view_on_new/record/$id?c=$timestamp") ?>" title="Approve Comments"><b><?php echo $record->comment_count; ?></b>
			<i style="padding: 10px !important;" class="material-icons">launch</i></a>
		<?php } else {?>
			<?php echo $record->comment_count; ?>
		<?php }?>
	</td>
	<!-- <td>
		<div class="comment"><?php echo substr($record->short_description, 0, 500);?></div>
	</td> -->
	<!-- <td><?php echo $record->upload_for_user_type ?></td> -->
	<td><?php echo $record->type ?></td>
	<!-- <td>
		<div class="comment"><?php echo substr(str_replace('\r\n', '', $record->description), 0, 500);?></div>
	</td> -->
	<!-- <td><?php if($record->type=='image') { ?>
			<a class="fancy" id="single_image" href="<?php echo $this->config->item('s3_posts_images_path').$record->sub_category_id.'/'.$record->image ?>"><img src="<?php echo $this->config->item('s3_posts_images_path').$record->sub_category_id.'/'.$record->image ?>" style="width: 50px; height: 50px;" alt=""/></a>
		<?php } else if($record->upload_type=='video') { ?>
			<?php if($record->video_type=='inhouse' || $record->video_type==''){?>
				<a data-fancybox href="<?php echo $this->config->item('s3_posts_video_path').$record->sub_category_id.'/'.$record->upload_path ?>">
				    <?php echo $record->upload_path;?>
				</a>	
			<?php } else if($record->video_type=='youtube'){?>
				<a data-fancybox href="https://www.youtube.com/watch?v=<?php echo $record->video_url;?>">
				    <?php echo $record->video_url;?>
				</a>
			<?php }?>
		<?php }else if($record->upload_type=='audio'){?>
			<a class="fancy" id="single_image" href="<?php echo $this->config->item('posts_audio_path').$record->sub_category_id.'/'.$record->upload_path ?>">
			    <?php echo $record->upload_path;?>
			</a>	
		<?php }elseif($record->upload_type=='pdf'){?>
			<a data-fancybox href="<?php echo $this->config->item('s3_posts_pdf_path').$record->sub_category_id.'/'.$record->upload_path ?>">
			    <?php echo $record->upload_path;?>
			</a>	
		<?php }else?>
	</td> -->
	<!-- <td><?php echo $record->tags ?></td> -->
	<!-- <td><?php echo $record->sort_order ?></td> -->
	<!-- <td><?php echo $record->meta_title?></td>
	<td><?php echo $record->meta_description ?></td>
	<td><?php echo $record->meta_keyword ?></td> -->
	<!-- <td><?php echo $record->meta_post_url ?></td> -->
	<!-- <td><?php echo $record->meta_slug ?></td>  -->
	<td><?php echo $record->created_at ?></td>
	<td><p><a href="<?php echo base_url("$controller/edit_new/record/$id?c=$timestamp") ?>" class="tooltips" title="Edit <?php ucfirst($m_title) ?>" ><i class="fa fa-edit"></i> Edit <?= ucfirst($m_title) ?></a></p></td>
</tr>
<?php $i++;  } ?>

<?php else: ?>
	<tr><td colspan="<?= (count($columns) + 2) ?>"><center><i>No Record Found</i></center></td><tr>
<?php endif; ?>
<!-- <tr>
	<td colspan="<?= (count($columns) + 2) ?>"><?php echo $this->ajax_pagination->create_links(); ?></td>
</tr> -->
 
<script type="text/javascript">
	$("a.fancy").fancybox({
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	600, 
		'speedOut'		:	200, 
		'overlayShow'	:	true,
		'protect': true
	});
</script>
