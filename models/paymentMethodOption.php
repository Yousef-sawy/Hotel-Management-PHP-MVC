<?php
include_once "DB.php";
include_once "paymentMethod.php";
include_once "MyBaseClass.php";

include_once "options.php";

class paymentMethodOption extends MyBaseClass{
    private $Id;
    private $PaymentIdObj;
    private $OptionIdObj;

    

    function __construct($id){

        if($id!="")
        {

            $conn=DB::getConnection();
            $sql="select * from paymentmethodoptions where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();
            $this->Id = $UserInfoObj['id'];
            $this->PaymentIdObj = new paymentMethod($UserInfoObj["payment_id"]);
            $this->OptionIdObj = new options($UserInfoObj["option_id"]);

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
        $sql = "INSERT INTO paymentmethodoptions (payment_id, option_id) VALUES ('".$this->PaymentIdObj->getId()."','".$this->OptionIdObj->getId()."')";
        $conn->query($sql);
    }

    function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE paymentmethodoptions SET payment_id='".$this->PaymentIdObj->getId()."', option_id='".$this->OptionIdObj->getId()."' WHERE id=".$this->Id;
        $conn->query($sql);
    }

    function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM paymentmethodoptions WHERE id=".$this->Id;
        $conn->query($sql);
    }

    public static function getPaymentMethodList() {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM payment_method";
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
    
    public function setPaymentIdObj($payment_id){
        $this->PaymentIdObj =$payment_id;
    }
    public function getPaymentIdObj(){
        return $this->PaymentIdObj;
    }
    public function setOptionIdObj($option_id ){
        $this->OptionIdObj =$option_id ;
    }
    public function getOptionIdObj(){
        return $this->OptionIdObj;
    }





}
/*
$paymentMethodOption = new paymentMethodOption(2);

echo "Payment Method Option ID: " . $paymentMethodOption->getId() . "<br>";
echo "Payment Method ID: " . $paymentMethodOption->getPaymentIdObj()->getId() . "<br>";
echo "Option ID: " . $paymentMethodOption->getOptionIdObj()->getId() . "<br>";
echo "Unique ID: " . $paymentMethodOption->getUniqueId() . "<br>";
echo "Created At: " . $paymentMethodOption->getCreatedAt() . "<br>";
echo "Updated At: " . $paymentMethodOption->getUpdatedAt() . "<br>";
echo "Deleted At: " . $paymentMethodOption->getDeletedAt() . "<br>";
*/

?>