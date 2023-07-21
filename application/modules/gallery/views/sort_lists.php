<style type="text/css">
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em 0.4em 0 0.4em; font-size: 1.4em; height: auto; }
  #sortable li div { border: 1px solid #d6b07b;
    /* padding-left: 3px; */
    padding: 10px;
    color: black;
    font-weight: bold;
    background-color: #fbf4eb;
-webkit-box-shadow: 2px 2px 5px -2px rgba(0,0,0,0.25);
-moz-box-shadow: 2px 2px 5px -2px rgba(0,0,0,0.25);
box-shadow: 2px 2px 5px -2px rgba(0,0,0,0.25);
cursor: move;
  }
  .button-save{margin-top: 5px; background-color: lightgray;}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<div class="modal-body" id="sss">
<ul id="sortable">
<?php if (isset($sort_collection) && count($sort_collection)>0) { ?>
	<?php foreach($sort_collection as $sort){ ?>
			<li value ="<?php echo $sort->upload_data_id;?>" class="ui-state-default">
        <div class="ui-icon ui-icon-arrowthick-2-n-s">
          <?php echo $sort->upload_title;?>
        </div>        
      </li>
	<?php } ?>
</ul>
<center><button type="button" onclick="getValues()" class="button-save btn btn-link waves-effect">SAVE</button></center>
<?php } ?>
 </div>

<script type="text/javascript">
	$( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();

window.getValues = function() {
  var val = [];
    $.each($('#sortable').find('li'), function() {
        val.push($(this).val());
        //alert($(this).val());
    });
    console.log(val);

    $.ajax({
      type: "POST",
      url: baseUrl + 'posts/sort',
      data: {'val':val},
      cache: false,
      success: function(data){

          window.location.reload();
        
      }
    });
}
</script>
