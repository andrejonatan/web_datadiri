<?php

class Bank {
    //Atribut
    protected $norek;
    public $nama;
    private $saldo;

    static $jml = 0;
    const BANK = 'Bank Syariah Nurul Fikri';

    //contructor
    public function __construct($norek, $nama, $saldo){
        $this->norek = $norek;
        $this->nama = $nama;
        $this->saldo = $saldo;
        self::$jml++;

    }

    public function Setor($uang){
        $this->saldo += $uang;
    }

    public function ambil($uang){
        $this ->saldo -= $uang;
    }

    public function cetak(){
        echo "<b><u>".self::BANK. "</u><b><br>";
        echo '<br/>No. Rekening : ' . $this->norek . '</u></b>';
        echo '<br/>Nama Nasabah : ' . $this->nama . '</u></b>';
        echo '<br/>Saldo : Rp. ' . number_format($this->saldo, 0, ',', '.') . '</u></b>';
        echo "<hr/>";
    }

    }

// $nsb1 = new Bank("0110225076","Andrean", 8400000);
// var_dump($nsb1);


