<?php

class MySQL {
    private $db;
    private $base;
    public function MySQL($host, $user, $pass) {
        $this->db = @mysql_connect($host, $user, $pass);
    }
    public function setBase($base) {
        $this->base = $base;
    }
    public function getBase() {
        return $this->base;
    }
    public function run() {
        @mysql_select_db($this->base);
        mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    }
    public function bye() { @mysql_close(); }
}
?>