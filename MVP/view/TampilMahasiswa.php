<?php

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa {
    // Method for displaying the data
    public function tampil() {
        // Fetch data from presenter (ProsesMahasiswa)
        $proses = new ProsesMahasiswa();
        $proses->prosesDataMahasiswa();

        // Render data in the template
        $data = '';
        for ($i = 0; $i < $proses->getSize(); $i++) {
            $data .= "<tr>
                <td>" . ($i + 1) . "</td>
                <td>" . $proses->getNim($i) . "</td>
                <td>" . $proses->getNama($i) . "</td>
                <td>" . $proses->getTempat($i) . "</td>
                <td>" . $proses->getTl($i) . "</td>
                <td>" . $proses->getGender($i) . "</td>
                <td>" . $proses->getEmail($i) . "</td>
                <td>" . $proses->getTelp($i) . "</td>
                <td>
                    <a href='index.php?edit=" . $proses->getId($i) . "' class='btn btn-warning'>Edit</a>
                    <a href='index.php?delete=" . $proses->getId($i) . "' class='btn btn-danger'>Delete</a>
                </td>
            </tr>";
        }

        // Display the data in the table
        // Assume that 'DATA_TABEL' is the placeholder for this data in your HTML
        // This can be done by using the Template class, similar to your previous code
        $template = new Template("templates/skin.html");
        $template->replace("DATA_TABEL", $data);
        $template->write();
    }

    // Method to add Mahasiswa data (from $_POST)
    public function tambahData($data) {
        // Call the ProsesMahasiswa method to add the data to the database
        $proses = new ProsesMahasiswa();
        $proses->addMahasiswa($data);
    }

    // Method to edit Mahasiswa data (display form with data)
    public function editData($id) {
        $proses = new ProsesMahasiswa();
        $MahasiswaData = $proses->getMahasiswaById($id);

        // Pass data to the form view
        $template = new Template("templates/form_mahasiswa.php");
        $template->replace("id", $MahasiswaData['id']);
        $template->replace("nim", $MahasiswaData['nim']);
        $template->replace("nama", $MahasiswaData['nama']);
        $template->replace("tempat", $MahasiswaData['tempat']);
        $template->replace("tl", $MahasiswaData['tl']);
        $template->replace("gender", $MahasiswaData['gender']);
        $template->replace("email", $MahasiswaData['email']);
        $template->replace("telp", $MahasiswaData['telp']);
        $template->write();
    }

    // Method to update Mahasiswa data
    public function updateData($id, $data) {
        $proses = new ProsesMahasiswa();
        $proses->updateMahasiswa($id, $data);
    }

    // Method to delete Mahasiswa data
    public function deleteData($id) {
        $proses = new ProsesMahasiswa();
        $proses->deleteMahasiswa($id);
    }
}


?>
