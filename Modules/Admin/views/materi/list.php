<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php $this->output('menu');?>
			<!-- end: Main Menu -->
						
			<!-- start: Content -->
			<div id="content" class="span10">
			
				<div class="row-fluid">	
					<div class="box span12">
						<div class="box-header">
							<h2><i class="icon-align-justify"></i><span class="break"></span><?php echo $heading_title;?></h2>
							<div class="box-icon">
								<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>	
						<div class="box-content">
							<?php echo $notif;?>
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Judul Materi</th>
										<!-- <th>Mata Kuliah</th> -->
										<th>Tipe Materi</th>
										<th>Semester</th>
										<th>Minggu Ke</th>
										<th>Tanggal</th>
										<th>Aksi</th>                                          
									</tr>
								</thead>   
								<tbody>
								<?php
									$temp = array();
									if(!empty($data)):
										$no=1;
										foreach ($data as $data):
											$temp[] = array(
												'judul' => ucwords($data->judul),
												'tipe'	=> ucwords($data->tipe_materi),
												'file'  => $this->uri->baseUri.'assets/viewerjs/index.html?zoom=page-width#'.$this->uri->baseUri.'assets/materi/'.$data->file,
											);
								?>
									<tr>
										<td><?php echo $no++;?></td>
										<td class="center"><?php echo ucwords($data->judul);?></td>
										<!-- <td class="center"><?php echo $data->nama_matkul;?></td> -->
										<td class="center"><?php echo ucwords($data->tipe_materi);?></td>
										<td class="center"><?php echo $data->semester;?></td>
										<td class="center"><?php echo $data->minggu;?></td>
										<td class="center"><?php echo substr($data->tgl_materi, 0,10);?></td>
										<td class="center">
											<a class="btn btn-info" title="Ubah" href="<?php echo $this->location('admin/materi/ubah/'.$data->materi_id);?>">
												<i class="icon-edit "></i>                                            
											</a>
											<a class="btn btn-danger" title="Hapus" href="<?php echo $this->location('admin/materi/hapus/'.$data->materi_id);?>">
												<i class="icon-trash "></i> 
											</a>
											<a class="btn btn-success" title="Lihat Materi" data-toggle="modal" data-target="#modal-fadein<?php echo $no;?>">
												<i class="icon-eye-open "></i> 
											</a>
										</td>                                      
									</tr>
								<?php
										endforeach;
									else:
								?>
									<tr>
										<td colspan="8"><center>Belum ada data.</center></td>                                      
									</tr>
								<?php
									endif;
								?>     
								<thead>
									<tr>
										<th colspan="8">
											<center>
												<a class="btn btn-success" title="Tambah data" href="<?php echo $this->location('admin/materi/tambah');?>">
													<i class="icon-plus"></i> Tambah Data                                           
												</a>
											</center>
										</th>                                          
									</tr>
								</thead>     
								</tbody>
							</table>

							<!--<?php echo count($data); ?> data mata kuliah dari <?php echo $totalData;?> mata kuliah. -->

							<div class="pagination pagination-centered">
							<?php if($pageLinks):?>
							    <ul>
							        <?php foreach($pageLinks as $paging):?>
							        	<?php
							        	$aktif = (strip_tags($paging)==$hal) ? 'active' : '';
							        	?>
							            <li class="<?php echo $aktif;?>"><?php echo $paging;?></li>
							        <?php endforeach;?>
							    </ul>
							<?php endif;?>
							</div>    
						</div>
					</div><!--/span-->
				</div><!--/row-->
					
			</div>
			<!-- end: Content -->
				
		</div><!--/fluid-row-->
				
		
		<div class="clearfix"></div>

		<?php
		if(!empty($temp)):
			$num = 2;
			foreach ($temp as $temp):
		?>
			<div class="modal hide fade" id="modal-fadein<?php echo $num;?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3><?php echo $temp['judul'];?> (<?php echo $temp['tipe'];?>)</h3>
				</div>
				<div class="modal-body">
					<iframe src="<?php echo $temp['file'];?>" width="100%" height="300px" allowfullscreen webkitallowfullscreen></iframe>
				</div>
				<div class="modal-footer">
					<a href="#" class="btn" data-dismiss="modal">Tutup</a>
				</div>
			</div>
		<?php
			$num++;
			endforeach;
		endif;
		?>