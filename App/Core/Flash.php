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
        public function create_flash_message(string $name, string $message, string $type): void
        {
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
        public function display_flash_message(string $name, string $type): void
        {
            if (!isset($_SESSION[$type][$name])) {
                return;
            }

            // get message from the session
            $flash_message = $_SESSION[$type][$name];

            // delete the flash message
            unset($_SESSION[$type][$name]);

            // display the flash message
            echo format_flash_message($flash_message);
        }

    }

?>