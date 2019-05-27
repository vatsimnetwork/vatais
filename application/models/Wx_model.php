<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(FCPATH.'assets/MetarDecoder/MetarDecoder.inc.php');
include(FCPATH.'assets/MetarDecoder/util.php');
use utilphp\util;

class Wx_model extends CI_Model {

    public function getMetar($icao)
    {
        $metar = file('http://metar.vatsim.net/metar.php?id='.$icao);
        return $metar['0'];
    }

    public function decode($raw)
    {
        $decoder = new MetarDecoder\MetarDecoder();
        $d = $decoder->parse($raw);

        $raw_dump = util::var_dump($d,true,2);
        $to_delete=array(
            'private:MetarDecoder\\Entity\\DecodedMetar:',
            'private:MetarDecoder\\Entity\\',
            'MetarDecoder\\Entity\\',
            'Value:'
        );
        $clean_dump = str_replace($to_delete,'',$raw_dump);
        return array($clean_dump);
    }

}
?>