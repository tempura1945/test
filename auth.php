<?php

function createMyAccount() {
  $email = $_GET['email'];
  $name = $_GET['name'];
  $password = $_GET['password'];

  $hash = hash_pbkdf2('sha256', $password, $email, 100000);

  $hash = hash_pbkdf2('sha256', $password, '', 100000);

  $hash = hash_pbkdf2('sha256', $password, 'D8VxSmTZt2E2YV454mkqAY5e', 100000);

  $hash = crypt($password);
  $hash = crypt($password, "");

  $options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
  ];
  echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
}