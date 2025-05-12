<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Include the View (TampilMahasiswa) and Presenter
include("view/TampilMahasiswa.php");

// Instantiate the View (delegates to Presenter)
$tp = new TampilMahasiswa();

if(isset($_POST['add_proses'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $tp->add($nim, $nama, $tempat, $tl, $gender, $email, $telp);
    $tp->tampil();
}else if(isset($_POST['update_proses'])){
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tempat = $_POST['tempat'];
    $tl = $_POST['tl'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $tp->update($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
    $tp->tampil();
}else if(isset($_POST['delete_proses'])){
    $id = $_POST['id'];
    $tp->hapus($id);   
    $tp->tampil();
}else if(isset($_GET['id_hapus'])){
    $id = $_GET['id_hapus'];
    $tp->delete($id); 
    $tp->tampil();
}else if(isset($_GET['id_edit'])){
    $id = $_GET['id_edit'];
    $tp->edit($id);
}else{
    $tp->tampil();
}