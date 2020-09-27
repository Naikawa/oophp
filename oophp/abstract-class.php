<?php


abstract class Product{
	private $judul,
			$penulis,
			$penerbit,
			$harga,
			$diskon = 0;



public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
	$this->judul = $judul;
	$this->penulis = $penulis;
	$this->penerbit = $penerbit;
	$this->harga = $harga;
}

public function setJudul($judul){
	$this->judul = $judul;
}

public function getJudul(){
		return $this->judul;
}

public function setPenulis($penulis){
	$this->penulis = $penulis;
}

public function getPenulis(){
		return $this->penulis;
}

public function setPenerbit($penerbit){
	$this->penerbit = $penerbit;
}

public function getPenerbit(){
		return $this->penerbit;
}

public function setDiskon($diskon){
		$this->diskon = $diskon;
}

public function getDiskon($diskon){
		return $this->diskon;
}

public function setHarga($harga){
			$this->harga = $harga;
}

public function getHarga(){
	return $this->harga - ($this->harga * $this->diskon/ 100);
}


public function getLabel(){
	return "$this->penulis, $this->penerbit";
}

abstract public function getInfoProduct();

public function getInfo()
{
	$str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
	return $str;
}



}


class Komik extends Product{
	public $jmlHalaman;

public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlHalaman = 0){
	
	parent::__construct($judul, $penulis, $penerbit, $harga);
		$this->jmlHalaman = $jmlHalaman;


	}



		public function getInfoProduct(){
			$str = "Komik : " . $this->getInfo(). "- {$this->jmlHalaman} Halaman.";
			return $str;
		}
}



class Game extends Product{
		public $waktuMain;

public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktuMain = 0){
	
	parent::__construct($judul, $penulis, $penerbit, $harga);
		$this->waktuMain = $waktuMain;


	}


		public function getInfoProduct(){
			$str = "Game : " . $this->getInfo(). " - {$this->waktuMain} Jam.";
			return $str;
		}
}


class CetakInfoProduct{
	public $daftarProduct = array();

	public function tambahProduct( Product $product ){
			$this->daftarProduct[] = $product;
	}


	public function cetak(){
			$str = "DAFTAR PRODUCT : <br>";


				foreach ($this->daftarProduct as $p) {
					$str .= "-{$p->getInfoProduct()} <br>";
				}


			return $str;
	}
}

// $product1 = new Product();
// $product1->judul = "Naruto";

// var_dump($product1); 

// $product2 = new Product();
// $product2->judul = "Uncharted";
// $product2->tambah = "hahaha";
// var_dump($product2);


$product1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$product2 = new Game("Uncharted","Neil Druckmann", "Sony Computer", 250000, 50 );

$cetakProduct = new CetakInfoProduct();
$cetakProduct->tambahProduct($product1);
$cetakProduct->tambahProduct($product2);

echo $cetakProduct->cetak();




