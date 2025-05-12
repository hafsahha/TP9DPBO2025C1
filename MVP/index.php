<?php

// Include the View (TampilMahasiswa)
include("view/TampilMahasiswa.php");

// Instantiate the View (delegates to Presenter)
$tp = new TampilMahasiswa();

// Add new data
if (isset($_POST['tambah'])) {
    // Gather data from the form
    $data = [
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp']
    ];
    // Call the method to add new student data
    $tp->tambahData($data);
    // Redirect back to index.php
    header("Location: index.php");
    exit;

} 
// Edit data
elseif (isset($_GET['edit'])) {
    // Get student ID for editing
    $id = $_GET['edit'];
    // Call the method to show student data for editing
    $tp->editData($id);

} 
// Update data
elseif (isset($_POST['update'])) {
    // Get student ID and updated data
    $id = $_POST['id'];
    $data = [
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl' => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email' => $_POST['email'],
        'telp' => $_POST['telp']
    ];
    // Call the method to update student data
    $tp->updateData($id, $data);
    // Redirect back to index.php
    header("Location: index.php");
    exit;

} 
// Delete data
elseif (isset($_GET['delete'])) {
    // Get student ID for deletion
    $id = $_GET['delete'];
    // Call the method to delete student data
    $tp->deleteData($id);
    // Redirect back to index.php
    header("Location: index.php");
    exit;

} else {
    // Default action: Display the list of students
    $tp->tampil();
}
?>
