<?php
namespace Modules\Admin\Controllers;
use Resources, Models, Libraries;

class Matkul extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-06 00:04:54
	**/

	function __construct(){
		parent::__construct();
		// Load library
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;

		// Load model
		$this->m_admin = new Models\M_admin;

		// Load konfigurasi website
		$this->konfig = Resources\Config::website();
		
		if(!$this->session->getValue('isAdmin')){
    		$this->redirect('admin/login');	
    	}
    	if($this->session->getValue('hak')!=1){
    		$this->redirect('admin');	
    	}
	}

	public function index($hal=1){
		$this->pagination = new Resources\Pagination();

		$hal = (int)$hal;
		$limit = $this->konfig['jumlah_list'];
		$total = count($this->m_admin->semuaMatkul());

		$data['asset'] = $this->uri->baseUri."assets/admin/";
		
		// Notification
		$data['notif'] = $this->session->getValue('notif');
		$this->session->setValue(array('notif'=>''));

		$data['heading_title'] = 'Data Mata Kuliah';
		$data['hal'] = $hal;
		$data['data'] = $this->m_admin->ambilMatkulPer($hal, $limit);
		$data['totalData'] = $total;

		$data['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $this->location('admin/matkul/index/%#%/'),
		    	'total' => $total,
		    	'current' => $hal,
		    	'nextText' => 'Selanjutnya',
		    	'prevText' => 'Sebelumnya'
			)
	    )->getUrl();

		$this->output('header',$data);
		$this->output('matkul/list',$data);
		$this->output('footer',$data);
	}

	public function tambah(){
		$data['heading_title'] = 'Tambah mata kuliah';
		$data['notif']	= '';

		//proses
		if($this->request->post('oke')){
			$kode = $this->request->post('kode_matkul');
			$nama = $this->request->post('nama_matkul');
			$dosen = $this->request->post('dosen');
			$sks = $this->request->post('jml_sks');
			$semester = $this->request->post('semester');

			if(!empty($nama) || !empty($dosen) || !empty($sks)){
				$dataMatkul = array(
					'kode_matkul' 	=> $kode,
					'nama_matkul' 	=> $nama,
					'nama_dosen' 	=> $dosen,
					'jumlah_sks'	=> $sks,
					'semester_id'		=> $semester
				);
				$matkul = $this->m_admin->tambahMatkul($dataMatkul);
				if($matkul){
					$this->redirect('admin/matkul');
				}else{
					$data['notif'] = '
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Upps!</strong> Terjadi kesalahan.
						</div>
					';
				}
			}else{
				$data['notif'] = '
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Upps!</strong> Form tidak boleh kosong.
					</div>
				';
			}
		}

		$this->form($data);
	}

	public function ubah($id){
		$data['matkul'] = $this->m_admin->ambilSatuMatkul($id);

		if(empty($data['matkul'])){
			$this->redirect('admin/matkul');
		}
	
		$data['heading_title'] = 'Ubah mata kuliah "'.$data['matkul']->nama_matkul.'"';
		$data['notif']	= '';

		//proses
		if($this->request->post('oke')){
			$kode = $this->request->post('kode_matkul');
			$nama = $this->request->post('nama_matkul');
			$dosen = $this->request->post('dosen');
			$sks = $this->request->post('jml_sks');
			$semester = $this->request->post('semester');

			if(!empty($nama) || !empty($dosen) || !empty($sks)){
				$dataMatkul = array(
					'kode_matkul' 	=> $kode,
					'nama_matkul' 	=> $nama,
					'nama_dosen' 	=> $dosen,
					'jumlah_sks'	=> $sks,
					'semester_id'		=> $semester
				);
				$matkul = $this->m_admin->ubahMatkul($id,$dataMatkul);
				if($matkul){
					$notif['notif'] = '
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Horray!</strong> Berhasil mengubah mata kuliah.
						</div>
					';
					$this->session->setValue($notif);

					$this->redirect('admin/matkul');
				}else{
					$data['notif'] = '
						<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<strong>Upps!</strong> Terjadi kesalahan.
						</div>
					';
				}
			}else{
				$data['notif'] = '
					<div class="alert alert-warning">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<strong>Upps!</strong> Form tidak boleh kosong.
					</div>
				';
			}
		}

		$this->form($data);
	}

	private function form($data=array()){
		$data['asset'] = $this->uri->baseUri."assets/admin/";

		$data['semester'] = $this->m_admin->semuaSemester();

		$this->output('header',$data);
		$this->output('matkul/form',$data);
		$this->output('footer',$data);
	}

}