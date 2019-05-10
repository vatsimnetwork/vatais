<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Airport extends CI_Controller {

	public function view($icao)
	{
        if ($this->Database_model->validateICAO($icao)){

            $airportInfoArray = $this->Database_model->getAirportInfo($icao);
            $ctafFreq = $this->Database_model->getCTAF($icao);

            /*
            $json = file_get_contents('https://avwx.rest/api/metar/'.$icao.'?options=&format=json&onfail=cache');
            $wxArray = json_decode($json);

            if(empty($wx)) {
                $wx = 'No WX data. Sorry!';
            }
            else {
                $wx = $wxArray->raw;
            }
            */

            $data = array(
                'airportInfo' => $airportInfoArray,
                'ctafFreq' => $ctafFreq,
                'metar' => 'No WX Data.',
            );

            $this->slice->view('public.airport', $data);

        } else {
            //you have entered an invalid ICAO.
            $this->session->set_flashdata('message', '<div class="alert alert-warning">You have entered an invalid airport code or this airport is not in our database.</div>');
            $this->slice->view('public.home');
        }
	}

    public function atis($icao)
    {
        $data['airportInfo'] = $this->Database_model->getAirportInfo($icao);
        $data['ctafFreq'] = $this->Database_model->getCTAF($icao);

        $this->slice->view('public.airpot', $data);
    }
	
}
