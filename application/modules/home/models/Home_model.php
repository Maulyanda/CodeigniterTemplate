<?php
class Home_model extends CI_Model{

  public function get_span()
	{	
    $result = $this->db->query("SELECT SUM(pagu_t) AS pagu, sum(realisasi_t) as realisasi
              FROM tbl_span
              GROUP BY created_date
              ORDER BY created_date DESC LIMIT 1");
        
		return $result;
  }

  public function get_span_jatinangor(){
    $result = $this->db->query("SELECT persentase_t FROM tbl_span WHERE kode_satker = 448302 ORDER BY created_date DESC LIMIT 1")->result();

    return $result;
  }

  public function get_all_span_biro()
	{	
		$result = $this->db->query("SELECT *, alias FROM (SELECT a.*, b.alias FROM tbl_span_biro as a JOIN tbl_satker_biro as b ON a.kode_satker_biro=b.kode_satker_biro ORDER BY a.id_span_biro DESC limit 4) as k ORDER BY alias ASC")->result();

		return $result;
  }

  public function get_all_pok_biro()
	{	
		$result = $this->db->query("SELECT (100*sum(realisasi)/sum(pagu)) as persen FROM out_pok")->result();

    return $result;
  }

  public function get_all_sas()
	{	
		$result = $this->db->query("SELECT (100*sum(output_sas.realisasi)/sum(output_sas.pagu)) as persen FROM output_sas JOIN tbl_satker ON output_sas.kode_satker = tbl_satker.kode_satker")->result();

    return $result;
  }
  
  
}