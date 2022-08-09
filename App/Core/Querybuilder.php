<?php 

    namespace App\Core;

    use App\Core\Connection;
    class Querybuilder{

        private $_conn;

        private $_table;
        private $_pk;
        private $_stm;

        // Querry Data 
        private $_id;
        private $_conditions;
        private $_columns;

        function __construct($table) {

            $this->_conn = new Connection();
            $this->_table = $table;
            $this->_setPrimaryKey();

        }


        private function _setPrimaryKey(){
            $qrr = "SHOW KEYS FROM $this->_table WHERE Key_name = 'PRIMARY'";
            $this->_pk = $this->_conn->runquery($qrr)->fetch_array()["Column_name"];
        }


        
        public function find(int $id, $columns = ["*"]){

            $this->where($this->_pk, "=", $id);
            return $this;
        }

        public function where(...$condition){

            $this->_columns = ["*"];
            if( count($condition) > 3){
                throw new Exception("More than 3 arguments");
            }else{
                if(empty($this->_conditions)){
                    $this->_conditions = implode("",$condition);
                }else{
                    $this->_conditions = " AND ".implode("",$condition);
                }
            }
            return $this;

        }

        public function orWhere(...$condition){

            $this->_columns = ["*"];
            if( count($condition) > 3){
                throw new Exception("More than 3 arguments");
            }else{
                if(empty($this->_conditions)){
                    $this->_conditions = implode("",$condition);
                }else{
                    $this->_conditions = " OR " . implode("",$condition);
                }
            }
            return $this;
        }

        public function get(){
            if(!empty($this->_conditions)){
                $this->_stm = "SELECT ".implode(",", $this->_columns) . " FROM {$this->_table} WHERE " . $this->_conditions;
            }
            return $this->_stm;
        }

  
    }

?>