<?php

class Application {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                ApplicationStatus, ApplicationDate, Job_ID, Candidate_ID
            FROM
                Application;
        ";

        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($job_id, $candidate_id)
    {
        $statement = "
            SELECT 
                ApplicationStatus, ApplicationDate, Job_ID, Candidate_ID
            FROM
                Application
            WHERE Job_ID = ? AND Candidate_ID = ?;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($job_id, $candidate_id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function insert(Array $input)
    {
        $statement = "
            INSERT INTO Application 
                (ApplicationStatus, ApplicationDate, Job_ID, Candidate_ID)
            VALUES
                (:ApplicationStatus, :ApplicationDate, :Job_ID, :Candidate_ID);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'ApplicationStatus' => $input['ApplicationStatus'],
                'ApplicationDate' => $input['ApplicationDate'],
                'Job_ID'  => $input['Job_ID'],
                'Candidate_ID'  => $input['Candidate_ID']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($job_id, $candidate_id, Array $input)
    {
        $statement = "
            UPDATE Application
            SET 
                ApplicationStatus = :ApplicationStatus,
                ApplicationDate  = :ApplicationDate
            WHERE Job_ID = :Job_ID AND 'Candidate_ID' = :Candidate_ID;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'ApplicationStatus' => $input['ApplicationStatus'],
                'ApplicationDate' => $input['ApplicationDate'],
                'Job_ID'  => $input['Job_ID'],
                'Candidate_ID' => $input['Candidate_ID']
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($job_id, $candidate_id)
    {
        $statement = "
            DELETE FROM Application
            WHERE Job_ID = :Job_ID AND 'Candidate_ID' = :Candidate_ID;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($job_id, $candidate_id));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }
}
?>