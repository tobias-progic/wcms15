<?php

class Person {

    protected $name;
    protected $birthdate;
    protected $gender;

    protected $rank;
    protected $spouse;
    const LEGAL_AGE = 18;
    const COMMONER = 0;
    const ROYALTY = 1;

    public function __construct($name, $birthdate, $gender) {
        $this -> name = $name;
        $this -> birthdate = $birthdate;
        $this -> gender = $gender;
        $this -> spouse = NULL;
        $this -> rank = self::COMMONER;
    }

    public function marry($spouse) {

        echo $this -> getName() . " -> marries (" . $spouse->getName() . ")\r\n";

        if ($this->getAge() < self::LEGAL_AGE) {
            echo "No marriage! " . $this->getName() . " is too young \r\n";
            return false;
        }

        if ($spouse->getAge() < self::LEGAL_AGE) {
            echo "No marriage! " . $spouse->getName() . " is too young \r\n";
            return false;
        }

        $marriage = false;

        if ($this -> spouse == NULL) {  //no spouse - ok to marry

            if ($spouse -> getSpouse() === NULL) {

                $this -> spouse = $spouse;
                $marriage = $spouse->marry($this);
                echo $this -> name . " is now married to " . $this -> spouse -> getName() . "\r\n";

            } else if ($spouse -> getSpouse() === $this) {  //These guys are alreadt married
                $marriage = true;
            }

        }

        return $marriage;

    }

    public function getSpouse() {
        return $this -> spouse;
    }

    public function getName() {
        return $this -> name . " (" . $this -> prettyRank() . ")";
    }

    public function getAge() {
        $birthdate = new DateTime($this->birthdate);
        $now = new DateTime();
        $age = $now->diff($birthdate);
        return $age->y; 

    }

    public function getRank() {
        return $this->rank;
    }

    public function makeBaby($maleName, $femaleName) {

        // Do "I" have a spouse whose gender is different from mine?
        if ($this -> getSpouse() != null && $this->getSpouse() -> gender != $this -> gender) {
            return $this->spawn($maleName, $femaleName);
        }

    }

    private function spawn($maleName, $femaleName) {

        $child;
        $gender = rand(0,1) == 0 ? "male" : "female";
        $now = new DateTime();
        $now = $now->format('Y-m-d');
        $name = ($gender == "male") ? $maleName : $femaleName;

        if ($this->rank == self::ROYALTY || $this->spouse->getRank() == self::ROYALTY) {
            if ($gender == "male") {
                $child = new Emperor($name, $now, $gender);
            } else {
                $child = new Empress($name, $now, $gender);
            }
        } else {
            $child = new Person($name, $now, $gender);
        }

        return $child;
    }

    private function prettyRank() {
        return $this->rank == self::COMMONER ? "commoner" : "royalty";
    }

}

?>