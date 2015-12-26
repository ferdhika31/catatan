<?php
namespace Controllers;
use Resources, Models;

class Materi extends Resources\Controller{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-13 16:32:10
	**/

	function __construct(){
		parent::__construct();

	}

	public function download($filename=null){
		if(empty($filename)){
			$this->redirect();
		}

		$local_file = './assets/materi/'.base64_decode($filename);
		$download_file = base64_decode($filename);

		// set the download rate limit (=> 20,5 kb/s)
		$download_rate = 20.5;
		if(file_exists($local_file) || is_file($local_file)){
			// ambil satu data berdasarkan nama file
			$data = $this->model->m_materi()->ambilSatu(array('file'=>$download_file));
			// counting tiap download
			$this->model->m_materi()->countDownload($data->materi_id);

			header('Cache-control: private');
			header('Content-Type: application/octet-stream');
			header('Content-Length: '.filesize($local_file));
			header('Content-Disposition: filename='.$download_file);

			flush();
			$file = fopen($local_file, "r");
			while(!feof($file)){
				// send the current file part to the browser
				print fread($file, round($download_rate * 1024));
				// flush the content to the browser
				flush();
				// sleep one second
				sleep(1);
			}
			fclose($file);
		}else{
			die('Error: The file '.$local_file.' does not exist!');
		}
		// $this->redirect($this->uri->baseUri.'assets/materi/'.base64_decode($filename));
	}
}