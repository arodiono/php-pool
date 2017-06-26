<?php

class Core {

    public $map;
    public $users;

    private function __construct()
    {
        /// инициализация карты

//        $this->map = array(file_get_contents('map'));
    }

    public function createRoom($firstplayer)
    {
        include_once 'config.php';

        $sql = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
        $sql->set_charset('utf8');

        if ($sql->connect_error)
            die("Connection failed: " . $sql->connect_error);

        if ($sql->query("INSERT INTO `rooms`(`map`, `firstplayer`) VALUES ('$this->map', '$firstplayer')") === false)
            die("Insert failed: " . $sql->connect_error);

    }
}



?>