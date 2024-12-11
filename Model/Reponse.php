<?php
class Reponse {
    private $id;
    private $reclamation_id;
    private $reponse;
    private $created_at;

    public function __construct($reclamation_id, $reponse, $created_at = null) {
        $this->reclamation_id = $reclamation_id;
        $this->reponse = $reponse;
        $this->created_at = $created_at ? $created_at : date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getReclamationId() {
        return $this->reclamation_id;
    }

    public function setReclamationId($reclamation_id) {
        $this->reclamation_id = $reclamation_id;
    }

    public function getReponse() {
        return $this->reponse;
    }

    public function setReponse($reponse) {
        $this->reponse = $reponse;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}
?>
