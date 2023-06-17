<?php
include_once "DB.php";
include_once "MyBaseClass.php";



class roomType extends MyBaseClass{
    private $Id;
    private $Category;
    
    function __construct($id){

        if($id!="")
        {

            $conn=DB::getConnection();
            $sql="select * from roomtype where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();

            $this->Id = $UserInfoObj['id'];
            $this->Category = $UserInfoObj["category"];
            
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
        $sql = "INSERT INTO roomtype (category) VALUES ('$this->Category')";
        $conn->query($sql);
    }
    function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE roomtype SET category='$this->Category' WHERE id=".$this->Id;
        $conn->query($sql);
    }

    function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM roomtype WHERE id=".$this->Id;
        $conn->query($sql);
    }

    public static function getRoomTypeList() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM roomtype";
        $result = $conn->query($sql);
        $roomTypeList = [];
        while ($row = $result->fetch_assoc()) {
            $roomType = new roomType($row['id']);
            $roomTypeList[] = $roomType;
        }
        return $roomTypeList;
    }


    public function setId($id) {
        $this->Id = $id;
    }

    public function getId() {
        return $this->Id;
    }

    public function setCategory($category) {
        $this->Category = $category;
    }

    public function getCategory() {
        return $this->Category;
    }

}
/*
$roomType = new roomType(3);
echo "Room Type ID: " . $roomType->getId() . "<br>";
echo "Category: " . $roomType->getCategory() . "<br>";
echo "Unique ID: " . $roomType->getUniqueId() . "<br>";
echo "Created At: " . $roomType->getCreatedAt() . "<br>";
echo "Updated At: " . $roomType->getUpdatedAt() . "<br>";
echo "Deleted At: " . $roomType->getDeletedAt() . "<br>";
*/
?>