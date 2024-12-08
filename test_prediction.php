<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = $_POST['age'];
    $knowledgeLevel = $_POST['knowledge_level'];

    // Call Flask API to get prediction
    $url = "http://127.0.0.1:5000/predict";

    $data = array("Age" => (int)$age, "KnowledgeLevel" => (int)$knowledgeLevel);

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        echo "API Error: " . curl_error($curl);
        exit;
    }

    $result = json_decode($response, true);

    if (isset($result['predicted_difficulty'])) {
        $difficulty = $result['predicted_difficulty'];
        echo "Predicted Difficulty: " . $difficulty;

        // Redirect with difficulty info
        header("Location: /dashboard/exercises/Vue/exercices.php?predicted_difficulty=" . urlencode($difficulty));
        exit;
    } else {
        echo "Prediction result not received correctly";
    }

    curl_close($curl);
}
?>
