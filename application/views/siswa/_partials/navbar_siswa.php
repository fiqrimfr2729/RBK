<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-dark " id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Bimbingan <i>Konseling</i></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="<?php echo base_url('Siswa/dashboard'); ?>" class="nav-link">Home</a></li>
	          <li class="nav-item <?php if($menu=='absensi'){echo 'active';}?>"><a href="<?php echo base_url('Siswa/absensi'); ?>" class="nav-link">Absensi</a></li>
	          <li class="nav-item <?php if($menu=='bimbingan'){echo 'active';}?>"><a href="<?php echo base_url('Siswa/bimbingan'); ?>" class="nav-link">Bimbingan</a></li>
	          <li class="nav-item"><a href="<?php echo base_url('Siswa/dashboard/logout'); ?>" class="nav-link">Logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>