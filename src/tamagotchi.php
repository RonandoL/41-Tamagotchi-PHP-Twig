<?php
    class Tamagotchi
    {
        private $name;

        function __construct($name)
        {
            $this->name = $name;
        }

        // Getters
        function getName()
        {
            return $this->name;
        }

        // Standards
        function save()
        {
            array_push($_SESSION['list_of_tamagotchis'], $this);
        }

        // GET ALL objects in the array
        static function getAll()
        {
            return $_SESSION['list_of_tamagotchis'];
        }

        // DELETE ALL objects in array - empty the array
        static function deleteAll()
        {
            $_SESSION['list_of_tamagotchis'] = array();
        }




    }

?>
