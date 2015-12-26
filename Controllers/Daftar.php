<?php
namespace Controllers;
use Resources, Models;

class Daftar extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-09 16:51:17
	**/

	function __construct(){
		parent::__construct();

		$this->m_materi = new Models\M_materi;
		$this->m_matkul = new Models\M_matkul;
		$this->konfig = Resources\Config::website();
		$this->request = new Resources\Request;
	}

	public function index($hal=1){
		$smt = (!empty($this->request->get('semester'))) ? $this->antiInjection($this->request->get('semester')) : '';
		$tp = (!empty($this->request->get('tp'))) ? $this->antiInjection($this->request->get('tp')) : '';
		$matkul = (!empty($this->request->get('matkul'))) ? $this->antiInjection($this->request->get('matkul')) : '';

		if(!empty($smt)){
			$data['matkul'] = $this->m_materi->tampilMatkulSmt(array('semester_id'=>$smt));
		}

		$this->pagination = new Resources\Pagination();

		$hal = (int)$hal;
		$limit = $this->konfig['jumlah_list'];

		//filter
		if(empty($smt) && empty($tp)){ // Semua tanpa filter
			$baseurl = $this->location('daftar/index/%#%/');
			$total = count($this->m_materi->semuaDaftarmateri());
			$data['data'] = $this->m_materi->semuaDaftarmateriPer($hal, $limit);
		}else if(!empty($smt) && empty($tp)){ // Filter by only semester
 			// filter +matkul
			if(!empty($matkul)){
				$baseurl = $this->location('daftar/index/%#%/?semester='.$smt.'&matkul='.$matkul);
				$total = count($this->m_materi->semuaDaftarmateriSmtMatkul($smt, $matkul));
				$data['data'] = $this->m_materi->semuaDaftarmateriSmtMatPer(array($smt,$matkul),$hal, $limit);
			}else{
				$baseurl = $this->location('daftar/index/%#%/?semester='.$smt);
				$total = count($this->m_materi->semuaDaftarmateriSmt($smt));
				$data['data'] = $this->m_materi->semuaDaftarmateriSmtPer($smt, $hal, $limit);
			}
		}else if(!empty($tp) && empty($smt)){ // Filter by only teori praktek
			$baseurl = $this->location('daftar/index/%#%/?tp='.$tp);
			$total = count($this->m_materi->semuaDaftarmateriTp($tp));
			$data['data'] = $this->m_materi->semuaDaftarmateriTpPer($tp, $hal, $limit);
		}else{ // filter all (semester & teori praktek)
			// filter +matkul
			if(!empty($matkul)){
				$baseurl = $this->location('daftar/index/%#%/?semester='.$smt.'&tp='.$tp.'&matkul='.$matkul);
				$total = count($this->m_materi->semuaDaftarmateriSmtTpMatkul($smt, $tp, $matkul));
				$data['data'] = $this->m_materi->semuaDaftarmateriSmtTpMatPer(array($smt,$tp,$matkul),$hal, $limit);
			}else{
				$baseurl = $this->location('daftar/index/%#%/?semester='.$smt.'&tp='.$tp);
				$total = count($this->m_materi->semuaDaftarmateriSmtTp($smt,$tp));
				$data['data'] = $this->m_materi->semuaDaftarmateriSmtTpPer($smt,$tp, $hal, $limit);
			}
		}

		$data['smtr'] = $smt;
		$data['tp'] = $tp;
		$data['mtkl'] = $matkul;

		// echo $smt." ".$tp;
		// exit;
		
		
		// Title web
		$data['heading_title'] = $this->konfig['site_title']." - Daftar Materi";

		$data['asset'] = $this->uri->baseUri."assets/";

		$data['semester'] = $this->m_matkul->ambilSemuaSmt();

		$data['hal'] = $hal;
		
		$data['totalData'] = $total;

		$data['pageLinks'] = $this->pagination->setOption(
			array(
		    	'limit' => $limit,
		    	'base' => $baseurl,
		    	'total' => $total,
		    	'current' => $hal,
		    	'nextText' => 'Selanjutnya',
		    	'prevText' => 'Sebelumnya'
			)
	    )->getUrl();

		$this->output('header',$data);
		$this->output('daftar',$data);
		$this->output('footer',$data);
	}

	private function antiInjection($string) {
		$search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
		$replace = array("\\\\","\\0","\\n", "\\r", "", '', "\\Z");

		return str_replace($search, $replace, $string);
	}
}