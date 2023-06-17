<?php
include_once "DB.php";
include_once "MyBaseClass.php";
include_once "room.php";
include_once "booking.php";

class bookingDetails extends MyBaseClass{

private $Id;
private $IdOfBooking;
private $RoomId;
private $NumberOfRooms;
private $Price;


    function __construct($id){
        if($id!=""){
            $conn=DB::getConnection();
            $sql="select * from bookingdetails where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();
            

            $this->Id = $UserInfoObj['id'];
            $this->IdOfBooking = new booking($UserInfoObj["id_of_booking"]);
            $this->RoomId = new room($UserInfoObj["room_id"]);
            $this->NumberOfRooms = $UserInfoObj["number_of_rooms"];
            $this->Price = $UserInfoObj["price"];

            parent::__construct();
                $this->setUniqueId($UserInfoObj["unique_id"]);
                $this->setCreatedAt($UserInfoObj["created_at"]);
                $this->setUpdatedAt($UserInfoObj["updated_at"]);
                $this->setDeletedAt($UserInfoObj["deleted_at"]);
                $this->setIsDeleted($UserInfoObj["is_deleted"]);

        }
    }

    function insertNewRecord() {//'".$this->UserTypeObj->getId()."'
        $conn = DB::getConnection();
        $sql = "INSERT INTO booking (id_of_booking, room_id, number_of_rooms, price) VALUES ('".$this->IdOfBooking->getId()."','".$this->RoomId->getId()."', '$this->NumberOfRooms','$this->Price' )";
        $conn->query($sql);
    }
    
    public static function getBookingDetailsList() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM bookingdetails";
        $result = $conn->query($sql);
        $bookingDetailsList = array();
        while ($row = $result->fetch_assoc()) {
            $bookingDetails = new bookingDetails($row['id']);
            $bookingDetailsList[] = $bookingDetails;
        }
        return $bookingDetailsList;
    }

    public function setId($id) {
        $this->Id = $id;
    }
    
    public function getId() {
        return $this->Id;
    }
    
    public function setIdOfBooking($idOfBooking) {
        $this->IdOfBooking = new booking($idOfBooking);
    }
    
    public function getIdOfBooking() {
        return $this->IdOfBooking;
    }
    
    public function setRoomId($roomId) {
        $this->RoomId = new room($roomId);
    }
    
    public function getRoomId() {
        return $this->RoomId;
    }
    
    public function setNumberOfRooms($numberOfRooms) {
        $this->NumberOfRooms = $numberOfRooms;
    }
    
    public function getNumberOfRooms() {
        return $this->NumberOfRooms;
    }
    
    public function setPrice($price) {
        $this->Price = $price;
    }
    
    public function getPrice() {
        return $this->Price;
    }


}

/*
$bookingDetails = new bookingDetails(1); // replace 1 with the ID of the booking details you want to display
echo "<h1>Booking Details</h1>";
echo "<p><strong>ID:</strong> " . $bookingDetails->getId() . "</p>";
echo "<p><strong>ID of Booking:</strong> " . $bookingDetails->getIdOfBooking()->getId() . "</p>";
echo "<p><strong>Room ID:</strong> " . $bookingDetails->getRoomId()->getId() . "</p>";
echo "<p><strong>Number of Rooms:</strong> " . $bookingDetails->getNumberOfRooms() . "</p>";
echo "<p><strong>Price:</strong> " . $bookingDetails->getPrice() . "</p>";
echo "<p><strong>Created At:</strong> " . $bookingDetails->getCreatedAt() . "</p>";
echo "<p><strong>Updated At:</strong> " . $bookingDetails->getUpdatedAt() . "</p>";
echo "<p><strong>Deleted At:</strong> " . $bookingDetails->getDeletedAt() . "</p>";
*/
?>