<?php
namespace Models;
use Resources;

class M_matkul{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-01 08:05:03
	**/

	function __construct(){
		$this->db = new Resources\Database;
		$this->tb_matkul = 'matkul';
		$this->tb_materi = 'materi';
		$this->tb_smt = 'semester';
	}

	public function ambilMatkulLim($lim=0){
		// $query = $this->db->select()
		// 	->from($this->tb_materi)
		// 	->join('matkul')->on('matkul.matkul_id', '=', 'materi.matkul_id')
		// 	->groupBy('materi.matkul_id, materi.tipe_materi')->limit($lim)->getAll(); 

		$query = $this->db->results("SELECT * FROM semester, ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			group by materi.matkul_id, materi.tipe_materi limit ".$lim);

		return $query;
	}

	public function detailMatkul($id){
		$query = $this->db->select()
		->from($this->tb_matkul)
		->join('semester')->on('semester.semester_id', '=', 'matkul.semester_id')
		->where('matkul_id', '=', $id)->getOne();
    	return $query;
	}

	public function ambilSemuaMatkul(){
		// $query = $this->db->select()->from($this->tb_matkul)->getAll(); //select * from matkul
		$query = $this->db->results("SELECT * FROM semester, ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			group by materi.matkul_id, materi.tipe_materi");

		return $query;
	}

	public function ambilSemuaMatkulPer($page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;

		$query = $this->db->results("SELECT * FROM semester, ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
			INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
			group by materi.matkul_id, materi.tipe_materi order by semester.semester ASC limit $offset, $limit");

		return $query;
	}

	//Query semester
	public function ambilSemuaSmt(){
		$query = $this->db->select()
			->from($this->tb_smt)
			->getAll();

		return $query;
	}

	public function semester($id=0){
		$query = $this->db->select()
			->from($this->tb_smt)
			->where('semester_id', '=', $id)->getOne();

		return $query;
	}

}