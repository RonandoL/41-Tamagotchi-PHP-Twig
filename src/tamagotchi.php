<?php
    class Tamagotchi
    {
        private $name;
        private $age;
        private $feed;
        private $happiness;
        private $sleep;
        private $life;

        function __construct($name)
        {
            $this->name = $name;
            $this->age = 1;
            $this->feed = rand(3, 8);
            $this->happiness = rand(4, 10);
            $this->sleep = rand(3, 8);
            $this->life = true;
        }

        // AGE ALL Pets - Class method - for any given button action
        static function ageAll()
        {
            foreach ($_SESSION['list_of_tamagotchis'] as $tamagotchi) {
              $tamagotchi->age();
            }
        }

        function checkLife()
        {
            if ($this->age > 15 || $this->feed <= 0 || $this->happiness <= 0 || $this->sleep <= 0) {
              $this->life = false;
            }
            return $this->life;
        }

        // Button Actions
        function age()
        {
            $this->age += 1;
            $this->feed -=1;
            $this->happiness -= rand(1, 2);
            $this->sleep -= rand(1, 2);
        }

        function feed()
        {
            $this->feed += rand(4, 6);
        }

        function happiness()
        {
            $this->happiness += rand(3, 8);
        }

        function sleep()
        {
            $this->sleep += rand(5, 9);
        }

        // Getters ------------------------
        function getName()
        {
            return $this->name;
        }

        function getAge()
        {
            return $this->age;
        }

        function getFeed()
        {
            return $this->feed;
        }

        function getHappiness()
        {
            return $this->happiness;
        }

        function getSleep()
        {
            return $this->sleep;
        }

        function getLife()
        {
            return $this->life;
        }

        // Standards ------------------------
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
