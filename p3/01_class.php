<?php 

    class Motor{
        //Atribut
        public $merk;
        public $warna;
        public $tahun;
        //Method
        public function __construct($merk, $warna, $tahun){
            $this->merk = $merk;
            $this->warna = $warna;
            $this->tahun = $tahun;
            echo "Objek Motor berhasil dibuat! <br>";
        }
    };

    $mtr1 = new Motor("Honda", "Merah", 2020);
    $mtr2 = new Motor("Yamaha", "Biru", 2019);
    
    // $mtr2->warna = "Biru";
    // $mtr2->tahun = 2019;


    var_dump($mtr1);
    var_dump($mtr2);
?>