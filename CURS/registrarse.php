<?php
switch ($_POST['api']) {
    case "checkEmail":
        $email = htmlentities(strip_tags($_POST['email']), ENT_QUOTES, 'UTF-8');
        checkEmail($email);
        break;
    default:
        break;
}

function checkEmail($email)
{
    $email = strtolower(str_replace(" ", "", trim($email)));
    //
    $conn = new mysqli("localhost", "root", "", "pbd");
    $sql = "SELECT email FROM usuarios WHERE email='" . $email  . "' ;";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            echo $row['email'];
        }
    } else {
        echo "null";
        // echo "Error:<br>";
        // print_r($result);
        // echo "<br>" . $sql . "<br>";
    }
    $conn->close();
}
