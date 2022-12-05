<?php

require_once('Contest.php');

class ContestManager
{
    private $dataBase;

    public function __construct($dataBase)
        {
            $this->dataBase = $dataBase;
        }

    public function insertContest($contest)
    {
        $req = $this->dataBase->prepare("INSERT INTO contest(game_id, start_date, winner_id) VALUES(:game_id, :start_date, :winner_id)");
        $req->bindValue(':game_id',$contest->getGameId(), PDO::PARAM_STR); 
        $req->bindValue(':start_date',$contest->getStartDate(), PDO::PARAM_STR); 
        $req->bindValue(':winner_id',$contest->getWinnerId(), PDO::PARAM_STR);
        $req->execute();       
    }

    public function getAllContest()
    {
        $getContest = $this->dataBase->query("SELECT * FROM contest ORDER BY game_id ASC");
        return $getContest;
    }
}