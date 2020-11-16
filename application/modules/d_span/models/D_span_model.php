<?php
class D_span_model extends CI_Model{

  public function get_all_dashboard()
	{	
		// $result = $this->db->query("SELECT a.*, CONCAT(b.alias, ' ', a.persentase_t) as alias FROM tbl_span as a JOIN tbl_satker as b ON a.kode_satker=b.kode_satker ORDER BY created_date DESC limit 8");
    $result = $this->db->query("SELECT *, alias FROM (SELECT a.*, b.alias FROM tbl_span as a JOIN tbl_satker as b ON a.kode_satker=b.kode_satker ORDER BY a.id_span DESC limit 8) as k ORDER BY id_span ASC");

		return $result;
  }

  // public function jumlah_pagu()
	// {	
	// 	$result = $this->db->query("SELECT SUM(pagu) AS pagu, sum(realisasi) as realisasi, sum(sisa_pagu) as sisa_pagu
  //   FROM tbl_span
  //   GROUP BY created_at
  //   ORDER BY created_at DESC LIMIT 1");
        
	// 	return $result;
  // }

  public function get_tanggal()
	{	
		$result = $this->db->query("SELECT created_date FROM tbl_span ORDER BY created_date DESC LIMIT 1");
        
		return $result;
  }

  // BIRO
  public function get_all_dashboard_biro()
	{	
		$result = $this->db->query("SELECT *, alias FROM (SELECT a.*, b.alias FROM tbl_span_biro as a JOIN tbl_satker_biro as b ON a.kode_satker_biro=b.kode_satker_biro ORDER BY a.id_span_biro DESC limit 4) as k ORDER BY alias ASC");

		return $result;
  }
}