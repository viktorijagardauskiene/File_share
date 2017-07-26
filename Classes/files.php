<?php
include 'classes/db.php';

class Files {

	public $total_size = 0;
	public $total_files = 0;
	public $last_upload = "1999-01-01";

	function __construct() {
		
		//gaunam total_size

		 $this->total_size = DB::query('SELECT sum(file_size) AS total FROM files')[0]->total; // komanda yra: pasiimti visas file_size reiksmes, jas sudeti ir atvaizduoti kaip total reiksme, kitaip stulpelio pavadinimas bus sum(files_size)

		//$sql = 'SELECT sum(file_size) AS total FROM files';
		//$this->total_size = DB::query($sql)[0]->total; //pasiimam objekto pirma reiksme ir is jos tik total reiksme


		//gaunam total_files

		$this->total_files = DB::query('SELECT max(id) as total FROM files')[0]->total; // komanda yra: pasiimti didziausia esama id reiksme ir atvaizduoti kaip total reiksme
		// galetu buti ir count(id), tik skaiciuos egzistuojancias eilutes

		$this->last_upload = DB::query('SELECT upload_time from files order by upload_time desc limit 1')[0]->upload_time; // isrikiuojam pagal dydi ir pasiimam tik viena, pirmaja reiksme
		
	}

	private function convertBytes($bytes) {


	}
}