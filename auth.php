<?php

function createMyAccount() {

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_connect($socket, '8.8.8.8', 23);  // Sensitive


    $password = "65DBGgwe4uazdWQA";

    $httpUrl = "https://example.domain?user=user&password=65DBGgwe4uazdWQA"
    $sshUrl = "ssh://user:65DBGgwe4uazdWQA@example.domain"
}