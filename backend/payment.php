<?php

class Payment {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Payment_ID, Amount, PaymentCreateDate, UserId
            FROM
                Payment;
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
                Payment_ID, Amount, PaymentCreateDate, UserId
            FROM
                Payment
            WHERE Payment_ID = ?;
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
            INSERT INTO Payment 
                (Amount, PaymentCreateDate, UserId)
            VALUES
                (:Amount, :PaymentCreateDate, :UserId);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Amount' => $input['Amount'],
                'PaymentCreateDate'  => $input['PaymentCreateDate'],
                'UserId'  => $input['UserId']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE Payment
            SET 
                Amount = :Amount,
                PaymentCreateDate  = :PaymentCreateDate,
                UserId = :UserId
            WHERE Payment_ID = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Amount' => $input['Amount'],
                'PaymentCreateDate'  => $input['PaymentCreateDate'],
                'UserId'  => $input['UserId']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM Payment
            WHERE Payment_ID = :id;
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