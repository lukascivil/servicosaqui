<?php

class User_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /*public function userList()
    {
        return $this->db->select('SELECT userid, login, role FROM user');
    }
    
    public function userSingleList($userid)
    {
        return $this->db->select('SELECT userid, login, role FROM user WHERE userid = :userid', array(':userid' => $userid));
    }*/
    
    public function create($post_data)
    {
        $query = $this->db->insert('user', array(
            'login'         => $post_data['login'],
            'fullname'      => $post_data['fullname'],
            'password'      => $post_data['password'],
            'age'           => $post_data['age'],
            'email'         => $post_data['email'],
            'servicetype'   => $post_data['servicetype'],
        ));

        if ($query) {
            return 1;
        }
    }
    
    public function update($post_data)
    {
        $postData = array(
            'id'            => session::get("id"),
            'login'         => $post_data['login'],
            'fullname'      => $post_data['fullname'],
            'password'      => $post_data['password'],
            'age'           => $post_data['age'],
            'email'         => $post_data['email'],
            'zipcode'       => $post_data['zipcode'],
            'servicetype'   => $post_data['servicetype'],
            'description'   => $post_data['description'],
            'state'         => $post_data['state'],
            'city'          => $post_data['city']
        );
        
        $query = $this->db->update('user', $postData, "`id` = {$postData['id']}");

        if ($query) {
            session::updateAll($postData);
            return 1;
        }
    }
    
    /*public function delete($userid)
    {
        $result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
        return false;
        
        $this->db->delete('user', "userid = '$userid'");
    }*/
}