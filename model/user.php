<?php
class User {
	
	private $id;
	private $name; //fullname
	private $email;
	private $password;
	private $level;
	
	public function __construct() {
		//echo "Hello user\n";
	}
	
	# setters
	public function setId($id) {
		$this->id = $id;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function setEmail($email) {
		$this->email = $email;
	}
	public function setPassword($password) {
		$this->password = md5(trim($password));
	}
	public function setLevel($level) {
		$this->level = $level;
	}
	
	# getters
	public function getId() {
		return $this->id;
	}
	public function getName() {
		return $this->name;
	}
	public function getEmail() {
		return $this->email;
	}
	public function getPassword() {
		return $this->password;
	}
	public function getLevel() {
		return $this->level;
	}
}
?>
