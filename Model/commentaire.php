<?php
class Commentaire {
    // Propriétés de l'entité Commentaire
    private $id;
    private $message;
    private $date_publication;
    private $auteur;
    private $article_id;

    // Constructeur de la classe Commentaire
    public function __construct($message, $date_publication, $auteur, $article_id) {
        $this->message = $message;
        $this->date_publication = $date_publication ?: date("Y-m-d"); // Si pas de date, on prend la date actuelle
        $this->auteur = $auteur;
        $this->article_id = $article_id;
    }

    // Getters et Setters pour chaque propriété
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getDatePublication() {
        return $this->date_publication;
    }

    public function setDatePublication($date_publication) {
        $this->date_publication = $date_publication;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function setAuteur($auteur) {
        $this->auteur = $auteur;
    }

    public function getArticleId() {
        return $this->article_id;
    }

    public function setArticleId($article_id) {
        $this->article_id = $article_id;
    }

    // Méthode pour mettre à jour un commentaire
    public function updateCommentaire($id, $message, $date_publication, $auteur, $article_id) {
        $sql = "UPDATE commentaires 
                SET message = :message, 
                    date_publication = :date_publication, 
                    auteur = :auteur, 
                    article_id = :article_id 
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':date_publication', $date_publication);
        $stmt->bindParam(':auteur', $auteur);
        $stmt->bindParam(':article_id', $article_id);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
?>
