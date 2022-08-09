<?php 

    namespace App\Core;

    class Connection {

        private $_conn;
        function __construct() {
            
            (new DotEnv('../.env'))->load();
            $this->_conn = new \mysqli(getenv("DB_HOST"), getenv("DB_USERNAME"), getenv("DB_PASSWORD"), getenv("DB_DATABASE"));
            return $this->_conn;

        }

        public function runquery(String $query){

            return $this->_conn->query($query);

        }

    }

?>