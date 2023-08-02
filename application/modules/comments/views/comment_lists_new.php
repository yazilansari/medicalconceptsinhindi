<div class="row clearfix">
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					<?= $pg_title ?>
				</h2>
				<!-- <ul class="header-dropdown m-r--5">
					<li class="dropdown">
						
						<a class="btn btn-primary waves-effect" href="<?php echo base_url("$download_url") ?>" id="export" title="Export">Export</a>
						
					</li>
				</ul> -->
			</div>
			<input type="hidden" id="post_id" value="<?php if($post_id!=''){echo $post_id;}?>">
			<input type="hidden" id="flag" value="<?php if($flag!=''){echo $flag;}?>">
			<div id="comments_list_ajax"></div>
		</div>
	</div>
</div>
<!-- #END# Basic Table -->

<script type="text/javascript">
	var listing_url = "<?php echo $listing_url ?>";
	var download_url = "<?php echo $download_url ?>";
</script>