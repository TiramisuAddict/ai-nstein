<?php
class Seance
{
    private ?int $id_seance = null;
    private ?int $id_matiereseance = null;
    private ?DateTime $date_seance = null;
    private ?string $heure_d = null; // Modifier ?int en ?string
    private ?string $heure_f = null; // Assurez-vous que cette propriété aussi accepte une chaîne
    private ?string $description = null;
    
    
    public function __construct($id_seance = null,$m , $d, $hd, $hf, $des)
{
    $this->id_seance = $id_seance;
    $this->id_matiereseance = $m;
    
    if ($d instanceof DateTime) {
        $this->date_seance = $d;
    } else {
        $this->date_seance= new DateTime($d);
    }

    $this->heure_d = $hd;
    $this->heure_f = $hf;
    $this->description = $des;

}

  // Getter pour $id
  public function getId_seance(): ?int {
    return $this->id_seance;
}

// Setter pour $id
public function setId_seance(?int $id_seance): void {
    $this->id_seance = $id_seance;
}

// Getter pour $id
public function getId_matiereseance(): ?int {
    return $this->id_matiereseance;
}

// Setter pour $id
public function setId_matiereseance(?int $id_matiereseance): void {
    $this->id_matiereseance = $id_matiereseance;
}



// Getter pour $date_seance
public function getDate_seance(): ?DateTime {
    return $this->date_seance;
}

// Setter pour $date_seance
public function setDate_seance(?DateTime $date_seance): void
{
    $this->date_seance = $date_seance;
}


 // Getter pour $heure_d
 public function getHeure_d(): ?string {
    return $this->heure_d;
}

// Setter pour $heure_d
public function setHeure_d(?int $heure_d): void {
    $this->heure_d = $heure_d;
}


// Getter pour $heure_f
public function getHeure_f(): ?string {
    return $this->heure_f;
}

// Setter pour $heure_f
public function setHeure_f(?int $heure_f): void {
    $this->heure_f = $heure_f;
}


// Getter pour $description
public function getDescription(): ?string {
    return $this->description;
}

// Setter pour $description
public function setDescription(?string $description): void {
    $this->description = $description;
}



}