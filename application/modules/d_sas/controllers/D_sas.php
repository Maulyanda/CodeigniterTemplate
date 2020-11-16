<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class D_sas extends CI_Controller{
  function __construct(){
    parent::__construct();
      //load chart_model from model
    $this->load->model('d_sas_model');
  }

  function index($link = NULL)
  {
    if($_SESSION['nip'])
    {
      if ($link == NULL) {
        // list semua kampus
        // $x['title'] = "test";
        $data = $this->d_sas_model->get_all_kampus()->result();
        $x['data'] = json_encode($data);
      } else {
        $x['url'] = $link;
        // bukan halaman awal
        // dibagi berdasarkan panjang link
        // 3 : show output
        // 4 : show bagian/unit (jtngr)
        // 6 : show bagian/unit (regional)
        // 6 : show biro (jtngr)
        $data = array();
        switch (strlen($link)) {
          case 15:
            $data = $this->d_sas_model->get_all_output($link)->result();
            break;
          case 4:
            // pasti dari jatinangor
            // $page = $this->d_sas_model->get_biro($link)->result();
            $data = $this->d_sas_model->get_all_unit($link)->result();
            break;
          case 6:
            // kalo jatinangor, show biro
            // kalo regional, show unit/bagian
            if ($link != 448302) {
              // regional ke unit
              $data = $this->d_sas_model->get_all_unit_satker($link)->result();
            } else {
              $data = $this->d_sas_model->get_all_biro($link)->result();
            }
            break;
        }
        $x['data'] = json_encode($data);
      }

      // } elseif (strlen($link) == 6) {
      //   // link dari kode_satker
      //   $x['title'] = "biro";
      //   if( $link != 448302){
      //     // list bagian/unit kampus regional
      //     $data = $this->d_sas_model->get_all_unit_satker($link)->result();
      //   }else{
      //     // list biro kampus jatinangor
      //     $data = $this->d_sas_model->get_all_biro($link)->result();
      //   }
      //   $page = $this->d_sas_model->get_kampus($link)->result();
      //   $x['link'] = $link;
      //   $x['page'] = $page[0]->alias;
      //   $x['data'] = json_encode($data);
      // } elseif (strlen($link) == 4) {
      //   // list bagian/unit dari kampus jatinangor
      //   $x['title'] = "unit";
      //   $page = $this->d_sas_model->get_biro($link)->result();
      //   $data = $this->d_sas_model->get_all_unit($link)->result();
      //   $x['link'] = $link;
      //   $x['page'] = $page[0]->nama;
      //   $x['data'] = json_encode($data);
      // } elseif (strlen($link) == 3) {
      //   // list output
      //   $x['title'] = "output";
      //   $data = $this->d_sas_model->get_all_output($link)->result();
      //   $x['link'] = $link;
      //   $x['data'] = json_encode($data);
      // }else{
      //   $x['data'] = json_encode($data);
      // }

      $this->load->view("include/head");
      $this->load->view("include/top-header");
      $this->load->view("view_sas",$x);
      $this->load->view("include/sidebar");
      $this->load->view("include/panel");
      $this->load->view("include/footer");
    }else{
      redirect("user");
    }
  }
}