<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Id Validation</title>
</head>
<body style='text-align: center'>
<form action="" method="POST">
    <label>Enter ID for validation
        <br/>
        <input type="text" name="id" placeholder="Enter ID">
    </label>
    <br/>
    <button type="submit" name="Submit">
        Submit
    </button>
    <div>
        <?php
        $result = '';
        require_once('app.php');
        echo '<br>' . $result;
        ?>
    </div>
</form>

<form action='countValid.php'>
    <button>
        Click me to validate File
    </button>
</form>

</body>

</html>
