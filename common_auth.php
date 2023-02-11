<?php

function createMyAccount() {
    $id = 1;
    mysql_connect('localhost', $username, $password) or die('Could not connect: ' . mysql_error());
    mysql_select_db('myDatabase') or die('Could not select database');

    $result = mysql_query("SELECT * FROM myTable WHERE id = " . $id);

    while ($row = mysql_fetch_object($result)) {
        echo $row->name;
    }

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    socket_connect($socket, '8.8.8.8', 23); 


    $password = "65DBGgwe4uazdWQA";

    $httpUrl = "https://example.domain?user=user&password=65DBGgwe4uazdWQA"
    $sshUrl = "ssh://user:65DBGgwe4uazdWQA@example.domain"
}
