<?php

include "database_handler.php";
include "data_transfer_objects.php";

class RequestableWeapon {
    private $array = array();
    public function __construct(WeaponDTO $weapon) {
        $this->array["imageUrl"] = $weapon->getImageUrl();
        $this->array["title"] = $weapon->getTitle();
        $this->array["description"] = $weapon->getDescription();
    }

    public function getRequestable() {
        return $this->array;
    }
}

class RequestableWeapons {
    private $rows = [];
    private $id;
    
    public function __construct(int $start, int $amount) {
        $this->id = $start + $amount;
        
        for($i = $start; $i < ($start + $amount); $i++) {
            $elem = DatabaseHandler::getWeapon($i);
            if($elem == null) {
                $this->id = $i+1;
                break;
            }
            $this->rows[] = (new RequestableWeapon($elem))->getRequestable();
        }
    }

    public function getRequestable() {
        return array("rows" => $this->rows, "id" => $this->id);
    }
}
