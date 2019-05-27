<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Database_model extends CI_Model {

	public function validateICAO($icao) {
        $this->db->where('icao', $icao);
        $query = $this->db->get('airports');

        if($query->num_rows() == 1) {
	        return TRUE;
        } else {
	        return FALSE;
        }
    }
    
    public function getAirportInfo($icao) {
        $this->db->where('icao', $icao);
        $query = $this->db->get('airports');
        
        return $query->result_array()['0'];
    }

    public function getFirList() {
        $query = $this->db->get('firs');

        return $query->result_array();
    }
    
    public function getAirportFreqs($icao) {
        $this->db->where('icao', $icao);
        $query = $this->db->get('frequencies');
        
        return $query->result();
    }
    
    public function getCTAF($icao) {
	    
	    $queryCTAF = $this->db->query("SELECT * FROM frequencies WHERE `icao` = '$icao' AND `freq_type` = 'CTAF'");
	    $queryUNIC = $this->db->query("SELECT * FROM frequencies WHERE `icao` = '$icao' AND `freq_type` = 'UNIC'");
	    $queryTWR = $this->db->query("SELECT * FROM frequencies WHERE `icao` = '$icao' AND `freq_type` = 'TWR'");
	    
	    $ctafArray = $queryCTAF->result_array();
	    $unicArray = $queryUNIC->result_array();
	    $twrArray = $queryTWR->result_array();        
        
        if (empty($ctafArray)) {
	        if (empty($twrArray)) {
		        if (empty($unicArray)) {
			        $ctaf = '122.8';
        		} else {
	        		$ctaf = $unicArray['0']['freq'];
        		}
        	} else {
	        	$ctaf = $twrArray['0']['freq'];
        	}
        } else {
	        $ctaf = $ctafArray['0']['freq'];
        }
        
        return $ctaf;

    }

    public function getATISRules($icao) {
        $this->db->where('ident', $icao);
        $query = $this->db->get('rules');

        return $query->result_array();
    }
}
