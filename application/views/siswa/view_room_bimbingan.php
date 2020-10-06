<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('siswa/view_bimbingan/head_bimbingan') ?>
  <body>
    
  <?php $this->load->view('siswa/_partials/navbar_siswa') ?>
  
    <!-- END nav -->
    

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
            
          <div class="col-lg-12 ftco-animate">
            
            
            <div id="frame">
	
	<div class="content">
		<div class="contact-profile">
			<img src=" <?php echo base_url ('assets/admin/user.png')?>" alt="" />
			<p><?php echo "nama"; ?></p>
			
		</div>
		<div class="messages">
			<ul>
				
				<li class="sent">
					<img src="<?php echo base_url ('assets/admin/user.png')?>" alt="" />
					<p><?php echo "Here are some characters that are commonly used for times:

H - 24-hour format of an hour (00 to 23)
h - 12-hour format of an hour with leading zeros (01 to 12)
i - Minutes with leading zeros (00 to 59)
s - Seconds with leading zeros (00 to 59)
a - Lowercase Ante meridiem and Post meridiem (am or pm)

The example below outputs the current time in the specified format:" ?></p>
                </li>
                
                <li class="replies">
					<img src="<?php echo base_url ('assets/admin/user.png')?>" alt="" />
					<p><?php echo "Here are some characters that are commonly used for times:

H - 24-hour format of an hour (00 to 23)
h - 12-hour format of an hour with leading zeros (01 to 12)
i - Minutes with leading zeros (00 to 59)
s - Seconds with leading zeros (00 to 59)
a - Lowercase Ante meridiem and Post meridiem (am or pm)

The example below outputs the current time in the specified format:" ?></p>
                </li>
                
                <li class="replies">
					<img src="<?php echo base_url ('assets/admin/user.png')?>" alt="" />
					<p><?php echo "Here are some characters that are commonly used for times:

H - 24-hour format of an hour (00 to 23)
h - 12-hour format of an hour with leading zeros (01 to 12)
i - Minutes with leading zeros (00 to 59)
s - Seconds with leading zeros (00 to 59)
a - Lowercase Ante meridiem and Post meridiem (am or pm)

The example below outputs the current time in the specified format:" ?></p>
                </li>
                
                <li class="sent">
					<img src="<?php echo base_url ('assets/admin/user.png')?>" alt="" />
					<p><?php echo "Here are some characters that are commonly used for times:

H - 24-hour format of an hour (00 to 23)
h - 12-hour format of an hour with leading zeros (01 to 12)
i - Minutes with leading zeros (00 to 59)
s - Seconds with leading zeros (00 to 59)
a - Lowercase Ante meridiem and Post meridiem (am or pm)

The example below outputs the current time in the specified format:" ?></p>
				</li>
				

				
			</ul>
		</div>

		<div class="message-input">
			<div class="wrap">
			<input type="text" placeholder="Write your message..." />
			<i class="fa fa-paperclip attachment" aria-hidden="true"></i>
			<button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
			</div>
		</div>
	</div>
</div>
            
            <p><?php  ?></p>
            
            <div class="tag-widget post-tag-container mb-5 mt-5">
              
            </div>
            

            

          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            
            
        </div>
      </div>
    </section> <!-- .section -->


    
    <?php $this->load->view('siswa/_partials/footer_siswa') ?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <?php $this->load->view('siswa/view_bimbingan/js_bimbingan') ?>

  
    
  </body>
</html>