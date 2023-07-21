<?php if(!empty($collection)){?>
<div class="col-md-8 col-sm-8 col-xs-6 content-area">   
    <div class="section-header">
        <h3><?php echo ucwords($collection[0]->contributors_name); ?></h3>
    </div>
    <article class="type-post format-audio">        
        <a href="javascript://" target="_blank"> <img src="<?php echo $collection[0]->contributors_path; ?>" width="600" height="365"></a> 
        <div class="entry-footer">
          <span class="post-date" ><a style="color : darkorange;font-size: 30px;"><?php echo ucwords($collection[0]->contributors_name); ?></a></span>
        </div>
        <div class="entry-content">            
            <h3><?php echo ucwords($collection[0]->contributors_designation); ?></h3>
            <p><?php echo str_replace('\r\n', '', $collection[0]->contributors_data); ?></p>            
        </div>        
    </article>    
</div>
<?php }?>
