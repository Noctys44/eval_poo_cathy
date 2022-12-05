<?php

class Game
{
    public $id, $title, $min_players, $max_players, $erreurs = [];

    const TITLE_INVALIDE = 1; 
    const MIN_INVALIDE = 2; 
    const MAX_INVALIDE = 3;

    // public function __construct($t, $min, $max)
    // {
    //     $this->setTitle($t);
    //     $this->setMinPlayers($min);
    //     $this->setMaxPlayers($max);
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
    public function setTitle($t)
    {
        if(empty($t)){
            $this->erreur[] = self::TITLE_INVALIDE;
        } else {
            $this->title = $t;
        }
    }

    public function setMinPlayers($min)
    {
        if(empty($min) || is_string($min)){
            $this->erreur[] = self::MIN_INVALIDE;
        } else {
            $this->min_players = $min;
        }
    }

    public function setMaxPlayers($max)
    {
        if(empty($max) || is_string($max)){
            $this->erreur[] = self::MAX_INVALIDE;
        } else {
            $this->max_players = $max;
        }
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getMinPlayers()
    {
        return $this->min_players;
    }

    public function getMaxPlayers()
    {
        return $this->max_players;
    }

    public function getErreurs()
    {
        return $this->erreurs;
    }

    public function isGameValid()
    {
        return !(empty($this->title) || empty($this->min_players) || empty($this->max_players));
    }
}