<?php
namespace Controllers;
use Resources, Models;

class Home extends Resources\Controller{    

	function __construct(){
		parent::__construct();

		$this->m_materi = new Models\M_materi;
		$this->m_matkul = new Models\M_matkul;
		$this->konfig = Resources\Config::website();
	}

	public function index(){
		$data['heading_title'] = $this->konfig['site_title'];
		$data['asset'] = $this->uri->baseUri."assets/";

		// Materi
		$materi = $this->m_matkul->ambilMatkulLim(4);

		$dataMateri = array();

		foreach ($materi as $result) {
			$jum = $this->m_materi->ambilSemuaMateri($result->matkul_id,$result->tipe_materi);
			$cek_semester = $this->m_matkul->semester($result->semester_id);
			
			$dataMateri[] = array(
				'id_matkul'		=> $result->matkul_id,
				'nama_matkul'	=> $result->nama_matkul,
				'tipe_materi'	=> $result->tipe_materi,
				'cover'			=> $result->cover,
				'semester'		=> $cek_semester->semester,
				'jumlah'		=> count($jum)
			);
		}

		$data['materi'] = $dataMateri;
		
		$this->output('header',$data);
		$this->output('home',$data);
		$this->output('footer',$data);
	}
}