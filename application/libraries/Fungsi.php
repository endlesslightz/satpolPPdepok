<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Fungsi{
 
		public function convert_bulan($bulan){
			if($bulan == 1)$bln = "Januari";
			else if($bulan == 2)$bln = "Februari";
			else if($bulan == 3)$bln = "Maret";
			else if($bulan == 4)$bln = "April";
			else if($bulan == 5)$bln = "Mei";
			else if($bulan == 6)$bln = "Juni";
			else if($bulan == 7)$bln = "Juli";
			else if($bulan == 8)$bln = "Agustus";
			else if($bulan == 9)$bln = "September";
			else if($bulan == 10)$bln = "Oktober";
			else if($bulan == 11)$bln = "November";
			else if($bulan == 12)$bln = "Desember";
			else $bln = "";
			
			return $bln;
		}
	}
?>
