    <body class="home">
        <div id="root" class="page">
            <header class="Header">
                <div class="container">
                    <?php $this->output('menu');?>

                    <div class="Banner">
                        <!-- It's Kinda Like Note for College Student -->
                        <h1>Ini seperti catatan kecil untuk mahasiswa.</h1>
                        <h3>Kumpulan materi materi perkuliahan <br><strong>Informatika D4 Teknik Informatika Politeknik Negeri Bandung</strong>.
                        <!-- <br>Dokumen pdf dari minggu pertama. --></h3>

                        <a href="<?php echo $this->location('daftar');?>" class="Button Button--Callout">
                            Mulai mencari
                        </a>
                    </div>
                </div>
            </header>

            <!-- Mau belajar apa hari ini? -->
            <div class="container section">

                <?php
                if(!empty($materi)):
                ?>
                <h2 class="Heading--Fancy">
                    <span>
                        <a href="<?php echo $this->location('matkul');?>">Mau belajar apa hari ini?</a>
                    </span>
                </h2>
                <div class="Card-Collection">
                <?php
                    foreach ($materi as $result):
                ?>
                    <div class="Card">
                        <span class="Card__difficulty">Semester <?php echo $result['semester'];?></span>
                        <span class="Card__updated-status Label Label--x-small"><?php echo ucwords($result['tipe_materi']);?></span>

                        <div class="Card__image">
                            <a href="<?php echo $this->location('matkul/detail/'.$result['id_matkul'].'-'.$result['tipe_materi']);?>">
                                <img src="<?php echo $asset.'img/'.$result['cover'];?>" class="Card__image">
                                <div class="Card__overlay">
                                    
                                </div>
                            </a>
                        </div>

                        <div class="Card__details">
                            <h3 class="Card__title">
                                <a href="<?php echo $this->location('matkul/detail/'.$result['id_matkul'].'-'.$result['tipe_materi']);?>">
                                    <?php echo $result['nama_matkul'];?>
                                </a>
                            </h3>

                            <div class="Card__count">
                                <?php echo $result['jumlah'];?> <span class="utility-muted">materi</span>
                            </div>
                        </div>
                    </div>
                <?php
                    endforeach;
                    if(count($materi)>=4):
                ?>
                    <center>
                        <a href="<?php echo $this->location('matkul');?>" class="Button Button--Callout">
                            Lihat semua mata kuliah
                        </a>
                    </center>
                <?php
                    endif;
                ?>
                </div>
                <?php
                    else:
                ?>
                <div class="BlockMessage BlockMessage--With-Spacing">
                    Tidak ada materi.
                </div>
                <?php
                endif;
                ?>

            </div>
            <!-- end of mau belajar apa -->
        </div>
        