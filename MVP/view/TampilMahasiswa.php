<?php

include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
    private $prosesmahasiswa; // Presenter that interacts with the view
    private $tpl;

    function __construct()
    {
        // Instantiate the Presenter
        $this->prosesmahasiswa = new ProsesMahasiswa($this);
    }

    function tampil()
    {
        // Get all mahasiswa data from Presenter
        $this->prosesmahasiswa->prosesDataMahasiswa();
        $data = '';
        $form = '';

        // Generate table rows from the data
        for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
            $no = $i + 1;
            $data .= "<tr>
                <td>{$no}</td>
                <td>" . $this->prosesmahasiswa->getNim($i) . "</td>
                <td>" . $this->prosesmahasiswa->getNama($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTl($i) . "</td>
                <td>" . $this->prosesmahasiswa->getGender($i) . "</td>
                <td>" . $this->prosesmahasiswa->getEmail($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTelp($i) . "</td>
                <td>
                     <a href='index.php?id_edit=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-warning btn-sm'>Edit</a>
                    <a href='index.php?id_hapus=" . $this->prosesmahasiswa->getId($i) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                </td>
            </tr>";
        }

        $form = "
            <form method='POST' action='index.php'>
                <div class='form-group'>
                    <label for='nim'>NIM:</label>
                    <input type='text' class='form-control' id='nim' name='nim' required>
                </div>
                <div class='form-group'>
                    <label for='nama'>Nama:</label>
                    <input type='text' class='form-control' id='nama' name='nama' required>
                </div>
                <div class='form-group'>
                    <label for='tempat'>Tempat Lahir:</label>
                    <input type='text' class='form-control' id='tempat' name='tempat' required>
                </div>
                <div class='form-group'>
                    <label for='tl'>Tanggal Lahir:</label>
                    <input type='date' class='form-control' id='tl' name='tl' required>
                </div>
                <div class='form-group'>
                    <label for='gender'>Gender:</label>
                    <select class='form-control' id='gender' name='gender' required>
                        <option value='L'>Laki-laki</option>
                        <option value='P'>Perempuan</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for='email'>Email:</label>
                    <input type='email' class='form-control' id='email' name='email' required>
                </div>
                <div class='form-group'>
                    <label for='telp'>Telepon:</label>
                    <input type='text' class='form-control' id='telp' name='telp' required>
                </div>
                <button type='submit' name='add_proses' class='btn btn-primary'>Submit</button>
            </form>
        ";

        // Set the table data
        $this->tpl = new Template("templates/skin.html");
        $this->tpl->replace("DATA_TABEL", $data);
        $this->tpl->replace("FORM_TAMBAH", $form);
        // Display the page
        $this->tpl->write();
    }

    function tampilEditForm($id)
    {
        // Get all the student data for editing
        $this->prosesmahasiswa->prosesDataMahasiswa();
    
        // Find the student with the matching ID
        $studentData = null;
        for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
            if ($this->prosesmahasiswa->getId($i) == $id) {
                $studentData = [
                    'id' => $this->prosesmahasiswa->getId($i),
                    'nim' => $this->prosesmahasiswa->getNim($i),
                    'nama' => $this->prosesmahasiswa->getNama($i),
                    'tempat' => $this->prosesmahasiswa->getTempat($i),
                    'tgl_lahir' => $this->prosesmahasiswa->getTl($i),
                    'gender' => $this->prosesmahasiswa->getGender($i),
                    'email' => $this->prosesmahasiswa->getEmail($i),
                    'telepon' => $this->prosesmahasiswa->getTelp($i)
                ];
                break; // Break the loop once the student is found
            }
        }
    
        // If student is not found, return or handle the error
        if (!$studentData) {
            echo "Student not found!";
            return;
        }
    
        // Render the edit form with student data
        $form = "
            <form method='POST' action='index.php'>
                <div class='form-group'>
                    <label for='nim'>NIM:</label>
                    <input type='text' class='form-control' id='nim' name='nim' value='" . $studentData['nim'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='nama'>Nama:</label>
                    <input type='text' class='form-control' id='nama' name='nama' value='" . $studentData['nama'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='tempat'>Tempat Lahir:</label>
                    <input type='text' class='form-control' id='tempat' name='tempat' value='" . $studentData['tempat'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='tl'>Tanggal Lahir:</label>
                    <input type='date' class='form-control' id='tl' name='tl' value='" . $studentData['tgl_lahir'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='gender'>Gender:</label>
                    <select class='form-control' id='gender' name='gender' required>
                        <option value='L'" . ($studentData['gender'] == 'L' ? ' selected' : '') . ">Laki-laki</option>
                        <option value='P'" . ($studentData['gender'] == 'P' ? ' selected' : '') . ">Perempuan</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for='email'>Email:</label>
                    <input type='email' class='form-control' id='email' name='email' value='" . $studentData['email'] . "' required>
                </div>
                <div class='form-group'>
                    <label for='telp'>Telepon:</label>
                    <input type='text' class='form-control' id='telp' name='telp' value='" . $studentData['telepon'] . "' required>
                </div>
                <input type='hidden' name='id' value='" . $studentData['id'] . "'>
                <button type='submit' name='update_proses' class='btn btn-primary'>Update Mahasiswa</button>
            </form>
        ";
    
        // Load the template and replace the form
        $this->tpl = new Template("templates/edit.html");
        $this->tpl->replace("FORM_EDIT", $form);
        $this->tpl->write();
    }
    

    // Handle add request
    function add($nim, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        $this->prosesmahasiswa->addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp);
    }

    // Handle delete request
    function delete()
    {
        
        $this->prosesmahasiswa->deleteMahasiswa($_GET['id_hapus']);
    }

    function hapus($id)
    {   
        $this->delete($id);
    }

    function edit($id)
    {
        $this->tampilEditForm($id);
    }
    // Handle edit request
    function update($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        $this->prosesmahasiswa->editMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp);
    }
}
?>
