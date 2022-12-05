<?php

class Contest
{
    public $id, $game_id, $start_date, $winner_id, $erreurs = [];

    const GAMEID_INVALIDE = 1; 
    const STARTDATE_INVALIDE = 2;
    const WINNERID_INVALIDE = 3; 


    // public function __construct($gameId, $date, $winnerId)
    // {
    //     $this->setGameId($gameId);
    //     $this->setStartDate($date);
    //     $this->setWinnerId($winnerId);
    // }

    public function __construct($data)
    {
        if(!empty($data))
        {
            $this->assignement($data);
        }
    }

    public function assignement($data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    // SETTERS
    public function setGameId($g)
    {
        if(empty($g) || is_string($g)){
            $this->erreur[] = self::GAMEID_INVALIDE;
        } else {
            $this->game_id = $g;
        }
    }

    public function setStartDate($d)
    {
        if(empty($d)){
            $this->erreur[] = self::STARTDATE_INVALIDE;
        } else {
            $this->start_date = $d;
        }
    }

    public function setWinnerId($w)
    {
        if(empty($w) || is_string($w)){
            $this->erreur[] = self::WINNERID_INVALIDE;
        } else {
            $this->winner_id = $w;
        }
    }


    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getGameId()
    {
        return $this->game_id;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function getWinnerId()
    {
        return $this->winner_id;
    }

    public function getErreurs()
    {
        return $this->erreurs;
    }

    public function isContestValid()
    {
        return !(empty($this->game_id) || empty($this->start_date) || empty($this->winner_id));
    }
}