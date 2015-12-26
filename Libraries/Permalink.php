<?php 
namespace Libraries;

class Permalink {

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-09 13:13:19
	**/

	private $kalimat;
	private $id;
    
    public function __construct($kalimat){
    	// $this->id = $id;
        $this->kalimat = $kalimat;
    }

	public function set_permalink() {
		$karakter = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
		$hapus_karakter_aneh = strtolower(str_replace($karakter,"",$this->kalimat));
		$tambah_strip = strtolower(str_replace(' ', '-', $hapus_karakter_aneh));
		$link_akhir = $this->id.'-'.$tambah_strip;
		// return $link_akhir;
		return $tambah_strip;
	}

}