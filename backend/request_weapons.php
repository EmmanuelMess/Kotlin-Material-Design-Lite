<?php

include "utils/http_status_codes.php";
include "requestable_weapons.php";

$uOldId = isset($_GET["id"])? $_GET["id"]:"";
$uAmount = isset($_GET["amount"])? $_GET["amount"]:"";

if(!ctype_digit($uOldId) || intval($uOldId) < 0 ||
     !ctype_digit($uAmount) || intval($uAmount) <= 0) {
    http_response_code(HttpStatusCode::BAD_REQUEST);
    exit(0);
}

$oldId = intval($uOldId);
$amount = intval($uAmount);

$requestableWeaponRow = new RequestableWeapons($oldId, $amount);

$data = json_encode($requestableWeaponRow->getRequestable());

echo $data;
