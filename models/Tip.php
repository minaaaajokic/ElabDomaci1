<?php

class Tip {

    public $tipID;
    public $naziv;

    public function __construct($tipID=null,$naziv=null)
    {
        $this->tipID = $tipID;
        $this->naziv=$naziv;
    }

    public static function vratiTipove(mysqli $konekcija)
    {
        $sql = "SELECT * FROM tip";
        $resultSet = $konekcija->query($sql);
        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

}

