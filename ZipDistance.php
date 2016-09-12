<?php

class zipDistance
{
    /**
     * Google API authorization key
     * @param string
     */
    private $key = null;


    /**
     * Construct, set the API key
     */
    public function __construct($key = 0)
    {
        $this->key = $key;
    }
	

    /**
     * Transportation mode
     * @param $mode = driving|walking|bicycling
     */
    protected $mode = 'driving';
	
	
	 /**
     * Language
     * @param $lang = en-GB|...
     */
    protected $lang = 'en-GB';
	
	
	/**
     * Google Matrix API base URI
     * @param string
     */
    protected $baseUri = 'https://maps.googleapis.com/maps/api/distancematrix/json';

	
    /**
     * Calculate the distance between two zip codes
     * @return distance in meters
     */
    public function getDistance($start, $target)
    {   
	
        // Required parameters
        if (empty($start) OR empty($target) OR empty($this->key)) {
            trigger_error("Not all required parameters are set", E_USER_ERROR);
            exit();
        }

        $this->start = $start;
        $this->target = $target;
		
        $this->callDistance();
 
    }
	

    /**
     * @param string $result
     * @return json_decoded contents of $result
     */
    private function callDistance()
    {
        $result = json_decode(file_get_contents($this->baseUri."?origins=".urlencode($this->start)."&destinations=".urlencode($this->target)."&mode=".$this->mode."&language=".$this->lang."&key=".$this->key));

        if ($result->status == "OK") {
            return $result->rows[0]->elements[0]->distance->value;
        } else {
            return false;
        }
    }
	
}
