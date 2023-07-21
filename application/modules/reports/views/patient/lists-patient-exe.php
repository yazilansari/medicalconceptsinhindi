<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>
					<?= $pg_title ?>
				</h2>
				<ul class="header-dropdown m-r--5">
					
				</ul>
			</div>
			<div class="body table-responsive">
				<?php echo form_open("$controller/remove",array('id'=>'frm_delete', 'name'=>'frm_delete')); ?>
					
					<div>
						<?php include_once $resultFile; ?>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<!-- #END# Basic Table -->

<div class="modal fade in" id="filterbox" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        	<div class="modal-body">            	
				<div class="form-group form-float">
					<div class="form-line focused">
						<input type="text" name="keywords" placeholder="Search" class="form-control textfield" maxlength="100" autocomplete="off" />
					</div>
				</div>
				<div class="form-group form-float edit-form-control">
					<div class="form-line focused">
						<input type="text" id="from_date" name="from_date" placeholder="From Date" class="form-control" autocomplete="off" style="width:50% !important;"/>
					</div>
				</div>
				<div class="form-group form-float edit-form-control">
					<div class="form-line focused">
						<input type="text" id="to_date" name="to_date" placeholder="To Date" class="form-control" autocomplete="off" style="width:50% !important;"/>
					</div>
				</div>
				<?php foreach($select_option as $so) {?>
				<div class="form-group form-float edit-form-control">
					<div class="form-line focused">
						<select name="<?php echo $so['id'];?>" class="form-control" data-placeholder="Select <?php echo ucfirst(str_replace('_', ' ', $so['type']));?>" id="<?php echo $so['id'];?>">
                            <option></option>
                        </select>
					</div>
				</div>
				<?php }?>
							
            </div>
            <div class="modal-footer">
            	<a class="btn btn-primary waves-effect search_for_date" href="javascript://" data-type="ajax-loader" style="float: right;margin-left: 5px;"><i class="material-icons">search</i> <span>Filter</span></a>

            	<a class="btn btn-primary waves-effect clear_all" href="javascript://" data-type="ajax-loader" style="float: right;margin-left: 5px;"><i class="material-icons">clear_all</i> <span>Clear</span></a>               

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