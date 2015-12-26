<?php
namespace Models;
use Resources;

class M_materi{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-09 11:59:13
	**/

	function __construct(){
		$this->db = new Resources\Database;
		$this->tb_materi = 'materi';
		$this->tb_matkul = 'matkul';
	}

	public function ambilSemuaMateri($id,$tipe){
		$query = $this->db->select()
			->from($this->tb_materi)
			->join('minggu')->on('minggu.minggu_id', '=', 'materi.minggu_id')
			->where('materi.matkul_id', '=', $id, 'and')
			->where('materi.tipe_materi', '=', $tipe)
			->orderBy('minggu.minggu', 'ASC')->getAll();
		return $query;
	}

	public function ambilSatu($where=array()){
        $query = $this->db->getOne($this->tb_materi,$where); 
        return $query;
    }

	public function ambilSatuMateri($matkul_id,$tipe,$judul){
		// $query = $this->db->select()
		// 	->from($this->tb_materi)
		// 	->join('matkul')->on('matkul.matkul_id', '=', 'materi.matkul_id')
		// 	->where('materi.matkul_id', '=', $matkul_id, 'and')
		// 	->where('tipe_materi', '=', $tipe, 'and')
		// 	->where('judul', '=', $judul)
		// 	->getOne();
		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			WHERE materi.matkul_id=".$matkul_id." and tipe_materi='".$tipe."' and judul='".$judul."'
		");

    	if(!empty($query)){
    		return $query[0];
    	}
	}

	// no filter
	public function semuaDaftarmateri(){
		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id");

		return $query;
	}

	public function semuaDaftarmateriPer($page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;

		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id limit $offset, $limit");

		return $query;
	}

	// filter by smt
	public function semuaDaftarmateriSmt($semester){
		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id
			where matkul.semester_id=$semester
		");

		return $query;
	}

	public function semuaDaftarmateriSmtPer($semester,$page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;

		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			where matkul.semester_id=$semester limit $offset, $limit");

		return $query;
	}

	// filter by tp
	public function semuaDaftarmateriTp($tp){
		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id
			where materi.tipe_materi='$tp'
		");

		return $query;
	}

	public function semuaDaftarmateriTpPer($tp,$page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;

		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			where materi.tipe_materi='$tp' limit $offset, $limit");

		return $query;
	}

	// filter by tp & smt
	public function semuaDaftarmateriSmtTp($smt,$tp){
		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id
			where materi.tipe_materi='$tp' and matkul.semester_id=$smt
		");

		return $query;
	}

	public function semuaDaftarmateriSmtTpPer($smt,$tp,$page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;

		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			where materi.tipe_materi='$tp' and matkul.semester_id=$smt limit $offset, $limit");

		return $query;
	}

	// filter by smt & matkul
	public function semuaDaftarmateriSmtMatkul($semester,$matkul_id){
		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id
			where matkul.semester_id=$semester and matkul.matkul_id=$matkul_id
		");

		return $query;
	}

	public function semuaDaftarmateriSmtMatPer($where=array(),$page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;

		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			where matkul.semester_id=$where[0] and matkul.matkul_id=$where[1] LIMIT $offset,$limit");

		return $query;
	}

	// filter by smt, tp & matkul
	public function semuaDaftarmateriSmtTpMatkul($semester,$tp,$matkul_id){
		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id
			where matkul.semester_id=$semester and materi.tipe_materi='$tp' and matkul.matkul_id=$matkul_id
		");

		return $query;
	}

	public function semuaDaftarmateriSmtTpMatPer($where=array(),$page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;

		$query = $this->db->results("SELECT * FROM ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			where matkul.semester_id=$where[0] and materi.tipe_materi='$where[1]' and matkul.matkul_id=$where[2] LIMIT $offset,$limit");

		return $query;
	}

	// Update count
	public function countDownload($id_materi){
		// $query = $this->db->update($this->tb_materi,array('count_download' => 1),array('materi_id'=> $id_materi));
		$query = $this->db->results("UPDATE $this->tb_materi SET count_download=count_download+1 WHERE materi_id = $id_materi");

        return $query;
	}

	public function countView($id_materi){
		$query = $this->db->results("UPDATE $this->tb_materi SET count=count+1 WHERE materi_id = $id_materi");

        return $query;
	}

	public function tampilMatkulSmt($where=array()){
		$query = $this->db->getAll($this->tb_matkul,$where); 
        return $query;
	}

}