<?php 

class Movies{
    //class Properties
    private $parameter;
    private $apiKey;
    private $base_url = "https://www.omdbapi.com/";
    private $storage = "data/movie.json";
    private $stored_movie;

    public function __construct($parameter, $apiKey)
    {
        $this->parameter = $parameter;
        $this->apiKey = $apiKey;
        $this->listMovies();
    }


    private function listMovies()
    {
        $endpoint = $this->base_url.'?s='.$this->parameter.'&apiKey='.$this->apiKey;
        $this->stored_movie = json_decode(file_get_contents($endpoint),true);
        file_put_contents($this->storage, json_encode($this->stored_movie['Search'],JSON_PRETTY_PRINT));
        header("location:" . url_base . "account.php"); exit();
        return "Successful";
    }


}