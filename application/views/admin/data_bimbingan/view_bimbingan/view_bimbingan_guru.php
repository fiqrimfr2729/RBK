<?php $this->load->view('admin/data_bimbingan/view_bimbingan/head_bimbingan') ?>
<!-- 

A concept for a chat interface. 

Try writing a new message! :)


Follow me here:
Twitter: https://twitter.com/thatguyemil
Codepen: https://codepen.io/emilcarlsson/
Website: http://emilcarlsson.se/

-->

<div id="frame">
	
	<div class="content">
		<div class="contact-profile">
			<img src=" <?php echo base_url ('assets/admin/user.png')?>" alt="" />
			<p><?php echo $data_bimbingan->nama_siswa; ?></p>
			
		</div>
		<div class="messages">
			<ul>
				<?php foreach($isi_bimbingan as $data): ?>
				<li class="<?php if($data['idFrom'] == $data_bimbingan->nis){echo "sent";}else{
					echo "replies";
				} ?>">
					<img src="<?php echo base_url ('assets/admin/user.png')?>" alt="" />
					<p><?php echo $data['content'] ?></p>
				</li>
				<?php endforeach; ?>

				
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

<?php $this->load->view('admin/data_bimbingan/view_bimbingan/js_bimbingan') ?>

</body></html>