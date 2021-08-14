<?php

class User {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                UserId, Email, Address, Phone_number, Password, Username
            FROM
                User;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($id)
    {
        $statement = "
            SELECT 
                UserId, Email, Address, Phone_number, Password, Username
            FROM
                User
            WHERE UserId = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO User 
                (Email, Address, Phone_number, Password, Username)
            VALUES
                (:Email, :Address, :Phone_number, :Password, :Username);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Email' => $input['Email'],
                'Address' => $input['Address'],
                'Phone_number'  => $input['Phone_number'] ?? null,
                'Password' => $input['Password'],
                'Username' => $input['Username'] 
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE User
            SET 
                Email = :Email,
                Address  = :Address,
                Phone_number = :Phone_number,
                Password = :Password,
                Username = :Username
            WHERE UserId = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Email' => $input['Email'],
                'Address' => $input['Address'],
                'Phone_number'  => $input['Phone_number'] ?? null,
                'Password' => $input['Password'],
                'Username' => $input['Username'] 
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM User
            WHERE UserId = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array('id' => $id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
}
?>