<?php
    class Tamagotchi
    {
        private $name;
        private $age;

        function __construct($name)
        {
            $this->name = $name;
            $this->age = 1;
        }

        // Getters
        function getName()
        {
            return $this->name;
        }

        function getAge()
        {
            return $this->age;
        }

        function age()
        {
            $this->age += 1;
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
