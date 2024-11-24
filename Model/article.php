<?php
class Article {
    // Propriétés de l'entité Article
    private $id;
    private $titre;
    private $contenu;
    private $image;
    private $auteur;
    private $date_creation;

    // Constructeur de la classe Article
    public function __construct($titre, $contenu, $image, $auteur, $date_creation = null) {
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->image = $image; 
        $this->auteur = $auteur;
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

    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
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


    public function updateArticle($id, $titre, $contenu, $auteur, $date_creation, $image = null) {
        $sql = "UPDATE articles SET titre = :titre, contenu = :contenu, auteur = :auteur, date_creation = :date_creation";

        // Si une image est téléchargée, on l'ajoute
        if ($image) {
            $sql .= ", image = :image";
        }

        $sql .= " WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':auteur', $auteur);
        $stmt->bindParam(':date_creation', $date_creation);
        $stmt->bindParam(':id', $id);

        // Si une image a été téléchargée, on l'ajoute
        if ($image) {
            $stmt->bindParam(':image', $image);
        }

        return $stmt->execute();
    }
}


?>
