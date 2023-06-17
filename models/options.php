<?php
include_once "DB.php";
include_once "MyBaseClass.php";

class options extends MyBaseClass
{
    private $Id;
    private $Name;
    private $Type;




    function __construct($id){

        if($id!="")
        {

            $conn=DB::getConnection();
            $sql="select * from options where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();
            

            $this->Id = $UserInfoObj['id'];
            $this->Name = $UserInfoObj["name"];
            $this->Type = $UserInfoObj["type"];


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
        $sql = "INSERT INTO options (name,type) VALUES ('$this->Name','$this->Type')";
        $conn->query($sql);
    }
    function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM options WHERE id = '$this->Id'";
        $conn->query($sql);
    }

    function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE options SET name = '$this->Name', type = '$this->Type' WHERE id = '$this->Id'";
        $conn->query($sql);
    }
    
    public static function getOptionsList() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM options";
        $result = $conn->query($sql);
        $optionsList = [];
        while ($row = $result->fetch_assoc()) {
            $option = new options($row['id']);
            $optionsList[] = $option;
        }
        return $optionsList;
    }

    public function setId($id) {
        $this->Id = $id;
    }
    public function getId() {
        return $this->Id;
    }

    public function setType($type) {
        $this->Type = $type;
    }
    public function getType() {
        return $this->Type;
    }
    
    public function setName($name) {
        $this->Name = $name;
    }
    public function getName() {
        return $this->Name;
    }

    

}

/*
$optionsObj = new options(3); 

echo "ID: " . $optionsObj->getId() . "<br>";
echo "Name: " . $optionsObj->getName() . "<br>";
echo "Type: " . $optionsObj->getType() . "<br>";
echo "Unique ID: " . $optionsObj->getUniqueId() . "<br>";
echo "Created At: " . $optionsObj->getCreatedAt() . "<br>";
echo "Updated At: " . $optionsObj->getUpdatedAt() . "<br>";
echo "Deleted At: " . $optionsObj->getDeletedAt() . "<br>";
*/
?>