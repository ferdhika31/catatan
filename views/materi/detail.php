	<body class="">
		<div id="root" class="page">
			<header class="Header">
				<div class="container">
					<?php $this->output('menu');?>

					<div class="Banner"></div>

				</div>
			</header>

			<!-- Isi Materi -->
			<div class="container">

				<section>
					<div class="Video">
						<div class="video">
							<h1 class="Video__title">
								<?php echo $dataMateri->judul;?>
								<span class="Video__series-title">
									<span class="utility-muted">pada</span>
									<a href="<?php echo $this->location('matkul/detail/'.$dataMateri->matkul_id.'-'.$jenisMatkul);?>">
										<?php echo $dataMateri->nama_matkul;?>
									</a>
								</span>
							</h1>

							<span class="Video__difficulty Label">
								<?php echo $jenisMatkul;?>
							</span>

							<div class="Video__box">
								<div class="Video__prerequisite">
									<span class="Label">Minggu ke - <?php echo $dataMateri->minggu;?></span>
								</div>

								<iframe src="<?php echo $asset;?>viewerjs/index.html?zoom=page-width#<?php echo $this->uri->baseUri.'assets/materi/'.$dataMateri->file;?>" width="100%" height="650px" allowfullscreen webkitallowfullscreen></iframe>      

								<div class="Video__details">
									<p class="Video__meta">
										<strong>
										Diterbitkan pada hari <?php echo $this->library->tgl_indonesia(substr($dataMateri->tgl_posting, 0,10))->nama_hari().", ".$this->library->tgl_indonesia(substr($dataMateri->tgl_posting, 0,10))->tgl_indo();?>
										 Oleh <?php echo $dataMateri->nama;?>
										</strong>
									</p>

									<!-- <div class="Video__experience">
										<img src="<?php echo $asset;?>img/bintang.png" alt="Experience Points Offered">
										<strong>100 XP</strong>
									</div> -->

									<!-- <div class="Video__body">
										<p><?php echo strip_tags($dataMateri->deskripsi);?></p>
									</div> -->
								</div>


								<div class="Video__buttons Box">
									<ul class="utility-naked-list utility-list-row">
										<li>
											<a href="<?php echo $this->location('materi/download/'.base64_encode($dataMateri->file));?>" title="Download Pdf <?php echo $dataMateri->nama_matkul;?>" class="Button Button--with-icon disabled">
												<i class="material-icons">cloud_download</i> Unduh
											</a>
										</li>

										<li class="utility-flex-right" id="lesson-complete-toggle">
											<div class="Lesson-Status">
												<span class="Lesson-Status__message"></span>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section>
					<h2 class="Heading--Fancy">
						<span class="Heading--Fancy__subtitle">
							Daftar Materi
						</span>

						<span>
							<a href="<?php echo $this->location('matkul/detail/'.$dataMateri->matkul_id.'-'.$jenisMatkul);?>">
								<?php echo $dataMateri->nama_matkul;?> <?php echo ucwords($jenisMatkul);?>
							</a>
						</span>
					</h2>

					<div class="Grid__row series-outline">
						<div class="secondary">
							<img src="<?php echo $asset.'img/'.$dataMateri->cover;?>" class="utility-space-below">
						</div>

						<div class="primary end">
							<ul class="Lesson-List">
							<?php
								foreach ($dataSemuaMateri as $result):
								$aktif = ($dataMateri->judul==$result->judul) ? " Lesson-List__item--is-current" : "";
							?>
								<li class="Lesson-List__item<?php echo $aktif;?>">
									<!-- The Title of the Lesson -->
									<span class="Lesson-List__title">
										<a href="<?php echo $this->location('matkul/detail/'.$result->matkul_id.'-'.$jenisMatkul.'/'.$this->library->permalink($result->judul)->set_permalink());?>">
											<?php echo $result->judul;?>
										</a>
									</span>
									<!-- The date of the Lesson -->
									<span class="Lesson-List__length">
										<strong>(Minggu ke-<?php echo $result->minggu;?>)</strong>
										<?php echo $this->library->tgl_indonesia(substr($result->tgl_materi, 0,10))->nama_hari().", ".$this->library->tgl_indonesia(substr($result->tgl_materi, 0,10))->tgl_indo();?>
									</span>
								</li> 
							<?php
							endforeach;
							?>
							</ul>
						</div>
					</div>
				</section>
				<!-- end of isi materi -->
			</div>
		</div>