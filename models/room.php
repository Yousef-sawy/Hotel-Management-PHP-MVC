<?php
include_once "roomType.php";
include_once "DB.php";
include_once "MyBaseClass.php";

class room extends MyBaseClass{

    private $Id;
    private $RoomCategoryObj;
    private $Price;
    private $RoomNumber;
    
    
    function __construct($id)
    {
        if($id!=""){
            $conn=DB::getConnection();
            $sql="select * from room where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();

            $this->Id=$UserInfoObj["id"];
            $this->RoomCategoryObj =new roomType($UserInfoObj["room_category"]);              
            $this->Price=$UserInfoObj["price"];
            $this->RoomNumber=$UserInfoObj["room_number"];

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
        $sql = "INSERT INTO room (room_category, price, room_number) VALUES ('".$this->RoomCategoryObj->getId()."', '$this->Price', '$this->RoomNumber')";
        $conn->query($sql);
    }
    function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE room SET room_category='".$this->RoomCategoryObj->getId()."', price='$this->Price', room_number='$this->RoomNumber' WHERE id=".$this->Id;
        $conn->query($sql);
    }

    function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM room WHERE id=".$this->Id;
        $conn->query($sql);
    }

    public static function getRoomList() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM room";
        $result = $conn->query($sql);
        $roomList = [];
        while ($row = $result->fetch_assoc()) {
            $room = new room($row['id']);
            $roomList[] = $room;
        }
        return $roomList;
    }
    public static function getRoomById($id) {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM room WHERE id=" . $id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $room = new room($row['id']);
            return $room;
        } else {
            return null;
        }
    }

    
    public function setId($id) {
        $this->Id = $id;
    }
    public function getId() {
        return $this->Id;
    }


    public function setRoomCategoryObj($room_category){
        $this->RoomCategoryObj=$room_category;
    }
    public function getRoomCategoryObj(){
        return $this->RoomCategoryObj;
    }

    public function setPrice($price){
        $this->Price=$price;
    }
    public function getPrice(){
        return $this->Price;
    }
    public function setRoomNumber($room_number) {
        $this->RoomNumber = $room_number;
    }
    public function getRoomNumber() {
        return $this->RoomNumber;
    }


}
/*
$user = new room(2);
echo "Room ID: " . $user->getId() . "<br>";
echo "Room Category: " . $user->getRoomCategoryObj()->getCategory() . "<br>";
echo "Price: " . $user->getPrice() . "<br>";
echo "Number of rooms: " . $user->getNumberOfRooms() . "<br>";
echo "Unique ID: " . $user->getUniqueId() . "<br>";
echo "Created At: " . $user->getCreatedAt() . "<br>";
echo "Updated At: " . $user->getUpdatedAt() . "<br>";
echo "Deleted At: " . $user->getDeletedAt() . "<br>";
*/

?>