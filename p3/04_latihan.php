<!-- BUAT 1 CLASS PERSEGI

ISINYA 
- ATRIBUT
- FUNGSI / METHOD (HITUNG LUAS, KELILING)


OUTPUT YANG DIHARAPKAN:

PERSEGI DENGAN SISI : 4
- MEMILIKI LUAS : ---
- MEMILIKI KELILING : --- -->

<?php

    class Persegi {
        // Atribut
        public $sisi;

        // Method
        public function __construct($sisi){
            $this->sisi = $sisi;
        }

        // Method untuk menghitung luas
        public function hitungLuas(){
            return $this->sisi * $this->sisi;
        }

        // Method untuk menghitung keliling
        public function hitungKeliling(){
            return 4 * $this->sisi;
        }
    }

// Output
echo "<h3>PERSEGI DENGAN SISI : 4</h3>";
$persegi = new Persegi(4);
echo "- Memiliki Luas : " . $persegi->hitungLuas() . " cm <br>";
echo "- Memiliki Keliling : " . $persegi->hitungKeliling() . " cm";


?>