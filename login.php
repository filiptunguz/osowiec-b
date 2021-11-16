<?php
    include 'connect.php';

    $_POST = json_decode(file_get_contents("php://input"), true);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $bcryptPassword = password_hash($password, PASSWORD_BCRYPT);

//    $sql = mysqli_query($conn , "INSERT INTO users (email, password) VALUES ('$email', '$bcryptPassword')");
//
//    if ($sql) {
//        echo 'suc';
//    } else {
//        echo  'fak';
//    }

    $sql = mysqli_query($conn , "SELECT * FROM users WHERE email = '$email'");

    while($row = mysqli_fetch_assoc($sql)) {
        if (password_verify($password, $row['password'])) {
            $id = $row['id'];
            $email = $row['email'];
            $firstName = $row['firstName'];
            $lastName = $row['lastName'];
            $phone = $row['phone'];
            $city = $row['city'];
            $address = $row['address'];
            $engagement = $row['engagement'];
            $userApiKey = $row['apiKey'];
            $role = $row['role'];

            echo json_encode((array)[
                'id' => $id,
                'email' => $email,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'phone' => $phone,
                'city' => $city,
                'address' => $address,
                'engagement' => $engagement,
                'userApiKey' => $userApiKey,
                'role' => $role
            ]);
        }
    }