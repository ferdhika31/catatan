<?php
namespace Modules\Admin\Controllers;
use Resources, Models, Libraries;

class Home extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-05 20:55:41
	**/

	function __construct(){
		parent::__construct();
		// Load library
		$this->session = new Resources\Session();
		$this->request = new Resources\Request;

		// Load Models
		$this->admin = new Models\M_admin;

		// Load konfigurasi
		$this->konfig = Resources\Config::website();
		
		// cek login admin session
		if(!$this->session->getValue('isAdmin')){
    		$this->redirect('admin/login');	
    	}
	}

	public function index(){
		$data['asset'] = $this->uri->baseUri."assets/admin/";
		
		$this->output('header',$data);
		$this->output('dashboard',$data);
		$this->output('footer',$data);
	}

	public function keluar(){
		$this->session->destroy();
		$this->redirect('admin');
	}

}