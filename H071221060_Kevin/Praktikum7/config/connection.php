<?php

    //koneksi database
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "db_mahasiswa";

    //buat koneksi
    $connection = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($connection));

    Class Connection {

        public $connect;
    
        public function __construct()
        {
            $this->connect = mysqli_connect('$server', '$user', '$password');
    
            if($this->createDb()) {
                mysqli_select_db($this->connect,'$database');
                $this->createTbUser();
            }
        }
    
        private function createDb() {
            return mysqli_query($this->connect, "CREATE DATABASE IF NOT EXISTS " . '$database');
        }
    
        private function createTbUser(){
            $query = "CREATE TABLE IF NOT EXISTS user(
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR (255) NOT NULL,
                username VARCHAR (255) UNIQUE NOT NULL,
                email VARCHAR (255) UNIQUE NOT NULL,
                password VARCHAR (255) NOT NULL)";
    
            return mysqli_query($this->connect, $query);
        }
    }

?>