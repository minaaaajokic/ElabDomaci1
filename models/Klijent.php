<?php

class Klijent{

    public $klijentID;
    public $imeK;
    public $prezimeK;
    public $brojTelefona;
    public $loyalityClan;
    

    public function __construct($klijentID=null,$imeK=null,$prezimeK=null,$brojTelefona=null,$loyalityClan=null)
    {
        $this->klijentID = $klijentID;
        $this->imeK=$imeK;
        $this->prezimeK=$prezimeK;
        $this->brojTelefona=$brojTelefona;
        $this->loyalityClan=$loyalityClan;
    }

    public static function vratiKlijente(mysqli $konekcija)
    {
        $sql = "SELECT * FROM klijent";
        $resultSet = $konekcija->query($sql);
        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    
    public static function dodajKlijenta($imeK, $prezimeK, $brojTelefona, $loyalityClan, mysqli $konekcija)
    {
        return $konekcija->query("INSERT INTO klijent VALUES(null, '$imeK' , '$prezimeK', '$brojTelefona', '$loyalityClan')");
    }


}

