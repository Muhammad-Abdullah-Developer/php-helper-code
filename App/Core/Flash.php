<?php 

    namespace App\Core;
    
    class Flash{

        /**
         * Create a flash message
         *
         * @param string $name
         * @param string $message
         * @param string $type
         * @return void
         */
        public function create(string $name, string $message, string $type): void
        {
            $this->startSession();
            // remove existing message with the name
            if (isset($_SESSION[$type][$name])) {
                unset($_SESSION[$type][$name]);
            }
            // add the message to the session
            $_SESSION[$type][$name] = ['message' => $message, 'type' => $type];
        }


        /**
         * Display a flash message
         *
         * @param string $name
         * @param string $type 
         * @return void
         */
        public function show(string $name, string $type)
        {
            $this->startSession();
            if (!isset($_SESSION[$type][$name])) {
                return;
            }

            // get message from the session
            $flash_message = $_SESSION[$type][$name];

            // delete the flash message
            unset($_SESSION[$type][$name]);

            // display the flash message
            return $flash_message;
        }

        private function startSession(){
            if(session_status() == "PHP_SESSION_DISABLED"){
                session_start();
            }
        }

    }

?>