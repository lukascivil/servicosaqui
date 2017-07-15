<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($post_data)
    {
        /*print_r($post_data);
        exit;*/
        $sth = $this->db->prepare("SELECT * FROM user WHERE 
                login = :login AND password = :password");

        $sth->execute(array(
            ':login' => $post_data['login'],
            ':password' => $post_data['password']
        ));
        
        $data = $sth->fetch(PDO::FETCH_ASSOC);

        if ($sth->rowCount() == 1) {
            // login
            Session::init();
            Session::set('loggedIn', true);

            foreach ($data as $key => $value) {
                Session::set($key, $value);
            }

            return 1;
        } else {
            return 0;
        }
    }
    
    public function logout()
    {
        Session::Destroy();
    }
}