<?php

class Files {

	public $total_size = 0;
	public $total_files = 0;
	public $last_upload = "1999-01-01";

	public $file_name;
	public $file_size;
	public $crypt;
	public $upload_time;
	public $encoded_file_name;

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

		if(!$file['error']) {

			$this->file_name = $file['name'];
			$this->file_size = $this->convertBytes($file['size']);


			$file_name = explode(".", $file['name']); // iskaido fialo pavadinima i pavadinima ir pletini, reiktu naudoti paskutini elementa jei pavadinime butu daugiau nei vienas taskas

			if($file_name[1] == "exe") {

				$this->error = "Netinkamo formato dokumentas";

			} elseif($file['size'] > 1024*1024*5) { // 5 mb // reik pakeist nustatymus wamp

				$this->error = "Dokumentas yra per didelis";

			} else {
				$encoded_file_name = MD5($file_name[0]); // MD5 funkcija uzkoduoja tai ka irasom i skliaustelius, siuo atveju failo pavadinima be pletinio
				$target_file = "files/" . $encoded_file_name . "." .$file_name[1];

				move_uploaded_file($file["tmp_name"], $target_file);

				$this->crypt = md5($file_name[0] . rand(1,100000));


				$query = "INSERT INTO files (original_file_name, encoded_file_name, file_size, crypt) VALUES ('".$file["name"]."', '".$encoded_file_name.".".$file_name[1]."', '".$file["size"]."', '".$this->crypt."')";
				
				DB::store($query);
			}

			
		} else {

			$this->error = "There was an error";
		}
	}

	public function downloadFile($crypt) {
		$result = DB::query("SELECT * FROM files where crypt = '$crypt'")[0];

		if (sizeof($result)) { // sitas neaisku is kur
		$this->file_name = $result->original_file_name;
		$this->file_size = $result->file_size;
		$this->upload_time = $result->upload_time;
		$this->encoded_file_name = $result->encoded_file_name;
	} else {
		$this->error = "Dokumentas neegzistuoja arba yra sugadintas";
	}

	}
}