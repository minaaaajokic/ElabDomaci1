<?php


class Tretman{

   public $tretmanID;
   public $zaposleniID;
   public $klijentID;
   public $tipID;
   public $datum;
  
    public function __construct($tretmanID=null, $zaposleniID=null, $klijentID=null, $tipID=null, $datum=null)
    {
        $this->tretmanID = $tretmanID;
        $this->zaposleniID=$zaposleniID;
        $this->klijentID=$klijentID;
        $this->tipID=$tipID;
        $this->datum=$datum;
    }

    public static function pretraziTretmane($zaposleni, $sortiranje, mysqli $konekcija)
    {
        $sql = "SELECT * FROM tretman t join zaposleni z on t.zaposleniID = z.zaposleniID join klijent k on t.klijentID = k.klijentID join tip ti on t.tipID = ti.tipID";
        if($zaposleni != "1"){
            $sql .= " WHERE t.zaposleniID = " . $zaposleni;
        }
        $sql.= " ORDER BY t.datum " . $sortiranje;


        $resultSet = $konekcija->query($sql);
        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    public static function dodajTretman($zaposleniID, $klijentID, $tipID, $datum, mysqli $konekcija)
    {
        return $konekcija->query("INSERT INTO tretman VALUES(null, '$zaposleniID' , '$klijentID', '$tipID' , '$datum' )");  
    }

    public static function izmeniTretman($tretmanID, $datum, mysqli $konekcija)
    {
        return $konekcija->query("UPDATE tretman SET datum = '$datum' WHERE tretmanID = $tretmanID");
    }

    public static function obrisiTretman($tretmanID, mysqli $konekcija)
    {
        return $konekcija->query("DELETE FROM tretman WHERE tretmanID = $tretmanID");
    }
}