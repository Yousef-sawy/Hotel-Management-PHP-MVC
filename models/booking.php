<?php
include_once "DB.php";
include_once "user.php";
include_once "paymentMethod.php";
include_once "MyBaseClass.php";
include_once "bookingDetails.php";

class booking extends MyBaseClass{

private $Id;
private $GuestIdObj;
private $BookingDate;
private $DurationOfStay;
private $CheckInDate;
private $CheckOutDate;
private $BookingPaymentMethodObj;
private $TotalRoomsBooked;


    function __construct($id){
        if($id!="")
        {
            $conn=DB::getConnection();
            $sql="select * from booking where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();
            
            $this->Id = $UserInfoObj['id'];
            $this->GuestIdObj = new user($UserInfoObj["guest_id"]);
            $this->BookingDate = $UserInfoObj["booking_date"];
            $this->DurationOfStay = $UserInfoObj["duration_of_stay"];
            $this->CheckInDate = $UserInfoObj["check_in_date"];

            $this->CheckOutDate = $UserInfoObj["check_out_date"];
            $this->BookingPaymentMethodObj = new paymentMethod($UserInfoObj["booking_payment_method"]);
            $this->TotalRoomsBooked = $UserInfoObj["total_rooms_booked"];
            
            parent::__construct();
                $this->setUniqueId($UserInfoObj["unique_id"]);
                $this->setCreatedAt($UserInfoObj["created_at"]);
                $this->setUpdatedAt($UserInfoObj["updated_at"]);
                $this->setDeletedAt($UserInfoObj["deleted_at"]);
                $this->setIsDeleted($UserInfoObj["is_deleted"]);
        }
    }


    function insertNewRecord(){
        $conn = DB::getConnection();
        $sql = "INSERT INTO booking (guest_id, booking_date, duration_of_stay, check_in_date, check_out_date ,booking_payment_method,total_rooms_booked) VALUES ('".$this->GuestIdObj->getId()."', '$this->BookingDate', '$this->DurationOfStay', '$this->CheckInDate','$this->CheckOutDate','".$this->BookingPaymentMethodObj->getId()."','$this->TotalRoomsBooked')";
        $conn->query($sql);
    }
    
    function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE booking SET guest_id=".$this->GuestIdObj.", booking_date='$this->BookingDate', duration_of_stay='$this->DurationOfStay', check_in_date='$this->CheckInDate', check_out_date='$this->CheckOutDate', booking_payment_method=".$this->BookingPaymentMethodObj.", total_rooms_booked='$this->TotalRoomsBooked', WHERE id=".$this->Id;
        $conn->query($sql);
    }
    
    function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM booking WHERE id=".$this->Id;
        $conn->query($sql);
    }
    public static function getBookingList() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM booking";
        $result = $conn->query($sql);
        $bookingList = [];
        while ($row = $result->fetch_assoc()) {
            $booking = new booking($row['id']);
            $bookingList[] = $booking;
        }
        return $bookingList;
    }
    
    public static function getBookingById($id) {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM booking WHERE id = " . $id;
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $booking = new booking($row['id']);
            return $booking;
        }
        
        return null;
    }


    public function setId($id) {
        $this->Id = $id;
    }
    public function getId() {
        return $this->Id;
    }
    
    public function setGuestIdObj($guest_id) {
        $this->GuestIdObj = $guest_id;
    }
    public function getGuestIdObj() {
        return $this->GuestIdObj;
    }
    
    public function setBookingDate($booking_date) {
        $this->BookingDate = $booking_date;
    }
    public function getBookingDate() {
        return $this->BookingDate;
    }
    
    public function setDurationOfStay($duration_of_stay) {
        $this->DurationOfStay = $duration_of_stay;
    }
    public function getDurationOfStay() {
        return $this->DurationOfStay;
    }
    
    public function setCheckInDate($check_in_date) {
        $this->CheckInDate = $check_in_date;
    }
    public function getCheckInDate() {
        return $this->CheckInDate;
    }
    
    public function setCheckOutDate($check_out_date) {
        $this->CheckOutDate = $check_out_date;
    }
    public function getCheckOutDate() {
        return $this->CheckOutDate;
    }
    
    public function setBookingPaymentMethodObj($booking_payment_method) {
        $this->BookingPaymentMethodObj = $booking_payment_method;
    }
    public function getBookingPaymentMethodObj() {
        return $this->BookingPaymentMethodObj;
    }
    
    public function setTotalRoomsBooked($total_rooms_booked) {
        $this->TotalRoomsBooked = $total_rooms_booked;
    }
    public function getTotalRoomsBooked() {
        return $this->TotalRoomsBooked;
    }
    
    


}

/*
$user = new booking(1);
echo "Booking ID: " . $user->getBookingId() . "<br>";
echo "Guest ID: " . $user->getGuestIdObj()->getFullName() . "<br>";
echo "Booking Date: " . $user->getBookingDate() . "<br>";
echo "Duration of Stay: " . $user->getDurationOfStay() . "<br>";
echo "Check-in Date: " . $user->getCheckInDate() . "<br>";
echo "Check-out Date: " . $user->getCheckOutDate() . "<br>";
echo "Payment Method: " . $user->getBookingPaymentMethodObj()->getName() . "<br>";
echo "Total Rooms Booked: " . $user->getTotalRoomsBooked() . "<br>";
echo "Total Amount: " . $user->getTotalAmount() . "<br>";
echo "Unique ID: " . $user->getUniqueId() . "<br>";
echo "Created At: " . $user->getCreatedAt() ."<br>";
echo "Updated At: " . $user->getUpdatedAt() . "<br>";
echo "Deleted At: " . $user->getDeletedAt() . "<br>";
*/
?>