<?php

//Read JSON data

class Json
{
    private $storage = "data/movie.json";
    public function getRows()
    {
        if (file_exists($this->storage)) {
            $jsonData = file_get_contents($this->storage);
            $data = json_decode($jsonData, true);
            return !empty($data) ? $data : false;
        }
        return false;
    }
}
