<?php

class PayMethod {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Paymethod_ID, Card_Number, CVV_Number, ExpireDate, DefaultCard, AutoManual, UserId, Payment_ID
            FROM
                PayMethod;
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
                Paymethod_ID, Card_Number, CVV_Number, ExpireDate, DefaultCard, AutoManual, UserId, Payment_ID
            FROM
                PayMethod
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
            INSERT INTO PayMethod 
                (Card_Number, CVV_Number, ExpireDate, DefaultCard, AutoManual, UserId, Payment_ID)
            VALUES
                (:Card_Number, :CVV_Number, :ExpireDate, :DefaultCard, :AutoManual, :UserId, :Payment_ID);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Card_Number' => $input['Card_Number'],
                'CVV_Number'  => $input['CVV_Number'],
                'ExpireDate'  => $input['ExpireDate'],
                'DefaultCard' => $input['DefaultCard'],
                'AutoManual'  => $input['AutoManual'],
                'UserId'  => $input['UserId'],
                'Payment_ID' => $input['Payment_ID']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE PayMethod
            SET 
                Card_Number = :Card_Number,
                CVV_Number  = :CVV_Number,
                ExpireDate = :ExpireDate,
                DefaultCard = :DefaultCard,
                AutoManual  = :AutoManual,
                UserId = :UserId,
                Payment_ID = :Payment_ID
            WHERE Paymethod_ID = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Card_Number' => $input['Card_Number'],
                'CVV_Number'  => $input['CVV_Number'],
                'ExpireDate'  => $input['ExpireDate'],
                'DefaultCard' => $input['DefaultCard'],
                'AutoManual'  => $input['AutoManual'],
                'UserId'  => $input['UserId'],
                'Payment_ID' => $input['Payment_ID']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM PayMethod
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