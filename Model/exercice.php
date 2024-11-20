<?php
class Exercise 
{
    private $id;
    private $title;
    private $description;
    private $difficulty_level;
    private $project_file;
    private $image;
    private $author_name;

    public function __construct($title, $description, $difficulty_level, $author_name, $project_file = null, $image = null) 
    {
        $this->title = $title;
        $this->description = $description;
        $this->difficulty_level = $difficulty_level;
        $this->author_name = $author_name;
        $this->project_file = $project_file;
        $this->image = $image;
    }
    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function getTitle() 
    {
        return $this->title;
    }

    public function setTitle($title) 
    {
        $this->title = $title;
    }

    public function getDescription() 
    {
        return $this->description;
    }

    public function setDescription($description) 
    {
        $this->description = $description;
    }

    public function getDifficultyLevel() 
    {
        return $this->difficulty_level;
    }

    public function setDifficultyLevel($difficulty_level) 
    {
        $this->difficulty_level = $difficulty_level;
    }

    public function getProjectFile() 
    {
        return $this->project_file;
    }

    public function setProjectFile($project_file) 
    {
        $this->project_file = $project_file;
    }

    public function getImage() 
    {
        return $this->image;
    }

    public function setImage($image) 
    {
        $this->image = $image;
    }

    public function getAuthorName() 
    {
        return $this->author_name;
    }

    public function setAuthorName($author_name) 
    {
        $this->author_name = $author_name;
    }
}
?>