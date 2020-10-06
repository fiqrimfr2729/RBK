<script src="<?php echo base_url('assets/siswa/js/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/jquery-migrate-3.0.1.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/popper.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/jquery.easing.1.3.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/jquery.waypoints.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/jquery.stellar.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/owl.carousel.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/jquery.magnific-popup.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/aos.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/jquery.animateNumber.min.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/scrollax.min.js')?>"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?php echo base_url('assets/siswa/js/google-map.js')?>"></script>
  <script src="<?php echo base_url('assets/siswa/js/main.js')?>"></script>
  <script src="<?php echo base_url('assets/admin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/admin/') ?>js/demo/datatables-demo.js"></script>
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script >$(".messages").animate({ scrollTop: $(document).height() }, "fast");

$("#profile-img").click(function() {
	$("#status-options").toggleClass("active");
});


$(".expand-button").click(function() {
  $("#profile").toggleClass("expanded");
	$("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function() {
	$("#profile-img").removeClass();
	$("#status-online").removeClass("active");
	$("#status-away").removeClass("active");
	$("#status-busy").removeClass("active");
	$("#status-offline").removeClass("active");
	$(this).addClass("active");
	
	if($("#status-online").hasClass("active")) {
		$("#profile-img").addClass("online");
	} else if ($("#status-away").hasClass("active")) {
		$("#profile-img").addClass("away");
	} else if ($("#status-busy").hasClass("active")) {
		$("#profile-img").addClass("busy");
	} else if ($("#status-offline").hasClass("active")) {
		$("#profile-img").addClass("offline");
	} else {
		$("#profile-img").removeClass();
	};
	
	$("#status-options").removeClass("active");
});

function newMessage() {
	message = $(".message-input input").val();
	if($.trim(message) == '') {
		return false;
	}
	$('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
	$('.message-input input').val(null);
	$('.contact.active .preview').html('<span>You: </span>' + message);
	$(".messages").animate({ scrollTop: $(document).height() }, "fast");
};

$('.submit').click(function() {
  newMessage();
});

$(window).on('keydown', function(e) {
  if (e.which == 13) {
    newMessage();
    return false;
  }
});

</script>

</body></html>