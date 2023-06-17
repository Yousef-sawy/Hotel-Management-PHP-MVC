<?php
include_once "DB.php";
include_once "MyBaseClass.php";

class paymentMethod extends MyBaseClass{


private $Id;
private $Name;



    function __construct($id){

        if($id!="")
        {

            $conn=DB::getConnection();
            $sql="select * from paymentmethod where Id=".$id;
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
        $sql = "INSERT INTO paymentmethod (name) VALUES ('$this->Name')";
        $conn->query($sql);
    }
    public function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM paymentmethod WHERE id = $this->Id";
        $conn->query($sql);
    }

    public function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE paymentmethod SET name = '$this->Name' WHERE id = $this->Id";
        $conn->query($sql);
    }
    public static function getPaymentMethodList() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM paymentmethod";
        $result = $conn->query($sql);
        $paymentMethodList = [];
        while ($row = $result->fetch_assoc()) {
            $paymentMethod = new paymentMethod($row['id']);
            $paymentMethodList[] = $paymentMethod;
        }
        return $paymentMethodList;
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
$paymentMethod = new paymentMethod(1);

echo "Payment Method ID: " . $paymentMethod->getId() . "<br>";
echo "Name: " . $paymentMethod->getName() . "<br>";
echo "Unique ID: " . $paymentMethod->getUniqueId() . "<br>";
echo "Created At: " . $paymentMethod->getCreatedAt() . "<br>";
echo "Updated At: " . $paymentMethod->getUpdatedAt() . "<br>";
echo "Deleted At: " . $paymentMethod->getDeletedAt() . "<br>";
*/


?>