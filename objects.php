<?php

class Person {
  //constructor function
  public function __construct($firstName = null, $lastName = null) {
    //any time a Person object is made, pass it a firstName and lastName, and then those can be accessed through $Person->firstName
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

  public function greet() {
    echo "Hi!  My name is $this->firstName $this->lastName!\n";
  }
}
$jessica = new Person("Jessica", "Heisel");
$jessica->greet();

class Student extends Person {
  //inheritance!  students are a child of Person, taking in first and last name and also a shcool name and id number.
  public function __construct($firstName = null, $lastName = null, $schoolName = null, $idNumber = null) {
    parent::__construct($firstName, $lastName);
    $this->schoolName = $schoolName;
    $this->idNumber = $idNumber;
  }

  public function giveSchoolInfo() {
    echo "I attend $this->schoolName and my school ID number is $this->idNumber.\n";
  }
}
$david = new Student("David", "Heisel", "Prime Digital Academy", "158051");
$david->greet();
$david->giveSchoolInfo();
?>
