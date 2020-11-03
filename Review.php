<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
{

  public function index()
  {

   $this->form_validation->set_rules('nama', 'Nama',
  	'required|min_length[3]', [
   	'required' => 'Nama Harus diisi',
   	'min_length' => 'Nama terlalu pendek'
   ]);

   $this->form_validation->set_rules('hp', 'No Hp',
  	'required|min_length[3]', [
  	'required' => 'No Hp Harus diisi',
   	'min_length' => 'No terlalu pendek'
   ]);

   if ($this->form_validation->run() == false) 
   {
     $this->load->view('v_input');
   } else {
   		$data = [
   			    'nama' => $this->input->post('nama'),
   			    'hp' => $this->input->post('hp'),
            'merk' => $this->input->post('merk'),
            'uk' => $this->input->post('uk'),
            'harga' => $this->ModelReview->hasil($this->input->post('merk')) 
		   ];
			   
   		$this->load->view('v_output', $data);
   	      }
  }
}