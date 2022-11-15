<?php

class Zaposleni{

    public $zaposleniID;
    public $imeZap;
    public $prezimeZap;
    public $username;
    public $password;

    public function __construct($zaposleniID=null,$imeZap=null,$prezimeZap=null,$username=null,$password=null)
    {
        $this->zaposleniID = $zaposleniID;
        $this->imeZap = $imeZap;
        $this->prezimeZap = $prezimeZap;
        $this->username = $username;
        $this->password = $password;
    }
    public static function login($zaposleni, mysqli $konekcija)
    {
        $query = "SELECT * FROM zaposleni WHERE username='$zaposleni->username' and password='$zaposleni->password'";
        return $konekcija->query($query);
    }

    public static function vratiZaposlene(mysqli $konekcija)
    {
        $sql = "SELECT * FROM zaposleni";
        $resultSet = $konekcija->query($sql);

        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }
}


?>