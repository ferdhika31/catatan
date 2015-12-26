			<div id="sidebar-left" class="span2">
				
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="<?php echo $this->location('admin');?>"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li><a href="<?php echo $this->location('admin/semester');?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Semester</span></a></li>
						<li><a href="<?php echo $this->location('admin/matkul');?>"><i class="icon-hdd"></i><span class="hidden-tablet"> Mata Kuliah</span></a></li>
						<li><a href="<?php echo $this->location('admin/minggu');?>"><i class="icon-tasks"></i><span class="hidden-tablet"> Minggu Ke</span></a></li>
						<li><a href="<?php echo $this->location('admin/materi');?>"><i class="icon-book"></i><span class="hidden-tablet"> Materi</span></a></li>
						<!--
						<?php
							if($this->session->getValue('hak')==1):
						?>
						<li>
							<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Mata Kuliah</span> <span class="label">2</span></a>
							<ul>
								<li><a class="submenu" href="<?php echo $this->location('admin/matkul');?>"><i class="icon-hdd"></i><span class="hidden-tablet"> Mata Kuliah</span></a></li>
								<li><a class="submenu" href="<?php echo $this->location('admin/semester');?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Semester</span></a></li>
							</ul>	
						</li>
						<li><a href="<?php echo $this->location('admin/user');?>"><i class="icon-user"></i><span class="hidden-tablet"> User</span></a></li>
						<?php
							endif;
						?>
						-->
					</ul>
				</div>
			</div>