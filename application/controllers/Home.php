<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Database_model $Database_model
 */
class Home extends CI_Controller {

	public function index()
	{	
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			
			$icao = $this->input->post('icao_id');

			redirect('airport/view/' . $icao);
			
		} else {

		$this->slice->view('public.home');
		
		}
	}
}
