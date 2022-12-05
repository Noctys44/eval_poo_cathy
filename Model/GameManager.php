<?php

require_once('Game.php');

class GameManager
{
    private $dataBase;

    public function __construct($dataBase)
        {
            $this->dataBase = $dataBase;
        }

    public function insertGame($game)
    {
        $req = $this->dataBase->prepare("INSERT INTO game(title, min_players, max_players) VALUES(:title, :min_players, :max_players)");
        $req->bindValue(':title',$game->getTitle(), PDO::PARAM_STR); 
        $req->bindValue(':min_players',$game->getMinPlayers(), PDO::PARAM_STR); 
        $req->bindValue(':max_players',$game->getMaxPlayers(), PDO::PARAM_STR);
        $req->execute();       
    }

    public function getAllGames()
    {
        $getGames = $this->dataBase->query("SELECT * FROM game ORDER BY title ASC");
        return $getGames;
    }
}