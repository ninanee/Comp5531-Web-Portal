<?php

class Job {

    private $db = null;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function findAll()
    {
        $statement = "
            SELECT 
                Job_ID, Vacancies, JobStatus, Title, Description, Post_Date, Location, Employer_ID, GenreJob
            FROM
                Job;
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
                Job_ID, Vacancies, JobStatus, Title, Description, Post_Date, Location, Employer_ID, GenreJob
            FROM
                Job
            WHERE Job_ID = ?;
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
            INSERT INTO Job 
                (Vacancies, JobStatus, Title, Description, Location, Employer_ID, GenreJob)
            VALUES
                (:Vacancies, :JobStatus, :Title, :Description, :Location, :Employer_ID, :GenreJob);
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Vacancies' => $input['Vacancies'],
                'JobStatus' => $input['JobStatus'] ?? null,
                'Title'  => $input['Title'] ?? null,
                'Description' => $input['Description'] ?? null,
                'Location' => $input['Location'] ?? null,
                'Employer_ID' => $input['Employer_ID'],
                'GenreJob' => $input['GenreJob'],
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function update($id, Array $input)
    {
        $statement = "
            UPDATE Job
            SET 
                Vacancies = :Vacancies,
                JobStatus  = :JobStatus,
                Title = :Title,
                Description = :Description,
                Location = :Location,
                Employer_ID = :Employer_ID,
                GenreJob = :GenreJob
            WHERE Job_ID = :id;
        ";

        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'Vacancies' => $input['Vacancies'],
                'JobStatus' => $input['JobStatus'] ?? null,
                'Title'  => $input['Title'] ?? null,
                'Description' => $input['Description'] ?? null,
                'Location' => $input['Location'] ?? null,
                'Employer_ID' => $input['Employer_ID'],
                'GenreJob' => $input['GenreJob'],
            ));
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }    
    }

    public function delete($id)
    {
        $statement = "
            DELETE FROM Job
            WHERE Job_ID = :id;
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