<?php defined("BASEPATH") OR exit("No direct script access allowed");

class Home extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('home_model');
  }

  /**
     * This function is used to load page view
     * @return Void
     */
  public function index()
  {
    if($_SESSION['nip'])
    {
      // SPAN JATINANGOR
      $persentase_jatinangor = $this->home_model->get_span_jatinangor();

      // POK
      $persen_pok = $this->home_model->get_all_pok_biro();
      $persentase_pok = round($persen_pok[0]->persen,2);

      // SAS
      $persen_sas= $this->home_model->get_all_sas();
      $persentase_sas = round($persen_sas[0]->persen,2);

      // BIRO
      $biro = $this->home_model->get_all_span_biro();

      // SPAN
      $span = $this->home_model->get_span()->result();
      $hitung_span= $span[0]->realisasi/$span[0]->pagu*100;
      $persentase_span = round($hitung_span,2);

      $x['biro'] = $biro;
      $x['persentase_span'] = $persentase_span;
      $x['persentase_sas'] = $persentase_sas;
      $x['persentase_jatinangor'] = $persentase_jatinangor;
      $x['persentase_pok'] = $persentase_pok;

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view('home', $x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");         

    }else{
        //jika session belum terdaftar, maka redirect ke halaman login
        redirect("user");
    }
	
  }
}
?>