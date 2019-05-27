<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Database_model $Database_model
 */
class Api extends CI_Controller {

    public function fir_list()
    {
        $firListArray = $this->Database_model->getFirList();

        $jsonResponse = json_encode ($firListArray, JSON_PRETTY_PRINT);
        header('content-type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Origin: *');
        print_r ($jsonResponse);
        die;
    }

    public function awis_all()
    {
        $airportsWithAwisArray = $this->Database_model->airportsWithAwis();
        foreach($airportsWithAwisArray as $airport) {
            echo $this->Wx_model->makeAwis($airport['icao']);
            echo '<br>';
        }
    }

    public function atis($icao)
    {
        $data['airportInfo'] = $this->Database_model->getAirportInfo($icao);
        $data['ctafFreq'] = $this->Database_model->getCTAF($icao);

        $this->slice->view('public.airpot', $data);
    }

}
