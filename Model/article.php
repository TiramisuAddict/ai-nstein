<?php
class Article {
    // Propriétés de l'entité Article
    private $id;
    private $titre;
    private $image;
    private $auteur;
    private $contenu;
    private $date_creation;

    // Constructeur de la classe Article
    public function __construct($titre, $image, $auteur, $contenu, $date_creation = null) {
        $this->titre = $titre;
        $this->image = $image; // L'image peut être une chaîne (nom de fichier ou path)
        $this->auteur = $auteur;
        $this->contenu = $contenu;
        $this->date_creation = $date_creation ?: date("Y-m-d"); // Si pas de date, on prend la date actuelle
    }

    // Getters et Setters pour chaque propriété
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    public function getDateCreation() {
        return $this->date_creation;
    }

    public function setDateCreation($date_creation) {
        $this->date_creation = $date_creation;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }
}
?>
