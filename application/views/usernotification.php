<?php if($this->session->flashdata("update_app_vision")): ?>
    <div style="text-align:right;color:green;font-weight:bold;">
        <?php echo $this->session->flashdata("update_app_vision") ?>
    </div>
<?php endif; ?>
<?php if($this->session->flashdata("update_app_vision_failed")): ?>
    <div style="text-align:right;color:red;font-weight:bold;">
        <?php echo $this->session->flashdata("update_app_vision_failed") ?>
    </div>
<?php endif; ?>

<div class="" style="display: flex;justify-content: space-between;">
    <div>
        <a class="btn btn-dark get_usermails" href="<?php echo base_url("Notifyuser/get_useremails"); ?>">Download all emails</a>

        <a class="btn btn-dark get_usermails" href="<?php echo base_url("Notifyuser/getstudentemails"); ?>">Download Student emails</a>

        <a class="btn btn-dark get_usermails" href="<?php echo base_url("Notifyuser/getgeneralemails"); ?>">Download General emails</a>
    </div>
    
    <div>
        <button class="btnbtn-dark importmails" type="button">Import E-mails</button>
    </div>
</div>

<div class="import_div" style="display:none;margin-top:10px">
    <form method="post" enctype="multipart/form-data" class="importcsv_form">
        <input type="file" accept="application/csv" class="form-control importcsv_input" id="importcsv_input" name="importcsv_input">
        <div style="text-align:right;margin-top:10px">
            <button class="importcsv_btn" id="importcsv_btn" type="submit">Import</button>
        </div>
    </form>
    
</div>

<div class="impoerted_emails_div" style="display:none;margin-top:20px;padding-top:20px;border-top:1px solid black">
    <!--<div class="form-group">-->
    <!--    <label style="text-align:center;">Email Subject</label>-->
    <!--    <input type="text" class="emailsubject form-control" name="emailsubject">-->
    <!--</div>-->
    
    <!--<div class="form-group">-->
    <!--    <label style="text-align:center;">Email Message</label>-->
    <!--    <textarea class="emailmsg form-control" name="emailmsg" rows="4"></textarea>-->
    <!--</div>-->
    
    <!--<div class="form-group">-->
    <!--    <label style="text-align:center;">Email Attachment</label>-->
    <!--    <input type="file" class="emailattac" name="emailattac">-->
    <!--</div>-->
    
    <div class="form-group">
        <a class="btn btn-block sendmailbtn"type="button">Send</a>
    </div>
    
    <label style="text-align:center;">Imported E-mails</label>
    <div class="impoerted_emails" style="margin-top:20px">
    </div>
</div>
<div class="notsentemails_div" style="display:none;margin-top:10px">
    <label style="text-align:center;">Not sent E-mails</label>
    <div class="notsentemails">
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on("click","button.importmails",function() {
            $("div.import_div").fadeIn();
        });
            
        $(".importcsv_form").on("submit",function(e) {
            e.preventDefault();
            $('.impoerted_emails').html('');
            var csvdata= $(".importcsv_input").val();
            
            if(csvdata == "" || csvdata == null){
                $(".importcsv_input").css("border","2px solid red");
                return false;
            }else{
                $(".importcsv_input").css("border","2px solid green");
            }
            $('.importcsv_btn').attr('disabled', 'disabled');
			$('.importcsv_btn').html('Importing...');
				
            $.ajax({
                url: "<?php echo base_url("Notifyuser/import_emails"); ?>",
				method: "post",
				data: new FormData(this),
				dataType: "json",
				contentType: false,
				cache: false,
				processData: false,
				success: function(data) {
				   for (i = 0; i < data.length; i++) {
						$('.impoerted_emails').append('<p disabled class="email_data">' + data[i].Email + '</p>');
					}
					$(".impoerted_emails_div").show();
					$('.importcsv_btn').html('Imported');
				    
				},
				error: function(data) {
				    console.log("error importing...");
				}
            });
        });
        
        $('.sendmailbtn').click(function(e) {
			e.preventDefault();
			
			var emailsubject= $(".emailsubject").val();
			var emailmsg= $(".emailmsg").val();
			var emailattac= $(".emailattac").val();
			
// 			if(emailsubject == "" || emailmsg == ""){
// 			    $(".emailsubject,.emailmsg").css('border','1px solid red');
// 			}else{
    			var emails = [];
    			$(".email_data").each(function() {
    			    var eachopt= $(this).text();
    				emails.push(eachopt);
    			});
    			
			
    			$.ajax({
        			url: "<?php echo base_url('Notifyuser/sendmail'); ?>",
        			method: "post",
        			data: {
        				emails: emails,
        				emailsubject: emailsubject,
        				emailmsg: emailmsg,
        				emailattac: emailattac,
        			},
        			dataType: "json",
        			beforeSend: function() {
        				$('.sendmailbtn').html('Sending...').addClass("text-danger disabled");
        			}
        		}).done(function(){
        		    window.location.reload();
        		})
// 			}
        });
        
    });
</script>