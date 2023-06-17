<?php
include_once "DB.php";
include_once "MyBaseClass.php";
include_once "room.php";

class roomFile extends MyBaseClass{
    private $Id;
    private $RoomIdObj;
    private $FilePath;


    function __construct($id){

        if($id!="")
        {

            $conn=DB::getConnection();
            $sql="select * from roomfile where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();
            $this->Id = $UserInfoObj['id'];
            $this->RoomIdObj = new room($UserInfoObj["room_id"]);
            $this->FilePath = $UserInfoObj["file_path"];

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
        $sql = "INSERT INTO roomfile (room_id,file_path) VALUES ('$this->RoomIdObj','$this->FilePath')";
        $conn->query($sql);
    }
    function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE roomfile SET room_id='$this->RoomIdObj', file_path='$this->FilePath' WHERE id=".$this->Id;
        $conn->query($sql);
    }

    function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM roomfile WHERE id=".$this->Id;
        $conn->query($sql);
    }

    public static function getRoomFileList() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM roomfile";
        $result = $conn->query($sql);
        $roomFileList = [];
        while ($row = $result->fetch_assoc()) {
            $roomFile = new roomFile($row['id']);
            $roomFileList[] = $roomFile;
        }
        return $roomFileList;
    }



    public function setId($id) {
        $this->Id = $id;
    }

    public function getId() {
        return $this->Id;
    }

    public function setRoomId($room_id) {
        $this->RoomIdObj = $room_id;
    }

    public function getRoomId() {
        return $this->RoomIdObj;
    }
    public function setFilePath($file_path) {
        $this->FilePath = $file_path;
    }

    public function getFilePath() {
        return $this->FilePath;
    }

    
}

/*
$roomFile = new roomFile(1);
echo "Id: " . $roomFile->getId() . "<br>";
echo "RoomId: " . $roomFile->getRoomId() . "<br>";
echo "FilePath: " . $roomFile->getFilePath() . "<br>";
*/
?>