<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

public function index(Request $request)
{
    $cmd = $_GET["cmd"];

    exec($cmd);

    if( isset( $_POST[ 'Connect' ] ) ) {
        $login = $_POST[ 'login' ];
        $pass = $_POST[ 'pass' ];
    
        $query = "SELECT * FROM users WHERE login = '" . $login . "' AND pass = '" . $pass . "'"; // Unsafe
    
        // If the special value "foo' OR 1=1 --" is passed as either the user or pass, authentication is bypassed
        // Indeed, if it is passed as a user, the query becomes:
        // SELECT * FROM users WHERE user = 'foo' OR 1=1 --' AND pass = '...'
        // As '--' is the comment till end of line syntax in SQL, this is equivalent to:
        // SELECT * FROM users WHERE user = 'foo' OR 1=1
        // which is equivalent to:
        // SELECT * FROM users WHERE 1=1
        // which is equivalent to:
        // SELECT * FROM users
    
        $con = getDatabaseConnection();
        $result = mysqli_query($con, $query);
    
        $authenticated = false;
        if ( $row = mysqli_fetch_row( $result ) ) {
            $authenticated = true;
        }
        mysqli_free_result( $result );
        return $authenticated;
    }
    
    $value = $request->query->get('v');

    $response = new Response('');
    $response->headers->set('Set-Cookie', $value);  // Noncompliant
    $cookie = Cookie::create('PHPSESSID', $value);  // Noncompliant
    $response->headers->setCookie($cookie);

    return $response;
}