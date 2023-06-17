<?php
include_once "DB.php";
include_once "MyBaseClass.php";

class userType extends MyBaseClass
{
    private $Id;
    private $Name;




    function __construct($id){

        if($id!="")
        {

            $conn=DB::getConnection();
            $sql="select * from usertype where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();
            $this->Id = $UserInfoObj['id'];
            $this->Name = $UserInfoObj["name"];

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
        $sql = "INSERT INTO userType (name) VALUES ('$this->Name')";
        $conn->query($sql);
    }
    function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE usertype SET name='$this->Name' WHERE id=".$this->Id;
        $conn->query($sql);
    }

    function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM usertype WHERE id=".$this->Id;
        $conn->query($sql);
    }
    public static function getAllUserTypes() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM usertype WHERE name = 'guest'";
        $result = $conn->query($sql);
        $userTypes = array();
        while ($row = $result->fetch_assoc()) {
            $userTypes[$row['id']] = $row['name'];
        }
        return $userTypes;
    }

    public static function getAllUserAdmin() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM usertype";
        $result = $conn->query($sql);
        $userTypes = array();
        while ($row = $result->fetch_assoc()) {
            $userTypes[$row['id']] = $row['name'];
        }
        return $userTypes;
    }

	


    public function setId($id) {
        $this->Id = $id;
    }
    public function getId() {
        return $this->Id;
    }
    
    public function setName($name) {
        $this->Name = $name;
    }
    public function getName() {
        return $this->Name;
    }


}

/*
$userType = new userType(2); 

echo "User Type ID: " . $userType->getId() . "<br>";
echo "User Type Name: " . $userType->getName() . "<br>";
echo "User Type Unique ID: " . $userType->getUniqueId() . "<br>";
echo "User Type Created At: " . $userType->getCreatedAt() . "<br>";
echo "User Type Updated At: " . $userType->getUpdatedAt() . "<br>";
echo "User Type Deleted At: " . $userType->getDeletedAt() . "<br>";
*/


?>