<?php

class Files {

	public $total_size = 0;
	public $total_files = 0;
	public $last_upload = "1999-01-01";

	public $file_name;
	public $file_size;
	public $crypt;

	function __construct() {
		
		//gaunam total_size

		 $this->total_size = $this->convertBytes(DB::query('SELECT sum(file_size) AS total FROM files')[0]->total); // komanda yra: pasiimti visas file_size reiksmes, jas sudeti ir atvaizduoti kaip total reiksme, kitaip stulpelio pavadinimas bus sum(files_size)

		//$sql = 'SELECT sum(file_size) AS total FROM files';
		//$this->total_size = DB::query($sql)[0]->total; //pasiimam objekto pirma reiksme ir is jos tik total reiksme


		//gaunam total_files

		$this->total_files = DB::query('SELECT max(id) as total FROM files')[0]->total; // komanda yra: pasiimti didziausia esama id reiksme ir atvaizduoti kaip total reiksme
		// galetu buti ir count(id), tik skaiciuos egzistuojancias eilutes

		$this->last_upload = DB::query('SELECT upload_time from files order by upload_time desc limit 1')[0]->upload_time; // isrikiuojam pagal dydi ir pasiimam tik viena, pirmaja reiksme
		
	}

	private function convertBytes($bytes) {

		 if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        } return $bytes;
	}

	public function uploadFile($file) {
		$file_name = explode(".", $file['name']); // iskaido fialo pavadinima i pavadinima ir pletini

		$encoded_file_name = MD5($file_name[0]); // MD5 funkcija uzkoduoja tai ka irasom i skliaustelius, siuo atveju failo pavadinima be pletinio
		$target_file = "files/" . $encoded_file_name . "." .$file_name[1];

		move_uploaded_file($file["tmp_name"], $target_file);

		$crypt = md5($file_name[0] . rand(1,100000));

//		$db = new DB();
		//$db->store("INSERT INTO files (original_file_name, encoded_file_name, file_size, crypt) VALUES ('".$file["name"]."', '".$encoded_file_name.".".$file_name[1]."', '".$file["size"]."', '".$crypt."')");
		//DB::store($query);
	}
}