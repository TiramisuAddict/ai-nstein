<?php
class User {
    private $id;
    private $username;
    private $email;
    private $pwd;
    private $itbackground;
    private $age;
    private $sexe;
    private $educationlvl;
    private $experience;
    private $filename;
    private $filedata;
    private $role;
    private $status;
    private $cdate;

    public function __construct($username, $email, $pwd, $itbackground, $age, $sexe, $educationlvl, $experience, $filename, $filedata, $role, $status) {
        $this->username = $username;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->itbackground = $itbackground;
        $this->age = $age;
        $this->sexe = $sexe;
        $this->educationlvl = $educationlvl;
        $this->experience = $experience;
        $this->filename = $filename;
        $this->filedata = $filedata;
        $this->role = $role;
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function setPwd($pwd) {
        $this->pwd = $pwd;
    }

    public function getItbackground() {
        return $this->itbackground;
    }

    public function setItbackground($itbackground) {
        $this->itbackground = $itbackground;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function getSexe() {
        return $this->sexe;
    }

    public function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    public function getEducationlvl() {
        return $this->educationlvl;
    }

    public function setEducationlvl($educationlvl) {
        $this->educationlvl = $educationlvl;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function setExperience($experience) {
        $this->experience = $experience;
    }

    public function getFilename() {
        return $this->filename;
    }

    public function setFilename($filename) {
        $this->filename = $filename;
    }

    public function getFiledata() {
        return $this->filedata;
    }

    public function setFiledata($filedata) {
        $this->filedata = $filedata;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getCdate() {
        return $this->cdate;
    }

    public function setCdate($cdate) {
        $this->cdate = $cdate;
    }
}
?>
