<form method="POST" action="/dashboard/exercises/test_prediction.php">
    <label>Age</label>
    <input type="number" name="age" placeholder="Enter your age" required>

    <label>Knowledge Level</label>
    <select name="knowledge_level">
        <option value="0">Beginner</option>
        <option value="1">Intermediate</option>
        <option value="2">Advanced</option>
    </select>

    <button type="submit">Get Exercises</button>
</form>
