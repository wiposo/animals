<!DOCTYPE html>
<html>
<head>
    <title>Edit Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Animal</h2>
        <form method="POST" action="index.php?action=edit&id=<?php echo $animal['id']; ?>">
            <div class="mb-3">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $animal['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Species:</label>
                <input type="text" name="species" class="form-control" value="<?php echo $animal['species']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Age:</label>
                <input type="number" name="age" class="form-control" value="<?php echo $animal['age']; ?>" required>
            </div>
            <div class="mb-3">
                <label>Description:</label>
                <textarea name="description" class="form-control"><?php echo $animal['description']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>