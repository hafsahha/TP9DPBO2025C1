<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

interface KontrakView{
	public function tampil();
	public function add($nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function edit($id);
	public function update($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
	public function hapus($id);
	public function delete();
}
?>