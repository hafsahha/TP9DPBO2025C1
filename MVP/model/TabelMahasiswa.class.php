<?php

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Kelas yang berisikan tabel dari mahasiswa
class TabelMahasiswa extends DB
{
    // Fetch all mahasiswa data
    function getMahasiswa()
    {
        // Query MySQL to select all mahasiswa data
        $query = "SELECT * FROM mahasiswa";
        
        // Execute the query and return the result
        return $this->execute($query);
    }
    
    // Fetch one mahasiswa by ID
    function getMahasiswaById($id)
    {
        // Query to select a mahasiswa by ID
        $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
        
        // Execute the query and return the result
        return $this->execute($query);
    }

    // Add a new mahasiswa
    function addMahasiswa($nim, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        // Query to insert a new mahasiswa into the table
        $query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp)
                  VALUES ('$nim', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
        
        // Execute the query
        return $this->execute($query);
    }

    // Update an existing mahasiswa by ID
    function updateMahasiswa($id, $nim, $nama, $tempat, $tl, $gender, $email, $telp)
    {
        // Query to update mahasiswa data by ID
        $query = "UPDATE mahasiswa SET 
                    nim = '$nim', 
                    nama = '$nama', 
                    tempat = '$tempat', 
                    tl = '$tl', 
                    gender = '$gender', 
                    email = '$email', 
                    telp = '$telp' 
                  WHERE id = '$id'";

        // Execute the query
        return $this->execute($query);
    }

    // Delete a mahasiswa by ID
    function deleteMahasiswa($id)
    {
        // Query to delete a mahasiswa by ID
        $query = "DELETE FROM mahasiswa WHERE id = '$id'";
        
        // Execute the query
        return $this->execute($query);
    }
}
?>
