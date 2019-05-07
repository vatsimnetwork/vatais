<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airport extends CI_Controller {

	public function index($icao)
	{
		$data['airportInfo'] = $this->Database_model->getAirportInfo($icao);
		$data['ctafFreq'] = $this->Database_model->getCTAF($icao);

		$this->load->view('airport_view', $data);
	}

    public function atis($icao)
    {
        $data['airportInfo'] = $this->Database_model->getAirportInfo($icao);
        $data['ctafFreq'] = $this->Database_model->getCTAF($icao);

        $this->load->view('airport_view', $data);
    }
	
}
