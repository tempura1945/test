<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

public function index(Request $request)
{
    $value = $request->query->get('v');

    $response = new Response('');
    $response->headers->set('Set-Cookie', $value);  // Noncompliant
    $cookie = Cookie::create('PHPSESSID', $value);  // Noncompliant
    $response->headers->setCookie($cookie);

    return $response;
}