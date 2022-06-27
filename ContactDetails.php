<?php

class ContactDetails
{

    public $firstName;
    public $lastName;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $phoneNumber;
    public $email;

    public function __construct($firstName, $lastName, $address, $city, $state, $zip, $phoneNumber, $email)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->address = $address;
        $this->city = $city;
        $this->state = $state;
        $this->zip = $zip;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
    }
    /**Initialising Getters and setters */

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }


    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }


    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
    }
    public function getZip()
    {
        return $this->zip;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


    /**Tostring menthod */

    public function __toString()
    {
        return "ContactDetails : \nName : " . $this->firstName . " " . $this->lastName . "\n"
            . "Address : " . $this->address . "\n"
            . "City : " . $this->city . "\n"
            . "State : " . $this->state . "\n"
            . "ZipCode : " . $this->zip . "\n"
            . "Phone Number : " . $this->phoneNumber . "\n"
            . "Email Id : " . $this->email . "\n";
    }
}