<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');

  require_once('../../../vendor/autoload.php');
  require_once '../../config/configs.php';
  include_once '../../config/Database.php';
  include_once '../../models/User.php';
  

  use Firebase\JWT\JWT;
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate  user object
  $user = new User($db);
  // $student->createTable();

  // Get raw studented data
  $data = json_decode(file_get_contents("php://input"));
 
   //Requirements in the Body.
  $user->email = trim($data->email);
  $user->password = hash('sha256', trim($data->password));
  
  
  // Authenticate the user
  if($user->auth_user()) {
      //when successfully admitted
        $secret_Key  = $JWT_SECRET; 
        $date   = new DateTimeImmutable();
        $expire_at     = $date->modify('+60 minutes')->getTimestamp();                     
        $request_data = [
            'iat'  => $date->getTimestamp(),         // Issued at: time when the token was generated
            'iss'  => "localhost",                   // Issuer
            'nbf'  => $date->getTimestamp(),         // Not before
            'exp'  => $expire_at,                    // Expire
            'email' => $user->email,                 // User name
            'password' => $user->password,                 // User name
        ];
        
        $Jwt = JWT::encode(
            $request_data,
            $secret_Key,
            'HS512'
        ); 
        echo json_encode(
          array(
              'auth' => true, 
              'level' => $user->level, 
              'name' => $user->name, 
              'message' => 'Authenticated successfully', 
              'jwt' => $Jwt
            )
        );
  } else {
    echo json_encode(
      array(
          'auth' => false, 
          'message' => 'Authentication Failed, please retry', 
          'jwt' => ''
        )
    );
  }

?>