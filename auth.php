<?php

function createMyAccount() {

  $ip = "123.123.11.12";

  $email = $_GET['email'];
  $name = $_GET['name'];
  $password = $_GET['password'];

  $hash = hash_pbkdf2('sha256', $password, $email, 100000); 

  $hash = hash_pbkdf2('sha256', $password, '', 100000); // Noncompliant; salt is empty

  $hash = hash_pbkdf2('sha256', $password, 'D8VxSmTZt2E2YV454mkqAY5e', 100000); // Noncompliant; salt is hardcoded

  $hash = crypt($password); // Noncompliant; salt is not provided; fails in PHP 8
  $hash = crypt($password, ""); // Noncompliant; salt is hardcoded; fails in PHP 8

  $options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM), // Noncompliant ; use salt generated by default
  ];
  echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
}
