<?php

class Guest
{
    protected $name;
    protected $date;

    public function __construct($name = null, $date = null){
        $this->name = $name;
        $this->date = date("Y-m-d, H:i:s");
    }

    public function leaveMessage($text) {
        echo "<h1>{$this->name}</h1><p>{$text}</p>";
        echo "<p>Message left: {$this->date}</p>";
    }
}

class Member extends Guest
{
    private $regDate;
    private $email;
    
    public function __construct($name = null, $date = null, $regDate = null, $email = null){
        parent::__construct($name, $date);
        $this->regDate;
        $this->email;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setRegDate($regDate){
        $this->regDate = $regDate;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function leaveMessage($text) {
        parent::leaveMessage($text);
        echo "<p>Registered: {$this->regDate}</p><hr><h6>{$this->email}</h6>";
    }
}

$guest = new Guest("Guest");

$guest->leaveMessage("Hello!");

$member = new Member("John");
$member->setRegDate("2011-2-3");
$member->setEmail("any@mail.com");

$member->leaveMessage("Hello World!");

$member = new Member("Member");
$member->setName("Michle");
$member->setRegDate("2015-2-8");
$member->setEmail("new@mail.com");

$member->leaveMessage("Test");