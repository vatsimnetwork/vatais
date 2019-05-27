<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(FCPATH.'assets/MetarDecoder/MetarDecoder.php');

class Wx_model extends CI_Model {

    public function getWind($icao)
    {
        $json = file_get_contents('https://avwx.rest/api/metar/'.$icao.'?options=&format=json&onfail=cache');
        $obj = json_decode($json);

        $windData['direction'] = $obj->wind_direction->value;
        $windData['speed'] = $obj->wind_speed->value;

        return $windData;
    }

    public function pickRunway($runways, $wind)
    {
        $closest = null;
        foreach ($runways as $item) {
            $wind = $wind['direction'];
            $runway = $item['direction'];

            if ($closest === null || abs($wind - $runway) > abs($runway - $wind)) {
                $closest = $item;
            }
        }
        return $closest;
    }

    public function makeAwis($icao)
    {
        $airport = $this->Database_model->getAirportInfo($icao);
        $awis = $this->Database_model->airportsWithAwis($icao);
        $wind = $this->getWind($icao);
        $runways = $this->Database_model->getAirportRunways($icao);

        $useRunway = $this->pickRunway($runways, $wind);

        //Required output: ICAO,NAME ,LAT,LONG,FREQ,DEPRWY,ARRRWY
        $awis = $airport['icao'].','.$airport['name'].','.$airport['latitude_deg'].','.$airport['longitude_deg'].','.$awis['0']['freq'].','.$useRunway['ident'].','.$useRunway['ident'];
        return $awis;
    }
}
?>