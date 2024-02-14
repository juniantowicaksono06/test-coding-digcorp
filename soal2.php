<?php

require_once './helper.php';

$mapel = ["Inggris", "Indonesia", "Jepang"];

class Nilai {
    protected $nilai;
    protected $mapel;

    public function __construct($mapel = "", $nilai = 0) {
        $this->nilai = $nilai;
        $this->mapel = $mapel;
    }

    public function set_nilai($nilai) {
        $this->nilai = $nilai;
    }

    public function set_mapel($mapel) {
        $this->mapel = $mapel;
    }
}

class Siswa {
    private $nrp;
    private $nama;
    private $daftarNilai;

    public function __construct($nama = "", $nrp = "") {
        $this->nrp = $nrp;
        $this->nama = $nama;
        $this->daftarNilai = [];
    }

    public function set_nama($nama) {
        $this->nama = $nama;
    }

    public function set_nrp($nrp) {
        $this->nrp = $nrp;
    }

    public function get_nama() {
        return $this->nama;
    }

    public function get_nrp() {
        return $this->nrp;
    }

    public function get_nilai() {
        return $this->daftarNilai;
    }

    public function set_nilai($mapel, $nilai) {
        if(is_array($nilai) && is_array($mapel)) {
            for($x = 0; $x < count($nilai); $x++) {
                array_push($this->daftarNilai, new Nilai($mapel[$x], $nilai[$x]));
            }
        }
        else {
            $this->daftarNilai = [new Nilai($mapel, $nilai)];
        }
    }

    // Fungsi untuk generate siswa secara random
    public function generate() {
        global $mapel;
        $this->nrp = generate_random_string(10);
        $this->nama = generate_random_string(10);
        $this->daftarNilai = [new Nilai($mapel[rand(0, count($mapel) - 1)]), rand(0, 100)];
    }
}

// Instansiasi object siswa
$siswa1 = new Siswa();
$siswa1->set_nama("Abdul");
$siswa1->set_nrp("1234567890");
$siswa1->set_nilai(["Inggris", "Indonesia", "Jepang"], [100, 100, 90]);

// Print output
var_dump("Nama: " . $siswa1->get_nama());
var_dump("NRP: " . $siswa1->get_nrp());
var_dump("Daftar Nilai: ");
var_dump($siswa1->get_nilai());

// Generate random siswa
$daftarSiswa = [];
for($x = 0; $x < 10; $x++) {
    $siswa = new Siswa();
    $siswa->generate();
    array_push($daftarSiswa, $siswa);
}

// Cek daftar siswa
var_dump($daftarSiswa);