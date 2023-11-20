<?php

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Models/Inventory.php';

interface InventoryRepositoryInterface {
    public static function getAll(): array;
    public static function getById(string $id): ?Inventory;
    public static function create(Inventory $inventory): void;
    public static function update(Inventory $inventory): void;
    public static function delete(string $id): void;
    public static function getByName(string $name): ?Inventory;
}

class InventoryRepository  implements InventoryRepositoryInterface{
    public static function getAll(): array
    {
        $statement = Database::getConnection()->prepare('SELECT * FROM inventory');
        $statement->execute();

        $inventory = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $item = new Inventory();
            $item->setIdInventory($row['ID_Inventory']);
            $item->setIdDetail($row['ID_DetailInv']);
            $item->setName($row['Name']);
            $item->setStock($row['Stock']);
            array_push($inventory, $item);
        }

        return $inventory;
    }

    public static function getById(string $id): ?Inventory
    {
        $statement = Database::getConnection()->prepare('SELECT * FROM inventory WHERE ID_Inventory = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $item = new Inventory();
        $item->setIdInventory($row['ID_Inventory']);
        $item->setIdDetail($row['ID_DetailInv']);
        $item->setName($row['Name']);
        $item->setStock($row['Stock']);

        return $item;
        
    }

    public static function create(Inventory $inventory): void
    {
        $statement = Database::getConnection()->prepare('INSERT INTO inventory (ID_Inventory, ID_DetailInv, Name, Stock) VALUES (:id_inventory, :id_detail, :name, :stock)');
        $statement->bindParam(':id_inventory', $inventory->getIdInventory());
        $statement->bindParam(':id_detail', $inventory->getIdDetail());
        $statement->bindParam(':name', $inventory->getName());
        $statement->bindParam(':stock', $inventory->getStock());
        $statement->execute();

    }

    public static function update(Inventory $inventory): void
    {
        $statement = Database::getConnection()->prepare('UPDATE inventory SET ID_DetailInv = :id_detail, Name = :name, Stock = :stock WHERE ID_Inventory = :id');
        $statement->bindParam(':id', $inventory->getIdInventory());
        $statement->bindParam(':id_detail', $inventory->getIdDetail());
        $statement->bindParam(':name', $inventory->getName());
        $statement->bindParam(':stock', $inventory->getStock());
        $statement->execute();
    }

    public static function delete(string $id): void
    {
        $statement = Database::getConnection()->prepare('DELETE FROM inventory WHERE ID_Inventory = :id');
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    public static function getByName(string $name): ?Inventory
    {
        $statement = Database::getConnection()->prepare('SELECT * FROM inventory WHERE Name = :name');
        $statement->bindParam(':name', $name);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }
        $item = new Inventory();
        $item->setIdInventory($row['ID_Inventory']);
        $item->setIdDetail($row['ID_DetailInv']);
        $item->setName($row['Name']);
        $item->setStock($row['Stock']);
        return $item;
    }
}