<?php

class PayInformation {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                AccountNumber, BranchNumber, InstituteNumber, PayMethod_ID
            FROM
                PayInformation;
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
                AccountNumber, BranchNumber, InstituteNumber, PayMethod_ID
            FROM
                PayInformation
            WHERE Paymethod_ID = ?;
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
            INSERT INTO PayInformation 
                (AccountNumber, BranchNumber, InstituteNumber, PayMethod_ID)
            VALUES
                (:AccountNumber, :BranchNumber, :InstituteNumber, :PayMethod_ID);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'AccountNumber' => $input['AccountNumber'],
                'BranchNumber'  => $input['BranchNumber'],
                'InstituteNumber'  => $input['InstituteNumber'],
                'PayMethod_ID' => $input['PayMethod_ID']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE PayInformation
            SET 
                AccountNumber = :AccountNumber,
                BranchNumber  = :BranchNumber,
                InstituteNumber = :InstituteNumber
            WHERE Paymethod_ID = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'AccountNumber' => $input['AccountNumber'],
                'BranchNumber'  => $input['BranchNumber'],
                'InstituteNumber'  => $input['InstituteNumber']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM PayInformation
            WHERE Paymethod_ID = :id;
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