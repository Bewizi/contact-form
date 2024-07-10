<?php

require 'database.php';
require 'errmsgfun.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $email = htmlspecialchars($_POST['email']);
  $user_message = htmlspecialchars($_POST['user_message']);
  $query_type = isset($_POST['query_type']) ? htmlspecialchars($_POST['query_type']) : '';
  $consent = isset($_POST['consent']) ? 1 : 0; // Convert consent checkbox to boolean


  // Validate fields
  if (empty($firstname)) {
    $errors['firstname'] = 'First name is required';
  }
  if (empty($lastname)) {
    $errors['lastname'] = 'Last name is required';
  }
  if (empty($email)) {
    $errors['email'] = 'Email is required';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
  }
  if (empty($user_message)) {
    $errors['user_message'] = 'Message is required';
  }
  if (empty($query_type)) {
    $errors['query_type'] = 'Please select a query type';
  }
  if (empty($consent)) {
    $errors['consent'] = 'To submit this form, please consent to being contacted';
  }

  if (empty($errors)) {

    $sql = 'INSERT INTO userinfo (firstname, lastname, email, user_message, query_type, consent) VALUES (:firstname, :lastname,  :email, :user_message,:query_type, :consent)';

    $stmt = $pdo->prepare($sql);


    $params = [
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'user_message' => $user_message,
      'query_type' => $query_type,
      'consent' => $consent
    ];

    $stmt->execute($params);

    header('Location: index.php');
    exit;


    header('Location: index.php');
    exit;
  } else {
    session_start();
    $_SESSION['errors'] = $errors;
    $_SESSION['formData'] = $_POST;
    header('Location: index.php');
    exit;
  }
}
