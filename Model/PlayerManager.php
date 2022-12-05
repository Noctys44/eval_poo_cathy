<?php

require_once('Player.php');

class PlayerManager
{
    private $dataBase;

    public function __construct($dataBase)
        {
            $this->dataBase = $dataBase;
        }

    public function insertPlayer($player)
    {
        $req = $this->dataBase->prepare("INSERT INTO player(email, nickname) VALUES(:email, :nickname)");
        $req->bindValue(':email',$player->getEmail(), PDO::PARAM_STR); 
        $req->bindValue(':nickname',$player->getNickname(), PDO::PARAM_STR); 
        $req->execute();       
    }

    public function getAllPlayers()
    {
        $getPlayers = $this->dataBase->query("SELECT * FROM player ORDER BY nickname ASC");
        return $getPlayers;
    }
}