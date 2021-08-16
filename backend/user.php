<?php

require_once ("employer.php");
require_once ("candidate.php");

class User {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function findAll()
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

    private function find($id)
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

    private function insert(Array $input)
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
            return $this->db->insert_id;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    private function update($id, Array $input)
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

    private function delete($id)
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

    public function processLogin($username, $password) {
        $candidate = new Candidate($this->db);
        $employer = new Employer($this->db);
        $passwordHash = md5($password);
        $query = "select * FROM User WHERE user_name = ? AND password = ?";
        $paramType = "ss";
        $paramArray = array($username, $passwordHash);
        $memberResult = $this->db->select($query, $paramType, $paramArray);
        if(!empty($memberResult)) {
            $userId = $memberResult[0]["UserId"];
            $_SESSION["userId"] = $userId;
            if(!empty($candidate->find($userId))) {
                $_SESSION["userGenre"] = "candidate";
            }
            if(!empty($employer->find($userId))) {
                $_SESSION["userGenre"] = "employer";
            }
            return true;
        }
        return false;
    }
}
?>