<?php
class Reclamation {
    private $id;
    private $titre;
    private $type;
    private $contenu;
    private $date; // Ajout de la propriété pour la date de réclamation

    // Constructeur pour initialiser les propriétés
    public function __construct($titre, $type, $contenu, $date = null) {
        $this->titre = $titre;
        $this->type = $type;
        $this->contenu = $contenu;
        $this->date = $date ? $date : date('Y-m-d H:i:s'); // Si la date n'est pas fournie, utiliser l'heure actuelle
    }

    // Getters et setters pour `id`
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getters et setters pour `titre`
    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    // Getters et setters pour `type`
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    // Getters et setters pour `contenu`
    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    // Getters et setters pour `date`
    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }
}
?>
