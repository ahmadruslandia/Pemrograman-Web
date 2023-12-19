<?php
class M_kamar extends CI_Model{

	function get_room_type(){
		$hsl=$this->db->get('room_type');
		return $hsl;
	}

	function get_all_room(){
		$hsl=$this->db->get('compare');
		return $hsl;
	}

	function simpan_room($room_type,$img_large,$img_thumb,$deskripsi,$room_rate){
		$hsl=$this->db->query("INSERT INTO compare(type,gambar_large,gambar_kotak,detail,rate) VALUES ('$room_type','$img_large','$img_thumb','$deskripsi','$room_rate')");
		return $hsl;
	}

	//front End
	function get_all_room_home(){
		$hsl=$this->db->query("SELECT * FROM compare LIMIT 4");
		return $hsl;
	}

	function get_room_by_kode($kode){
		$hsl=$this->db->query("SELECT * FROM compare WHERE kd_compare='$kode'");
		return $hsl;
	}

	function update_room($kode,$room_type,$img_large,$img_thumb,$deskripsi,$room_rate){
		$hsl=$this->db->query("UPDATE compare SET type='$room_type',gambar_large='$img_large',gambar_kotak='$img_thumb',detail='$deskripsi',rate='$room_rate' WHERE kd_compare='$kode'");
		return $hsl;
	}

	function update_room_img_large($kode,$room_type,$img_large,$deskripsi,$room_rate){
		$hsl=$this->db->query("UPDATE compare SET type='$room_type',gambar_large='$img_large',detail='$deskripsi',rate='$room_rate' WHERE kd_compare='$kode'");
		return $hsl;
	}

	function update_room_img_thumb($kode,$room_type,$img_thumb,$deskripsi,$room_rate){
		$hsl=$this->db->query("UPDATE compare SET type='$room_type',gambar_kotak='$img_thumb',detail='$deskripsi',rate='$room_rate' WHERE kd_compare='$kode'");
		return $hsl;
	}

	function update_room_no_img($kode,$room_type,$deskripsi,$room_rate){
		$hsl=$this->db->query("UPDATE compare SET type='$room_type',detail='$deskripsi',rate='$room_rate' WHERE kd_compare='$kode'");
		return $hsl;
	}

	function hapus_room($kode){
		$hsl=$this->db->query("DELETE FROM compare WHERE kd_compare='$kode'");
		return $hsl;
	}
}