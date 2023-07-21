<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					<?= $pg_title ?>
				</h2>
				<ul class="header-dropdown m-r--5">
					<li class="dropdown">
						<a class="btn btn-primary waves-effect" href="<?php echo base_url("$controller/add") ?>">Add <?= ucfirst($m_title) ?></a>
						<!-- <a class="btn btn-primary waves-effect" href="#" id="import" data-toggle="modal" data-target="#uploadbox" title="Upload CSV">Upload CSV</a> -->
						<a class="btn btn-primary waves-effect" href="<?php echo base_url("$download_url") ?>" id="export" title="Export">Export</a>
					</li>
				</ul>
			</div>
			<div class="body table-responsive">
				<?php echo form_open("$controller/remove",array('id'=>'frm_delete', 'name'=>'frm_delete')); ?>
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
								
								<th class="font-bold"><i class="fa fa-edit"></i> Action</th>
							</tr>
						</thead>
						<tbody id="tbody">
							<?php include_once 'results.php'; ?>
						</tbody>
					</table>
					<a class="btn btn-danger deleteAction" href="#" data-type="ajax-loader"><i class="material-icons">remove_circle</i> <span>Delete</span></a>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Table -->

<div class="modal fade in" id="uploadbox" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<?php echo form_open("$controller/uploadcsv",array('id'=>'uploadForm', 'name'=>'frm_delete')); ?>

            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Upload CSV File</h4>
            </div>

            <div class="modal-body">
            	<div class="row" style="margin-bottom: 25px">
                	<div class="col-sm-3"><b>CSV columns: </b></div>
                	<div class="col-sm-9"><?php echo implode('<span class="seperator"> | </span>', $csv_fields) ?></div>
                </div>
				
				<div class="form-group form-float">
					<div class="form-line focused">
						<input type="file" name="csvfile" class="form-control textfield" />
					</div>
				</div>

				<div id="show_msg" class="show_msg" style="display:none;"></div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="upload-btn" class="btn btn-link waves-effect">Upload</button>
                <button type="button" class="btn btn-link waves-effect reset-upload" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
	var listing_url = "<?php echo $listing_url ?>";
	var download_url = "<?php echo $download_url ?>";
</script>