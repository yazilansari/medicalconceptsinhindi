<div class="row clearfix">
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					<?= $pg_title ?>
				</h2>
				<ul class="header-dropdown m-r--5">
					<li class="dropdown">
						
						<a class="btn btn-primary waves-effect" href="<?php echo base_url("$download_url") ?>" id="export" title="Export">Export</a>
						
					</li>
				</ul>
			</div>
			<div class="body table-responsive">
				<?php echo form_open("$controller/remove_new",array('id'=>'frm_delete', 'name'=>'frm_delete')); ?>
					<div class="form-group">
                    	<div class="form-line">
                        	<input type="text" name="keywords" placeholder="Search" class="form-control textfield" maxlength="100" autocomplete="off" />
                        </div>                        
                	</div>
					<table class="table table-striped table-condensed">
						<thead>
							<tr>
								<th>
									<input type="checkbox" name="" id="checkall" class="chk-col-<?= $active_theme; ?> filled-in">
									<label for="checkall" style="margin:0; vertical-align:bottom"></label>
								</th>
								
								<?php foreach ($columns as $headers) { ?>
								<th class="font-bold"><?= $headers ?></th>
								<?php } ?>				
								
							</tr>
						</thead>
						<tbody id="tbody">
							<?php include_once 'results_new.php'; ?>
						</tbody>
					</table>
					<a class="btn btn-danger deleteAction" href="#" data-type="ajax-loader"><i class="material-icons">remove_circle</i> <span>Delete</span></a>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Table -->

<script type="text/javascript">
	var listing_url = "<?php echo $listing_url ?>";
	var download_url = "<?php echo $download_url ?>";
</script>