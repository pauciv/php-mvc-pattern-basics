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
        <h1>Employee's page!</h1>
        </br>

        <?php
        if ($this->action == "getEmployee" && (!isset($this->data) || !$this->data || sizeof($this->data) == 0)) {
            echo "<p>The employee does not exists!</p>";
        } else if (isset($error)) {
            echo "<p>$error</p>";
        }
        ?>
        <form class="mb-5 needs-validation" action="index.php?controller=Employee&action=<?php echo isset($this->data['id']) ? "updateEmployee" : "createEmployee" ?>" method="post">
            <input type="hidden" name="id" value="<?php echo isset($this->data['id']) ? $this->data['id'] : null ?>">
            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input required type="text" value="<?php echo isset($this->data['name']) ? $this->data['name'] : null ?>" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Enter name">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input required type="text" value="<?php echo isset($this->data['last_name']) ? $this->data['last_name'] : null ?>" class="form-control" id="lastName" name="last_name" aria-describedby="lastnameHelp" placeholder="Enter last name">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input required type="email" value="<?php echo isset($this->data['email']) ? $this->data['email'] : null ?>" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender_id" class="form-control" id="gender" required>
                            <option value="">Please Select</option>
                            <option value="1" <?php echo isset($this->data['gender_id']) && $this->data['gender_id']  == 1 ? 'selected' : null; ?>>Male</option>
                            <option value="2" <?php echo isset($this->data['gender_id']) && $this->data['gender_id']  == 2 ? 'selected' : null; ?>>Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" value="<?php echo isset($this->data['city']) ? $this->data['city'] : null ?>" class="form-control" id="city" name="city" aria-describedby="CityHelp" placeholder="Enter City">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="streetAddress">Street Address</label>
                        <input type="text" value="<?php echo isset($this->data['street_address']) ? $this->data['street_address'] : null ?>" class="form-control" id="streetAddress" name="street_address" aria-describedby="streetAddressHelp" placeholder="Enter streetAddress">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" value="<?php echo isset($this->data['state']) ? $this->data['state'] : null ?>" class="form-control" id="state" name="state" aria-describedby="stateHelp" placeholder="Enter state">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" value="<?php echo isset($this->data['age']) ? $this->data['age'] : null ?>" class="form-control" id="age" name="age" aria-describedby="ageHelp" placeholder="Enter age">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <div class="form-group">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" value="<?php echo isset($this->data['postal_code']) ? $this->data['postal_code'] : null ?>" class="form-control" id="postalCode" name="postal_code" aria-describedby="postalCodeHelp" placeholder="Enter postalCode">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="phoneNumber">PhoneNumber</label>
                        <input type="text" value="<?php echo isset($this->data['phone_number']) ? $this->data['phone_number'] : null ?>" class="form-control" id="phoneNumber" name="phone_number" aria-describedby="phoneNumberHelp" placeholder="Enter phoneNumber">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a id="return" class="btn btn-secondary" href="<?php echo "?controller=Employee&action=getAllEmployees&action=getAllEmployees"; ?>">Return</a>
        </form>
    </div>
</body>

</html>