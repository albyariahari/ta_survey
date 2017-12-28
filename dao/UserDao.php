<?php

class UserDao {

    public function login(User $data) {
        $login_result = FALSE;

        $email = $data->getEmail();
        $password = $data->getPassword();
        $status = 1;

        try {
            $conn = Koneksi::get_koneksi();
            $sql = "SELECT * FROM user WHERE email=? AND password = MD5(?) AND status=?";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $password);
            $stmt->bindParam(3, $status);
            $stmt->execute();
            if ($stmt->rowCount() == 1) {//ada datanya
                while ($row = $stmt->fetch()) {
                    $_SESSION['is_logged_admin'] = TRUE;
                    $_SESSION['id_user'] = $row['id_user'];
                    $_SESSION['nama_user'] = $row['nama'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['role'] = $row['role'];
                    $login_result = TRUE;
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $login_result;
    }

    /*
    public function insertPegawai(\Pegawai $pegawai) {
        $result = FALSE;
        try {
            $conn = Koneksi::get_koneksi();
            $conn->beginTransaction();
            $sql = "INSERT INTO pegawai(nama_pegawai, bagian_pegawai, username_pegawai, password_pegawai, email_pegawai) VALUES(?,?,?,MD5(?),?)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(1, $pegawai->getNamaPegawai());
            $stmt->bindParam(2, $pegawai->getBagianPegawai());
            $stmt->bindParam(3, $pegawai->getUsernamePegawai());
            $stmt->bindParam(4, $pegawai->getPasswordPegawai());
            $stmt->bindParam(5, $pegawai->getEmailPegawai());
            $stmt->execute();
            $conn->commit();
            $result = TRUE;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die();
        }
        return $result;
    }
*/
    
}
