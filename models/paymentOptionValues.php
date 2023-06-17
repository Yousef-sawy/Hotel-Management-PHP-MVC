<?php
include_once "DB.php";
include_once "paymentMethodOption.php";
include_once "MyBaseClass.php";

class paymentOptionValues extends MyBaseClass{
    private $Id;
    private $PaymentMethodOptionObj;
    private $Value;
    private $IdInfo;



    function __construct($id){

        if($id!="")
        {

            $conn=DB::getConnection();
            $sql="select * from paymentmethod_options_value where Id=".$id;
            $UserInfoDS=$conn->query($sql);
            $UserInfoObj=$UserInfoDS->fetch_assoc();
            $this->Id = $UserInfoObj['id'];
            $this->PaymentMethodOptionObj = new paymentMethodOption($UserInfoObj["paymentmethod_options_value_id"]);
            $this->Value = $UserInfoObj['value'];
            $this->IdInfo = new paymentMethod($UserInfoObj["id_info"]);

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
        $sql = "INSERT INTO paymentmethod_options_value (paymentmethod_options_value_id, value, id_info) VALUES ('".$this->PaymentMethodOptionObj->getId()."','$this->Value','".$this->IdInfo->getId()."')";
        $conn->query($sql);
    }
    function updateRecord() {
        $conn = DB::getConnection();
        $sql = "UPDATE paymentmethod_options_value SET paymentmethod_options_value_id='".$this->PaymentMethodOptionObj->getId()."', value='$this->Value', id_info='".$this->IdInfo->getId()."' WHERE id=".$this->Id;
        $conn->query($sql);
    }

    function deleteRecord() {
        $conn = DB::getConnection();
        $sql = "DELETE FROM paymentmethod_options_value WHERE id=".$this->Id;
        $conn->query($sql);
    }

    public static function getPaymentOptionValuesList($paymentMethodOptionId) {
        $conn = DB::getConnection();
        $sql = "SELECT * FROM paymentmethod_options_value WHERE paymentmethod_options_value_id = ".$paymentMethodOptionId;
        $result = $conn->query($sql);
        $paymentOptionValuesList = [];
        while ($row = $result->fetch_assoc()) {
            $paymentOptionValue = new paymentOptionValues($row['id']);
            $paymentOptionValuesList[] = $paymentOptionValue;
        }
        return $paymentOptionValuesList;
    }

    public function setId($id) {
        $this->Id = $id;
    }

    public function getId() {
        return $this->Id;
    }

    public function setPaymentMethodOptionObj($paymentmethod_options_value_id) {
        $this->PaymentMethodOptionObj = $paymentmethod_options_value_id;
    }

    public function getPaymentMethodOptionObj() {
        return $this->PaymentMethodOptionObj;
    }

    public function setValue($value) {
        $this->Value = $value;
    }

    public function getValue() {
        return $this->Value;
    }

    public function setIdInfo($idInfo) {
        $this->IdInfo = $idInfo;
    }

    public function getIdInfo() {
        return $this->IdInfo;
    }



}

/*
$paymentOptionValuesObj = new paymentOptionValues(4);
echo "ID: " . $paymentOptionValuesObj->getId() . "<br>";
echo "Payment Method Option Object ID: " . $paymentOptionValuesObj->getPaymentMethodOptionObj()->getId(). "<br>";
echo "Value: " . $paymentOptionValuesObj->getValue() . "<br>";
echo "ID Info: " . $paymentOptionValuesObj->getIdInfo()->getId(). "<br>";


echo "Unique ID: " . $paymentOptionValuesObj->getUniqueId() . "<br>";
echo "Created At: " . $paymentOptionValuesObj->getCreatedAt() . "<br>";
echo "Updated At: " . $paymentOptionValuesObj->getUpdatedAt() . "<br>";
echo "Deleted At: " . $paymentOptionValuesObj->getDeletedAt() . "<br>";
*/
?>