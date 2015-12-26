	<body class="">
		<div id="root" class="page">
			<header class="Header">
				<div class="container">
					<?php $this->output('menu');?>

					<div class="Banner">
						<div class="Grid__row--flex">

							<?php 
							if(empty($dataMatkul) || empty($jenisMatkul)):
							?>
							<h1 class="Banner__heading">
								Tidak ada mata kuliah
							</h1>
							<?php
							else:
							?>
							<div class="banner_thumb">
								<img src="<?php echo $asset.'img/'.$dataMatkul->cover;?>"/>
							</div>

							<div class="utility-flex">
								<h1 class="Banner__heading">
									<?php echo $dataMatkul->nama_matkul;?> (<?php echo ucwords($jenisMatkul);?>)
								</h1>

								<div class="Banner__message">
									<p>
									Kode Mata Kuliah : <?php echo $dataMatkul->kode_matkul;?> <br>
									Dosen Pengajar : <?php echo $dataMatkul->nama_dosen;?> <br>
									Jumlah SKS : <?php echo $dataMatkul->jumlah_sks;?> <br>
									Semester : <?php echo $dataMatkul->semester;?>
									</p>
								</div>
							</div>
							<?php
							endif;
							?>
						</div>
					</div>
				</div>
				<?php 
					if(!empty($dataMatkul) && !empty($jenisMatkul) && $dataMateri):
				?>
				<footer class="Banner__footer">
					<div class="container">
						<ul>
							<li>
								<strong><?php echo count($dataMateri);?></strong> materi
							</li>
						</ul>
					</div>
				</footer>
				<?php
					endif;
				?>
			</header>

			<!-- Container -->
			<div class="container">
				<?php
					if(!empty($dataMatkul) && !empty($jenisMatkul) && $dataMateri):
				?>
				<h2 class="Heading--Fancy">
					<span class="Heading--Fancy__subtitle">
						Daftar Materi
					</span>
					<span>
						 <?php echo $dataMatkul->nama_matkul;?> <?php echo ucwords($jenisMatkul);?>
					</span>
				</h2>

				<div class="section Grid__row">
				<!-- Series Episode List -->
					<div class="outline Grid__column nine centered">

						<ul class="Lesson-List">
							<?php
							foreach ($dataMateri as $result):
							?>
							<li class="Lesson-List__item">
								<span class="Lesson-List__title">
									<a href="<?php echo $this->location('matkul/detail/'.$dataMatkul->matkul_id.'-'.$jenisMatkul.'/'.$this->library->permalink($result->judul)->set_permalink());?>">
										<?php echo $result->judul;?>
									</a>
								</span>
								<span class="Lesson-List__length">
									<strong>(Minggu ke-<?php echo $result->minggu;?>)</strong> 
									<?php echo $this->library->tgl_indonesia(substr($result->tgl_materi, 0,10))->nama_hari().", ".$this->library->tgl_indonesia(substr($result->tgl_materi, 0,10))->tgl_indo();?>
								</span>
							</li>
							<?php
							endforeach;
							?>
						</ul>

						<!-- <h6 class="utility-center utility-subtext">
							Series still in development. Check back often for updates.
						</h6> -->
					</div>
				</div>
				<?php
					else:
				?>
				<h2 class="Heading--Fancy">
					<span>Belum Ada Materi</span>
				</h2>
				<?php
					endif;
				?>

			</div>
		</div>