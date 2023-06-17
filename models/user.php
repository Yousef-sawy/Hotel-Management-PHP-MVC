<?php

include_once "DB.php";
include_once "userType.php";
include_once "MyBaseClass.php";


class user extends MyBaseClass{

        private $Id;
        private $FullName;
        private $UserTypeObj;//1 to many 
        private $DOB;
        private $Email;
        private $Password;

    
    function __construct($id)
        {
            if ($id!="")
            {
                $conn = DB::getConnection();
                $sql="select * from user where Id=".$id;
                $UserInfoDS=$conn->query($sql);
                $UserInfoObj=$UserInfoDS->fetch_assoc();
                $this->Id = $UserInfoObj['id'];
                $this->FullName = $UserInfoObj['full_name'];
                $this->DOB = $UserInfoObj['DOB'];
                $this->Email = $UserInfoObj['email'];
                $this->Password = $UserInfoObj['password'];
                $this->UserTypeObj =new userType($UserInfoObj["user_type"]);

                parent::__construct();
                $this->setUniqueId($UserInfoObj["unique_id"]);
                $this->setCreatedAt($UserInfoObj["created_at"]);
                $this->setUpdatedAt($UserInfoObj["updated_at"]);
                $this->setDeletedAt($UserInfoObj["deleted_at"]);
                $this->setIsDeleted($UserInfoObj["is_deleted"]);

            }
        }
        
    
        
        
        function insertNewRecord() {
            $conn = DB::getConnection();
            $sql = "INSERT INTO user (full_name, DOB, password, Email, user_type) VALUES ('$this->FullName', '$this->DOB', '$this->Password', '$this->Email', '".$this->UserTypeObj->getId()."')";
            $conn->query($sql);
        }
        function updateRecord() {
            $conn = DB::getConnection();
            $sql = "UPDATE user SET full_name='$this->FullName', DOB='$this->DOB', password='$this->Password', email='$this->Email', user_type='".$this->UserTypeObj->getId()."' WHERE id=".$this->Id;
            $conn->query($sql);
        }
    
        function deleteRecord() {
            $conn = DB::getConnection();
            $sql = "DELETE FROM user WHERE id=".$this->Id;
            $conn->query($sql);
        }
    
        public static function getUserList() {
            $conn = DB::getConnection();
            $sql = "SELECT * FROM user";
            $result = $conn->query($sql);
            $userList = [];
            while ($row = $result->fetch_assoc()) {
                $user = new user($row['id']);
                $userList[] = $user;
            }
            return $userList;
        }
        public static function getGuestList() {
            $conn = DB::getConnection();
            $sql = "SELECT * FROM user WHERE user_type = 1";
            $result = $conn->query($sql);
            $guestList = [];
            while ($row = $result->fetch_assoc()) {
                $guest = new user($row['id']);
                $guestList[] = $guest;
            }
            return $guestList;
        }

        public static function getUserById($id) {
            $conn = DB::getConnection();
            $sql = "SELECT * FROM user WHERE id = " . $id;
            $result = $conn->query($sql);
        
            if ($result && $result->num_rows > 0) {
                $userInfoObj = $result->fetch_assoc();
                $user = new user($userInfoObj['id']);
                $user->setFullName($userInfoObj['full_name']);
                $user->setDOB($userInfoObj['DOB']);
                $user->setEmail($userInfoObj['email']);
                $user->setPassword($userInfoObj['password']);
                $user->setUniqueId($userInfoObj["unique_id"]);
                $user->setCreatedAt($userInfoObj["created_at"]);
                $user->setUpdatedAt($userInfoObj["updated_at"]);
                $user->setDeletedAt($userInfoObj["deleted_at"]);
        
                return $user;
            }
        
            return null; // User with the specified ID not found
        }

    
        public static function isDataExists($email, $password) {
            $conn = DB::getConnection();
            $sql = "SELECT id FROM user WHERE email = '$email' AND password = '$password'";
            $result = $conn->query($sql);
        
            if ($result && $result->num_rows > 0) {
                return true; // Data exists in the database
            }
            return false; // Data does not exist in the database
        }
    

    public function setId($id) {
        $this->Id = $id;
    }
    public function getId() {
        return $this->Id;
    }


    public function setFullName($full_name) {
        $this->FullName = $full_name;
    }
    public function getFullName() {
        return $this->FullName;
    }


    public function setUserTypeObj($user_type) {
        $this->UserTypeObj = new userType($user_type);
    }
    public function getUserTypeObj() {
        return $this->UserTypeObj;
    }

    public function setDOB($DOB) {
        $this->DOB = $DOB;
    }
    public function getDOB() {
        return $this->DOB;
    }

    public function setEmail($email) {
        $this->Email = $email;
    }
    
    public function getEmail() {
        return $this->Email;
    }
    
    
    public function setPassword($password) {
        $this->Password = $password;
    }
    
    public function getPassword() {
        return $this->Password;
    }
    


}

/*
$user = new user(1);
echo "User ID: " . $user->getId() . "<br>";
echo "Full Name: " . $user->getFullName() . "<br>";
echo "Date of Birth: " . $user->getDOB() . "<br>";
echo "User Type: " . $user->getUserTypeObj()->getName() . "<br>";
echo "Unique ID: " . $user->getUniqueId() . "<br>";
echo "Created At: " . $user->getCreatedAt() . "<br>";
echo "Updated At: " . $user->getUpdatedAt() . "<br>";
echo "Deleted At: " . $user->getDeletedAt() . "<br>";
echo $user->getEmail() . "<br>";
echo $user->getPassword() . "<br>";

*/

?>