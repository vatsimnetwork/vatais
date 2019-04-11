<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$icao = $this->input->post('icao_id');
			
			if ($this->Database_model->validateICAO($icao)){
				
				$airportInfoArray = $this->Database_model->getAirportInfo($icao);
				$ctafFreq = $this->Database_model->getCTAF($icao);
			
				$data = array(
					'airportInfo' => $airportInfoArray,
					'ctafFreq' => $ctafFreq
				);
				
				$this->load->view('airport_view', $data);
				
			} else {
				//you have entered an invalid ICAO.
				$this->session->set_flashdata('message', '<div class="alert alert-warning">You have entered an invalid airport code or this airport is not in our database.</div>');
				$this->load->view('home');
			}
			
		} else {

		$this->load->view('home');
		
		}
	}
}
