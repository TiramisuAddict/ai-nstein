<?php
class Cours
{
    private ?int $id_matiere = null;
    private ?int $id_user = null;
    private ?string $nom_matiere = null;
    private ?DateTime $date_pub = null;
    private ?string $type = null;
    private ?string $image = null;
    
    
    public function __construct($id_matiere = null, $d, $m, $dp, $t ,$i)
{
    $this->id_matiere = $id_matiere;
    $this->id_user = $d;
    $this->nom_matiere = $m;
    

    
    // Vérifiez si $dp est une instance de DateTime avant d'assigner
    if ($dp instanceof DateTime) {
        $this->date_pub = $dp;
    } else {
        $this->date_pub = new DateTime($dp);
    }

    $this->type = $t;
    $this->image = $i;
}

  // Getter pour $id
  public function getId(): ?int {
    return $this->id_matiere;
}

// Setter pour $id
public function setId(?int $id_matiere): void {
    $this->id_matiere = $id_matiere;
}

 // Getter pour $id
 public function getIdUser(): ?int {
    return $this->id_user;
}

// Setter pour $id
public function setIdUser(?int $id_user): void {
    $this->id_user = $id_user;
}


// Getter pour $nommatiere
public function getNomMatiere(): ?string {
    return $this->nom_matiere;
}

// Setter pour $nommatiere
public function setNomMatiere(?string $nom_matiere): void {
    $this->nom_matiere = $nom_matiere;
}


// Getter pour $date_pub
public function getDatePub(): ?DateTime {
    return $this->date_pub;
}

// Setter pour $date_debut
public function setDatePub(?DateTime $date_pub): void
{
    $this->date_pub = $date_pub;
}


// Getter pour $type
public function getType(): ?string {
    return $this->type;
}

// Setter pour $type
public function setType(?string $type): void {
    $this->type = $type;
}

// Getter pour $nommatiere
public function getImage(): ?string {
    return $this->image;
}

// Setter pour $nommatiere
public function setImage(?string $image): void {
    $this->image = $image;
}

}