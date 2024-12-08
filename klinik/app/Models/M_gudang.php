<?php

namespace App\Models;
use CodeIgniter\Model;
use Exception;

class M_gudang extends Model
{
	public function tampil($table, $by){  
		return $this->db->table($table)
		->orderby($by, 'desc')
		->get()
		->getResult();
						//titik coma adalah batas, itu berarti baris baru//
	}
	public function join($table, $table2, $on, $by){  
		return $this->db->table($table)
		->orderby($by, 'desc')
		->join($table2,$on)
		->get()
		->getResult();
	}
	public function join3($table, $table2,$table3, $on,$on1, $by){  
		return $this->db->table($table)
		->orderby($by, 'desc')
		->join($table2,$on)
		->join($table3,$on1)
		->get()
		->getResult();
	}
	public function join32($table1, $table2, $table3, $on1, $on2, $where = [])
{
    return $this->db->table($table1)
                    ->join($table2, $on1)
                    ->join($table3, $on2)
                    ->where($where) // Apply filtering
                    ->get()
                    ->getResult();
}
	public function join4($table, $table2, $table3, $table4, $on, $on2,$on3, $by){  
		return $this->db->table($table)
		->orderby($by, 'desc')
		->join($table2,$on)
		->join($table3,$on2)
		->join($table4,$on3,'left')
		->get()
		->getResult();
	}
	public function joinbayar($table, $table2, $table3, $table4, $on, $on2,$on3, $by,$where){  
		return $this->db->table($table)
		->orderby($by, 'desc')
		->join($table2,$on)
		->join($table3,$on2)
		->join($table4,$on3,'left')
		->where('rekam_medis.status', $where['status'])
		->get()
		->getResult();
	}
	public function joinbayar2($table, $table2, $table3, $table4, $on, $on2,$on3, $by,$where, $where1) {
    return $this->db->table('rekam_medis') // Ensure the result is returned
    ->orderby($by, 'desc')
		->join($table2,$on)
		->join($table3,$on2)
		->join($table4,$on3,'left')
		->where('rekam_medis.status', $where['status'])
    	->where('rekam_medis.tanggal_berobat', $where1['tanggal_berobat'])
    	->get()
        ->getResult(); // Make sure to return the query result
    }
	public function joinrm($by){  
		return $this->db->table('rekam_medis')
		->orderby($by, 'desc')
		->join('pasien','rekam_medis.id_pasien=pasien.id_pasien')
		->join('dokter','rekam_medis.id_dokter=dokter.id_dokter')
		->get()
		->getResult();
	}
	//join tapi spesifik ke rm//
	public function rm(){
		return $this->db->table('rekam_medis')
		->join('pasien','rekam_medis.id_pasien=pasien.id_pasien')
		->join('dokter','rekam_medis.id_dokter=dokter.id_dokter')
		->where()
		->get()
		->getResult();
	}
	//kayak diatas tapi tidak ada where//
	public function rm2($where, $where1, $filter) {
    return $this->db->table('rekam_medis') // Ensure the result is returned
    ->join('dokter', 'rekam_medis.id_dokter = dokter.id_dokter')
    ->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien')
    ->join('obat', 'rekam_medis.id_obat = obat.id_obat', 'left')
    ->where('rekam_medis.status', $where['status'])
    ->where('rekam_medis.tanggal_berobat', $where1['tanggal_berobat'])
    ->where('rekam_medis.id_dokter', $filter['id_dokter'])
    ->get()
        ->getResult(); // Make sure to return the query result
    }
    public function filtertanggal($where){
    	return $this->db->table('rekam_medis')
    	->join('dokter', 'rekam_medis.id_dokter = dokter.id_dokter')
    	->join('pasien', 'rekam_medis.id_pasien = pasien.id_pasien')
    	->join('obat', 'rekam_medis.id_obat = obat.id_obat','left')
    	->where('rekam_medis.tanggal_berobat', $where['tanggal_berobat'])  // Use 'status' from the $where array
    	->get()
    	->getResult();
    }
    public function getWhere2($where){
    	return $this->db->table('rekam_medis')
    	->join('pasien','rekam_medis.id_pasien=pasien.id_pasien')
    	->join('dokter','rekam_medis.id_dokter=dokter.id_dokter')
    	->join('obat', 'rekam_medis.id_obat = obat.id_obat', 'left')
    	->getWhere($where)
    	->getRow();
    }
    public function jwhere1($table, $table2, $on, $where){
    	return $this->db->table($table)
    	->join($table2,$on)
    	->getWhere($where)
    	->getRow();
    }
    public function filter($table, $table2, $on, $filter, $filter2, $awal, $akhir, $by){  
    	return $this->db->table($table)
    	->join($table2,$on)
    	->where($filter,$awal)
    	->where($filter2,$akhir)
    	->orderby($by, 'desc')
    	->get()
    	->getResult();
    }
    public function filter2($table, $filter, $filter2, $awal, $akhir, $by){  
    	return $this->db->table($table)
    	->where($filter,$awal)
    	->where($filter2,$akhir)
    	->orderby($by, 'desc')
    	->get()
    	->getResult();
    }
    public function rmfilter($filter, $filter2, $awal, $akhir, $by){  
    	return $this->db->table('rekam_medis')
    	->join('pasien','rekam_medis.id_pasien=pasien.id_pasien')
    	->join('dokter','rekam_medis.id_dokter=dokter.id_dokter')
    	->where($filter,$awal)
    	->where($filter2,$akhir)
    	->orderby($by, 'desc')
    	->get()
    	->getResult();
    }
    public function bayarfilter($filter, $filter2, $awal, $akhir, $by){  
        return $this->db->table('bayar')
        ->join('rekam_medis','bayar.id_rm=rekam_medis.id_rm')
        ->join('pasien','rekam_medis.id_pasien=pasien.id_pasien')
        ->where($filter,$awal)
        ->where($filter2,$akhir)
        ->orderby($by, 'desc')
        ->get()
        ->getResult();
    }
    public function filnota($table, $filter, $awal, $by){  
    	return $this->db->table($table)
    	->where($filter,$awal)
    	->orderby($by, 'desc')
    	->get()
    	->getResult();
    }
    public function filterpesan($table, $table2, $on1 ,$orderBy,$filter) {
    	return $this->db->table($table)
    	->orderby($orderBy, 'desc')
    	->join($table2, $on1)
    	->where($filter)
    	->get()
    	->getResult();
    }
    public function joinw($table, $table2, $on, $w){  
    	return $this->db->table($table)
    	->join($table2,$on)
    	->where($w)
    	->get()
    	->getRow();
    }
    public function joinw4($table, $table2, $table3, $table4, $on, $on2,$on3, $by,$w){  
    	return $this->db->table($table)
		->orderby($by, 'desc')
		->join($table2,$on)
		->join($table3,$on2)
		->join($table4,$on3,'left')
    	->where($w)
    	->get()
    	->getRow();
    }
    public function input($table, $data){
    	return $this->db->table($table)
    	->insert($data);
    }
    public function hapus($table, $where){
    	return $this->db->table($table)
    	->delete($where);
    }
    public function edit($table, $data, $where){
    	return $this->db->table($table)
    	->update($data, $where);
    }
    public function getWhere($table, $where){
    	return $this->db->table($table)
    	->getWhere($where)
    	->getRow();
    }
    public function filterque($table,$where,$con){
    	return $this->db->table($table)
    	->where($where, $con)
    	->get()
    	->getResult();
    }
    public function simpan_barang($data)
    {
    	$query = $this->db->table($this->table)
    	->insert($data);
    	return $query;
    }
    protected $table = 'user';
    public function saveUser($data)
    {
    	$query =$this->db->table($this->table)
    	->insert($data);
    	return $query;
    }
    public function insert_transaction($data)
    {
    	$this->db->table('bayar')->insert($data);
    }

    public function update_status($id_visit, $status)
    {
    	$this->db->table('rekam_medis')->update(['status' => $status], ['id_rm' => $id_visit]);
    }
}