<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airport extends CI_Controller {

	public function index($icao)
	{
		$airportInfoArray = $this->Database_model->getAirportInfo($icao);
		$ctafFreq = $this->Database_model->getCTAF($icao);
		
		$data = array(
			'airportInfo' => $airportInfoArray,
			'ctafFreq' => $ctafFreq
		);
				
		$this->load->view('airport_view', $data);
	}
	
}
