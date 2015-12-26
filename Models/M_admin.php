<?php
namespace Models;
use Resources;

class M_admin{

	/**
		* @Author				: Localhost {Ferdhika Yudira}
		* @Email				: fer@dika.web.id
		* @Web					: http://dika.web.id
		* @Date					: 2015-12-05 21:43:50
	**/

	function __construct(){
		$this->db = new Resources\Database;
		$this->tb_akun = 'user';
		$this->tb_matkul = 'matkul';
        $this->tb_smt = 'semester';
        $this->tb_mg = 'minggu';
        $this->tb_materi = 'materi';
	}

	public function login($user,$pass){
		$query = $this->db->select()->from($this->tb_akun)->where('username', '=', $user, 'AND')->where('password', '=', $pass)->getOne();
    	return $query;
	}

    // Materi
    public function semuaMateri(){
        $query = $this->db->select()->from($this->tb_materi)->getAll(); 
        return $query;
    }

    public function ambilMateriPer($page = 1, $limit = 10){
        $offset = ($limit * $page) - $limit;
        $query = $this->db->results("SELECT * FROM semester, ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
            INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
            group by materi.materi_id ORDER BY materi.materi_id DESC LIMIT $offset, $limit");

        // $query = $this->db->results("SELECT * FROM ".$this->tb_materi." ORDER BY materi_id DESC LIMIT $offset, $limit");
        return $query;
    }

    public function semuaMateriMatkul($id){
        $query = $this->db->select()->from($this->tb_materi)->where('matkul_id','=',$id)->getAll(); 
        return $query;
    }

    public function ambilMateriMatkulPer($id, $page = 1, $limit = 10){
        $offset = ($limit * $page) - $limit;
        $query = $this->db->results("SELECT * FROM semester, ((materi INNER JOIN matkul ON materi.matkul_id = matkul.matkul_id) 
            INNER JOIN minggu ON materi.minggu_id = minggu.minggu_id) INNER JOIN `user` ON materi.user_id = user.user_id 
            where materi.matkul_id=$id group by materi.materi_id ORDER BY materi.tipe_materi DESC LIMIT $offset, $limit");

        // $query = $this->db->results("SELECT * FROM ".$this->tb_materi." ORDER BY materi_id DESC LIMIT $offset, $limit");
        return $query;
    }

    public function ambilSatuMateri($id){
        $query = $this->db->select()->from($this->tb_materi)->where('materi_id', '=', $id)->getOne();
        return $query;
    }

    public function tambahMateri($data=array()){
        $query = $this->db->insert($this->tb_materi, $data); 
        return $query;
    }

    public function ubahMateri($idna,$data=array()){
        $query = $this->db->update($this->tb_materi,$data,array('materi_id'=> $idna));
        return $query;
    }

    public function hapusMateri($id){
        $query = $this->db->delete($this->tb_materi, array('materi_id' => $id)); 
        return $query;
    }

	// User akun active record
	public function semuaUser(){
		$query = $this->db->select()->from($this->tb_akun)->getAll(); 
    	return $query;
	}

	public function ambilUserPer($page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;
		$query = $this->db->results("SELECT * FROM ".$this->tb_akun." ORDER BY user_id ASC LIMIT $offset, $limit");
		//$data = $this->db->select()->from($this->tb_akun)->where('id', '>', 1)->orderBy('id', 'ASC')->limit(6,2)->getAll(); 
        return $query;
    }

    public function ambilSatuUser($id){
    	$query = $this->db->select()->from($this->tb_akun)->where('user_id', '=', $id)->getOne();
    	return $query;
    }

    public function tambahUser($data=array()){
        $query = $this->db->insert($this->tb_akun, $data); 
        return $query;
    }

    public function ubahUser($idna,$data=array()){
    	$query = $this->db->update($this->tb_akun,$data,array('user_id'=> $idna));
    	return $query;
    }

	public function hapusUser($id){
		$query = $this->db->delete($this->tb_akun, array('user_id' => $id)); 
		return $query;
	}

    public function cekAkun($where=array()){
    	$query = $this->db->getOne($this->tb_akun,$where);
    	return $query;
    }

	// Mata kuliah active record
	public function semuaMatkul(){
    	$query = $this->db->select()->from($this->tb_matkul)->getAll(); 
    	return $query;
    }

	public function ambilMatkulPer($page = 1, $limit = 10){
		$offset = ($limit * $page) - $limit;
		$query = $this->db->results("SELECT * FROM ".$this->tb_matkul." inner join semester on semester.semester_id=matkul.semester_id ORDER BY matkul.matkul_id ASC LIMIT $offset, $limit");
        return $query;
    }

    public function ambilSatuMatkul($id){
    	$query = $this->db->select()->from($this->tb_matkul)->where('matkul_id', '=', $id)->getOne();
    	return $query;
    }

    public function tambahMatkul($data=array()){
        $query = $this->db->insert($this->tb_matkul, $data); 
        return $query;
    }

    public function ubahMatkul($idna,$data=array()){
    	$query = $this->db->update($this->tb_matkul,$data,array('matkul_id'=> $idna));
    	return $query;
    }

    // Semester active record
    public function semuaSemester(){
        $query = $this->db->select()->from($this->tb_smt)->getAll();
        return $query;
    }

    public function ambilSatuSemester($id){
        $query = $this->db->select()->from($this->tb_smt)->where('semester_id', '=', $id)->getOne();
        return $query;
    }

    public function tambahSemester($data=array()){
        $query = $this->db->insert($this->tb_smt, $data); 
        return $query;
    }

    public function ubahSemester($idna,$data=array()){
        $query = $this->db->update($this->tb_smt,$data,array('semester_id'=> $idna));
        return $query;
    }

    public function hapusSemester($id){
        $query = $this->db->delete($this->tb_smt, array('semester_id' => $id)); 
        return $query;
    }

    // Minggu active record
    public function semuaMinggu(){
        $query = $this->db->select()->from($this->tb_mg)->getAll();
        return $query;
    }

    public function ambilMingguPer($page = 1, $limit = 10){
        $offset = ($limit * $page) - $limit;
        $query = $this->db->results("SELECT * FROM ".$this->tb_mg." ORDER BY minggu_id ASC LIMIT $offset, $limit");
        return $query;
    }

    public function ambilSatuMinggu($id){
        $query = $this->db->select()->from($this->tb_mg)->where('minggu_id', '=', $id)->getOne();
        return $query;
    }

    public function tambahMinggu($data=array()){
        $query = $this->db->insert($this->tb_mg, $data); 
        return $query;
    }

    public function ubahMinggu($idna,$data=array()){
        $query = $this->db->update($this->tb_mg,$data,array('minggu_id'=> $idna));
        return $query;
    }

    public function hapusMinggu($id){
        $query = $this->db->delete($this->tb_mg, array('minggu_id' => $id)); 
        return $query;
    }
    

}