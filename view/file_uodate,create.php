

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Quiz</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <h2 class="mb-4">Gestion des Quiz</h2>

    <?php if ($quiz): ?>
        <h3>Modifier le Quiz</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Titre du Quiz</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $quiz['title'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="question" class="form-label">Question</label>
                <input type="text" class="form-control" id="question" name="question" value="<?= $quiz['question'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="answer1" class="form-label">Réponse 1</label>
                <input type="text" class="form-control" id="answer1" name="answer1" value="<?= $quiz['answer1'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="answer2" class="form-label">Réponse 2</label>
                <input type="text" class="form-control" id="answer2" name="answer2" value="<?= $quiz['answer2'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="answer3" class="form-label">Réponse 3</label>
                <input type="text" class="form-control" id="answer3" name="answer3" value="<?= $quiz['answer3'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="correct_answer" class="form-label">Réponse correcte</label>
                <select class="form-select" id="correct_answer" name="correct_answer" required>
                    <option value="1" <?= $quiz['correct_answer'] == 1 ? 'selected' : '' ?>>Réponse 1</option>
                    <option value="2" <?= $quiz['correct_answer'] == 2 ? 'selected' : '' ?>>Réponse 2</option>
                    <option value="3" <?= $quiz['correct_answer'] == 3 ? 'selected' : '' ?>>Réponse 3</option>
                </select>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Mettre à jour le Quiz</button>
        </form>
    <?php else: ?>
        <h3>Liste des Quiz</h3>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td>
                            <a href="gestion_quiz.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="gestion_quiz.php?delete_id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quiz ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
