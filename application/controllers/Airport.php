<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Database_model $Database_model
 * @property Wx_model $Wx_model
 */
class Airport extends CI_Controller {

	public function view($icao)
	{
        if ($this->Database_model->validateICAO($icao)){

            $airportInfoArray = $this->Database_model->getAirportInfo($icao);
            //$ctafFreq = $this->Database_model->getCTAF($icao);

            $data = array(
                'airportInfo' => $airportInfoArray,
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

    public function save_awis($icao)
    {
        if($this->session->userdata('logged_in')) {
            if($this->input->post('status') === 'enable') {
                $data = array(
                    'freq' => $this->input->post('freq'),
                    'icao' => $icao
                );
                $this->db->insert('awis', $data);
                //TODO: Swal Alert.
            }
            elseif($this->input->post('status') === 'disable') {
                $this->db->where('icao', $icao)
                    ->delete('awis');
                //TODO: Swal Alert.
            }
        }
        redirect('airport/view/'.$icao);
    }
	
}
