<?php

class Player
{
    private $id, $email, $nickname, $erreurs = [];

    const EMAIL_INVALIDE = 1; 
    const NICKNAME_INVALIDE = 2; 

    // public function __construct($e, $n)
    // {
    //     $this->setEmail($e);
    //     $this->setNickname($n);
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
    public function setEmail($e)
    {
        if(empty($e)){
            $this->erreur[] = self::EMAIL_INVALIDE;
        } else {
            $this->email = $e;
        }
    }

    public function setNickname($n)
    {
        if(empty($n) || !is_string($n)){
            $this->erreur[] = self::NICKNAME_INVALIDE;
        } else {
            $this->nickname = $n;
        }
    }


    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getNickname()
    {
        return $this->nickname;
    }

    public function getErreurs()
    {
        return $this->erreurs;
    }

    public function isPlayerValid()
    {
        return !(empty($this->email) || empty($this->nickname));
    }
}