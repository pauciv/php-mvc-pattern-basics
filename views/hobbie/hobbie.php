<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Hobbie's page!</h1>
        </br>

        <?php
        if ($this->action == "getHobbie" && (!isset($this->data) || !$this->data || sizeof($this->data) == 0)) {
            echo "<p>The hobbie does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="?controller=Hobbie&action=<?php echo isset($this->data['id']) ? "updateHobbie" : "createHobbie" ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($this->data['id']) ? $this->data['id'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required type="text" value="<?php echo isset($this->data['name']) ? $this->data['name'] : null ?>" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <select name="type" class="form-control" id="type" required>
                            <option value="">Please Select</option>
                            <option value="Indoor" <?php echo isset($this->data['type']) && $this->data['type']  == "Indoor" ? 'selected' : null; ?>>Indoor</option>
                            <option value="Outdoor" <?php echo isset($this->data['type']) && $this->data['type']  == "Outdoor" ? 'selected' : null; ?>>Outdoor</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a id="return" class="btn btn-secondary" href="<?php echo "?controller=Hobbie&action=getAllHobbies&action=getAllHobbies"; ?>">Return</a>
        </form>
    </div>
</body>

</html>