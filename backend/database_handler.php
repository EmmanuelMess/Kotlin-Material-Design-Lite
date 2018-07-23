<?php
class DatabaseHandler {
    public static function buildDatabase() {
        //TODO build database
    }

    public static function getWeapon(int $id) {
        //TODO run query
        return new WeaponDTO($id, "frontend/assets/images/weapons/".$id.".jpg", "Titulo", "Algo descriptívo");
    }  

}


