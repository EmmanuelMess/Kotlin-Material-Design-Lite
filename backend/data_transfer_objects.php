<?php

class WeaponDTO {
    private $id;
    private $imageUrl;
    private $title;
    private $description;

    public function __construct(int $id, string $imageUrl, string $title, string $description) {
        $this->id = $id; 
        $this->imageUrl = $imageUrl;
        $this->title = $title;
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }
    
    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }
}
