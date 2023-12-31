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
						<!-- <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							<i class="material-icons">more_vert</i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a href="<?php echo base_url("$controller/add") ?>">Add <?= ucfirst($m_title) ?></a></li>
							<li><a href="#" id="import" data-toggle="modal" data-target="#uploadbox" title="Upload CSV">Upload CSV</a></li>
							<li><a href="<?php echo base_url("$download_url") ?>" id="export" title="Export">Export</a></li>
						</ul> -->
					</li>
				</ul>
			</div>
			<div class="body table-responsive">
				<?php echo form_open("$controller/remove",array('id'=>'frm_delete', 'name'=>'frm_delete')); ?>
					<div class="form-group">
                    	<!-- <div class="form-line">
                        	<input type="text" name="keywords" placeholder="Search" class="form-control textfield" maxlength="100" autocomplete="off" />
                        </div>   -->
                        <div class="col-md-3">
							<label for="main_category_id">Main Category Name<span class="required">*</span></label>
			                <div class="form-group">
			                    <div class="form-line">
			                        <select name="main_category_id" class="form-control" data-placeholder="Select Main Category" id="main_category_id">
			                            <option></option>
			                        </select>
			                    </div>
			                </div>
						</div>
						<div class="col-md-3">
							   <label for="category_id">Category Name</label>
								<div class="form-group">
				                    <div class="form-line">
										<select name="category_id" class="form-control" data-placeholder="Select Category" id="category_id">
											<option></option>
										</select>
									</div>
								</div>
						</div>
						<div class="col-md-3 text-left subcategory">
							<a class="btn btn-primary waves-effect search_for_posts  pull-left m-b-5" href="javascript://" data-type="ajax-loader" style="float: right;margin-left: 5px;"><i class="material-icons">search</i> <span>Filter</span></a>

						    <a class="btn btn-primary waves-effect clear_all clearS  pull-left m-b-5" href="javascript://" data-type="ajax-loader" style="float: right;margin-left: 5px;"><i class="material-icons">clear_all</i> <span>Clear</span></a>

						    <a class="btn btn-primary waves-effect sort_posts  pull-left" href="javascript://" data-type="ajax-loader" style="float: right;margin-left: 5px;" data-toggle="modal" data-target="#uploadbox" ><i class="material-icons">book</i> <span>Sort Subcategory</span></a>                     
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
                <h4 class="modal-title" id="defaultModalLabel">Sort Posts</h4>
            </div>

            <?php include_once 'sort_subcategory_lists.php'; ?>
           <!--  <div class="modal-body">
            </div> -->
            <div class="modal-footer">
               <!--  <button type="submit" id="upload-btn" class="btn btn-link waves-effect">Save</button> -->
                <button type="button" class="btn btn-link waves-effect reset-upload" data-dismiss="modal">CLOSE</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
	var listing_url = "<?php echo $listing_url ?>";
	var download_url = "<?php echo $download_url ?>";
	var searching_url = "<?php echo $searching_url ?>";
	
    var type='add';
</script>