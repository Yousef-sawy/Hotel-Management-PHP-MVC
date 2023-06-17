<?php
class MyBaseClass {
    protected $UniqueId;
    protected $CreatedAt;
    protected $UpdatedAt;
    protected $DeletedAt;
    protected $IsDeleted;

    public function __construct() {
        // Constructor logic here
    }

    public function setUniqueId($unique_id){
        $this->UniqueId = $unique_id;
    }

    public function getUniqueId(){
        return $this->UniqueId;
    }

    public function setCreatedAt($created_at) {
        $this->CreatedAt = $created_at;
    }

    public function getCreatedAt() {
        return $this->CreatedAt;
    }

    public function setUpdatedAt($updated_at) {
        $this->UpdatedAt = $updated_at;
    }

    public function getUpdatedAt() {
        return $this->UpdatedAt;
    }

    public function setDeletedAt($deleted_at) {
        $this->DeletedAt = $deleted_at;
    }

    public function getDeletedAt() {
        return $this->DeletedAt;
    }

    public function setIsDeleted($is_deleted) {
        $this->IsDeleted = $is_deleted;
    }

    public function getIsDeleted() {
        return $this->IsDeleted;
    }
}

?>