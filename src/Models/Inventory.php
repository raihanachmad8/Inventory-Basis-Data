<?php

class Inventory {
    private ?string $id_inventory = null;
    private ?string $id_detail = null;
    private ?string $name = null;
    private ?int $stock = null;
    public function __construct() {
        
    }   
    public function getIdInventory(): ?string
    {
        return $this->id_inventory;
    }
    public function setIdInventory(string $id_inventory): void
    {
        $this->id_inventory = $id_inventory;
    }
    public function getIdDetail(): ?string
    {
        return $this->id_detail;
    }
    public function setIdDetail(string $id_detail): void
    {
        $this->id_detail = $id_detail;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getStock(): ?int
    {
        return $this->stock;
    }
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }
    
}