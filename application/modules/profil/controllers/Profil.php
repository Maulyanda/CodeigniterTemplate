<?php
defined('BASEPATH') OR exit('No direct script access allowed ');
class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model
        $this->load->model('profil_model');
    }

    public function index()
	{
		if($this->session->userdata('nip') == NULL)
		{
			redirect("user");
		}else{
            
            $data = $this->profil_model->get_data();
            $x['data'] = $data[0];

			$this->load->view("include/head");
            $this->load->view("include/top-header");
            $this->load->view('profil', $x);
            $this->load->view("include/sidebar");
            $this->load->view("include/panel");
            $this->load->view("include/footer");
		}
    }

    public function update()
	{
        $input_data['nip'] = $this->input->post('nip', true); 			
        $input_data['nama_user'] = $this->input->post('nama_user', true);
        $input_data['password'] = md5($this->input->post('password', true));

        $result = $this->profil_model->edit_profil($input_data);

        if (!$result) { 							
            $this->session->set_flashdata('notif_update_user', 'Gagal mengubah profil.'); 				
            redirect('profil'); 			
        } else { 								
            $this->session->set_flashdata('notif_update_user', 'Profil Berhasil diubah.');
            $this->session->set_userdata('nip',$input_data['nip']);
		    $this->session->set_userdata('nama',$input_data['nama_user']);				
            redirect('profil'); 			
        }
    }
}
?>