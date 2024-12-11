<?php
// Fetch data or include necessary files
include '../../../../../Controller/QuizC.php';

// Fetch course data
$QuizC = new QuizC();
$listQuizs = $QuizC->AfficherQuizs(); 

// Create Excel content
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="quizs.xls"'); // Excel file name

echo "<table border='1'>";
echo "<thead>";
echo "<tr>";
echo "<th>ID</th>";
echo "<th>TITRE</th>";
echo "<th>DESCRIPTION</th>";
echo "<th>DIFFICULTE</th>";
echo "<th>DATE CREATION</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

foreach ($listQuizs as $quiz) {
    
    echo "<tr>";
    echo "<td>" . $quiz['idQuiz'] . "</td>";
    echo "<td>" . $quiz['titre'] . "</td>";
    echo "<td>" . $quiz['description'] . "</td>";
    echo "<td>" . $quiz['difficulte'] . "</td>";
    echo "<td>" . $quiz['dateCreation'] . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
?>
