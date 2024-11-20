<?php
class Reclamation {
    private $id;
    private $titre;
    private $type;
    private $contenu;

    public function __construct($titre, $type, $contenu) {
        $this->titre = $titre;
        $this->type = $type;
        $this->contenu = $contenu;
    }

    // Getters and setters for `id`
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getters and setters for `titre`
    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    // Getters and setters for `type`
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    // Getters and setters for `contenu`
    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }
}
?>
