<?php
class Depot 
{
    private $depot_id;
    private $exercise_id;
    private $deposit_date;
    private $uploaded_file;

    public function __construct($exercise_id, $deposit_date, $uploaded_file) 
    {
        $this->exercise_id = $exercise_id;
        $this->deposit_date = $deposit_date;
        $this->uploaded_file = $uploaded_file;
    }

    public function getDepotId() 
    {
        return $this->depot_id;
    }

    public function setDepotId($depot_id) 
    {
        $this->depot_id = $depot_id;
    }

    public function getExerciseId() 
    {
        return $this->exercise_id;
    }

    public function setExerciseId($exercise_id) 
    {
        $this->exercise_id = $exercise_id;
    }

    public function getDepositDate() 
    {
        return $this->deposit_date;
    }

    public function setDepositDate($deposit_date) 
    {
        $this->deposit_date = $deposit_date;
    }

    public function getUploadedFile() 
    {
        return $this->uploaded_file;
    }

    public function setUploadedFile($uploaded_file) 
    {
        $this->uploaded_file = $uploaded_file;
    }
}
?>
