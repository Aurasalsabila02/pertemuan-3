<?php 
    class Database{
        // properti
        public $host = "localhost";
        public $username = "root";
        public $password = "";
        public $database = "db_php";
        public $connect;

        function __construct()
        {
            $this->connect = mysqli_connect($this->host, $this->username, $this->password);
            mysqli_select_db($this->connect, $this->database);
                // pengujian koneksi
                // if($this->connect->connect_error){
                //    die("Koneksi Gagal: " . $this->connect->connect_error);
                // }
                // echo "Koneksi Berhasil!";
        }

        function tampilData(){
            $data = mysqli_query($this->connect, "SELECT * FROM tb_users");
            $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
            // var_dump($rows);
            return $rows;
        }

        function tambahData($nama, $jns_kelamin, $alamat, $nohp, $gambar){
            mysqli_query($this->connect, "INSERT INTO tb_users VALUES (NULL, '$nama', '$jns_kelamin', '$alamat', '$nohp', '$gambar')");
        }

        function editData($id){
            $data = mysqli_query($this->connect, "SELECT * FROM tb_users WHERE id=$id");
            $rows = mysqli_fetch_all($data, MYSQLI_ASSOC);
            return $rows;
        }

        function updateData($id, $nama, $jns_kelamin, $alamat, $nohp, $gambar){
            mysqli_query($this->connect, "UPDATE tb_users SET nama = '$nama', jns_kelamin = '$jns_kelamin', alamat = '$alamat', no_hp = '$nohp', gambar = '$gambar' WHERE tb_users.id = '$id'");
        }

        function hapusData($id){
            mysqli_query($this->connect, "DELETE FROM tb_users WHERE tb_users.id = '$id'");
        }

        

    }

?>