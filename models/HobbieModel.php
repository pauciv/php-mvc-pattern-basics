<?php

class HobbieModel extends Model
{
    function get()
    {
        $query = $this->db->connect()->prepare("SELECT id, name, type
        FROM hobbies;");

        try {
            $query->execute();
            $hobbies = $query->fetchAll();
            return $hobbies;
        } catch (PDOException $e) {
            return [];
        }
    }

    function getById($id)
    {
        $query = $this->db->connect()->prepare("SELECT id, name, type
        FROM hobbies
        WHERE id = $id;");

        try {
            $query->execute();
            $hobbie = $query->fetch();
            return $hobbie;
        } catch (PDOException $e) {
            return [];
        }
    }

    function create($hobbie)
    {
        $query = $this->db->connect()->prepare("INSERT INTO hobbies (name, type)
        VALUES
        (?, ?);");

        $query->bindParam(1, $hobbie["name"]);
        $query->bindParam(2, $hobbie["type"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    function update($hobbie)
    {
        echo "update model";
        $query = $this->db->connect()->prepare("UPDATE hobbies
        SET name = ?, type = ?
        WHERE id = ?;");

        $query->bindParam(1, $hobbie["name"]);
        $query->bindParam(2, $hobbie["type"]);
        $query->bindParam(3, $hobbie["id"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    function delete($id)
    {
        $query = $this->db->connect()->prepare("DELETE FROM hobbies WHERE id = ?");
        $query->bindParam(1, $id);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
}
