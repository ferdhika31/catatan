<?php
	// $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
	<body class="">
		<div id="root" class="page">
			<header class="Header">
				<div class="container">
					<?php $this->output('menu');?>

					<div class="Banner">
						<h1 class="Banner__heading utility-center">
							Daftar Materi
						</h1>
					</div>

				</div>
			</header>

			<div class="container">
				<section id="pjax-container" class="Grid__row">
					<div id="main" class="Filterable">
						<div class="sidebar">
							<form action="" method="get">
							<h3 class="utility-heading-top">Saring</h3>

							<ul class="List--Naked">
							<?php if(!empty($semester)):?>
								<li class="Filterable__item">
									<h4 class="Filterable__heading">Semester</h4>

								<?php 
									foreach ($semester as $smt):
										if(!empty($smtr)){
											if($smt->semester == $smtr){
												$centrang = " checked";
											}else{
												$centrang = "";
											}
										}else{
											$centrang = "";
										}
								?>
									<label class="Filterable__label">
										<input name="semester"<?php echo $centrang;?> value="<?php echo $smt->semester_id;?>" type="radio"/>
										<a href="#"><?php echo $smt->semester;?></a>
									</label><br>
								<?php
									endforeach;
								?>

								</li>
							<?php endif;?>
								<li class="Filterable__item">
									<h4 class="Filterable__heading">T/P</h4>

									<label class="Filterable__label">
										<input name="tp"<?php echo (!empty($tp) && $tp=='teori') ? " checked" : "";?> value="teori" type="radio"/>
										<a href="#">Teori</a>
									</label><br>

									<label class="Filterable__label">
										<input name="tp"<?php echo (!empty($tp) && $tp=='praktek') ? " checked" : "";?> value="praktek" type="radio"/>
										<a href="#">Praktek</a>
									</label><br>
								</li>

								<?php
								if(!empty($matkul)):
								?>
								<li class="Filterable__item">
									<h4 class="Filterable__heading">Mata Kuliah</h4>
								<?php
									foreach ($matkul as $matkul):
										if(!empty($mtkl)){
											if($matkul->matkul_id == $mtkl){
												$cen = " checked";
											}else{
												$cen = "";
											}
										}else{
											$cen = "";
										}
								?>
									<label class="Filterable__label">
										<input name="matkul"<?php echo $cen;?> value="<?php echo $matkul->matkul_id;?>" type="radio"/>
										<a href=""><?php echo $matkul->nama_matkul;?></a>
									</label><br>
								<?php
									endforeach;
								?>						
								</li>
								<?php
								endif;
								?>

								<li class="Filterable__item">
									<input type="submit" class="Button Button--Block" value="Saring" />
								</li>
							</ul>
							</form>
						</div>

						<div class="primary">
							<ul class="Lesson-List ">
							<?php
							if(!empty($data)):
								foreach ($data as $result):
							?>
								<li class="Lesson-List__item">
									<span class="Lesson-List__title utility-flex">
										<a href="<?php echo $this->location('matkul/detail/'.$result->matkul_id.'-'.$result->tipe_materi);?>">
											<strong><?php echo $result->nama_matkul;?> (<?php echo ucwords($result->tipe_materi);?>) :</strong>
										</a>

										<a href="<?php echo $this->location('matkul/detail/'.$result->matkul_id.'-'.$result->tipe_materi.'/'.$this->library->permalink($result->judul)->set_permalink());?>">
											<?php echo $result->judul;?>
										</a>
									</span>

									<span class="Lesson-List__date">
										<strong>Minggu <?php echo $result->minggu;?></strong> | <?php echo $this->library->tgl_indonesia(substr($result->tgl_materi, 0,10))->nama_hari().", ".$this->library->tgl_indonesia(substr($result->tgl_materi, 0,10))->tgl_indo();?>
									</span>
								</li>
							<?php
								endforeach;
							else:
							?>
								<li class="Lesson-List__item">
									<span class="Lesson-List__title utility-flex">
										<center><a href="">
											<strong>Tidak ada materi</strong>
										</a></center>
									</span>

									
								</li>
							<?php
							endif;
							?>
							</ul>
						</div>
					</div>

					<?php if($pageLinks):?>
					    <ul class="pagination">
					        <?php foreach($pageLinks as $paging):?>
					        	<?php
					        	$aktif = (strip_tags($paging)==$hal) ? 'active' : '';
					        	?>
					            <li class="<?php echo $aktif;?>"><?php echo $paging;?></li>
					        <?php endforeach;?>
					    </ul>
					<?php endif;?>

				</section>
			</div>
		</div>