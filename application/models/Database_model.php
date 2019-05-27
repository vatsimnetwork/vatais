<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class Database_model extends CI_Model {

	public function validateICAO($icao) {
        $this->db->where('icao', $icao);
        $query = $this->db->get('airports');

        if($query->num_rows() == 1) {
	        return true;
        } else {
	        return false;
        }
    }
    
    public function getAirportInfo($icao) {
        $this->db->where('icao', $icao);
        $query = $this->db->get('airports');
        
        return $query->result_array()['0'];
    }

    public function airportsWithAwis() {
        $query = $this->db->get('awis');

        if($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return false;
        }
    }

    public function getAwis($icao) {
        $query = $this->db->where('icao', $icao)
            ->get('awis');

        if($query->num_rows() > 0) {
            return $query->result_array()['0'];
        }
        else {
            return false;
        }
    }

    public function getAirportRunways($icao) {
        $query = $this->db->where('icao', $icao)
            ->get('runways');

        $result = $query->result_array();

        if($result['0']['rwy_ident'] != '') {
            //Add the opposite runway
            foreach ($result as $runway) {
                $originalIdent = $runway['rwy_ident'];
                $originalDir = preg_replace("/[^0-9]/", "", $runway['rwy_ident']) . '0';
                $oppositeDir = $originalDir - 360 + 180;

                if (strpos($originalIdent, 'L')) {
                    $opposite = substr($oppositeDir, 0, -1);
                    $oppositeIdent = sprintf("%02d", $opposite) . 'R';
                } else if (strpos($originalIdent, 'R')) {
                    $opposite = substr($oppositeDir, 0, -1);
                    $oppositeIdent = sprintf("%02d", $opposite) . 'L';
                } else if (strpos($originalIdent, 'C')) {
                    $opposite = substr($oppositeDir, 0, -1);
                    $oppositeIdent = sprintf("%02d", $opposite) . 'C';
                } else {
                    $opposite = substr($oppositeDir, 0, -1);
                    $oppositeIdent = sprintf("%02d", $opposite);
                }

                $runways[] = array(
                    'ident' => $originalIdent,
                    'direction' => $originalDir,
                );

                $runways[] = array(
                    'ident' => $oppositeIdent,
                    'direction' => $oppositeDir,
                );
            }
            return $runways;
        }
        else {
            return false;
        }
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
