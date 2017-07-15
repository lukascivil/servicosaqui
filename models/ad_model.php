<?php

class Ad_Model extends Model
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
    
    public function create($post_data, $post_image)
    {

        date_default_timezone_set('America/Sao_Paulo');
        $dataLocal = date('Y-m-d H:i:s', time());

        $id_query = $this->db->insert('ad', array(
            'id_user'     => Session::get('id'),
            'datetime'    => $dataLocal,
            'title'       => $post_data['title'],
            'state'       => $post_data['state'],
            'id_ad_type'  => (int)$post_data['service'],
            'city'        => $post_data['city'],
            'description' => $post_data['description']
        ));

        if ($id_query && isset($post_image["images"])) {
            foreach ($post_image["images"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $post_image["images"]["tmp_name"][$key];

                    if ($key == 0) {
                        $this->db->insertimage('ad_image', $id_query, $tmp_name, 1);
                    } else {
                        $this->db->insertimage('ad_image', $id_query, $tmp_name, 0);
                    }
                }
            }
            return 1;
        }

        if ($id_query) {
            return 1;
        }
    }

    public function getmain($post_data)
    {
        $sqlpart = "";
        $sqlpartlimit = "";
        $sqlpartoffset = "";

        if (!empty($post_data)) {
            
            //Text
            if ((isset($post_data["filter_text"]))) {
                $sqlpart = "WHERE";
                $sqlpart .= " a.title LIKE '%" . $post_data["filter_text"] . "%'";
            }

            //State
            if ((isset($post_data["filter_state"])) && $post_data["filter_state"] != "") {
                $sqlpart .= " AND a.state = '" . $post_data["filter_state"] . "'";
            }

            //City
            if ((isset($post_data["filter_city"])) && $post_data["filter_city"] != "") {
                $sqlpart .= " AND a.city = '" . $post_data["filter_city"] . "'";
            }

            //Service, Category
            if ((isset($post_data["filter_service"])) && $post_data["filter_service"] != "") {
                $sqlpart .= " AND a.id_ad_type = " . $post_data["filter_service"];
            }

            //Service type
            if ((isset($post_data["filter_servicetype"])) && $post_data["filter_servicetype"] != "") {
                $sqlpart .= " AND d.servicetype = '" . $post_data["filter_servicetype"] . "'";
            }

            //Sort
            if ((isset($post_data["filter_sort"])) && $post_data["filter_sort"] != "") {
                if($post_data["filter_sort"] == "new") {
                    $sqlpart .= " ORDER BY " . "datetime" . " DESC";
                } else {
                    $sqlpart .= " ORDER BY " . "datetime" . " ASC";
                }
            } 

            //Limit
            if ((isset($post_data["filter_limit"])) && $post_data["filter_limit"] != "") {

                $sqlpartlimit .= " LIMIT " . $post_data["filter_limit"];

                if ((isset($post_data["filter_page"])) && $post_data["filter_page"] != "") {
                    $offset = intval ($post_data["filter_page"]) * intval ($post_data["filter_limit"]);
                    $sqlpartlimit .= " OFFSET " . $offset;
                }
            }
        }

        try {
            $sqlprimary = 'SELECT a.*, c.type, d.servicetype, b.id AS "path" FROM ad a LEFT OUTER JOIN ad_image b ON a.id = b.id_ad AND b.first = 1 LEFT OUTER JOIN ad_type c ON a.id_ad_type = c.id JOIN user d ON d.id=a.id_user ';

            $sql =  $sqlprimary . $sqlpart . $sqlpartlimit;

            $result1 = $this->db->select($sql);

            foreach ($result1 as $key => &$value) {
                $value["path"] = URL . "ad/getimage/?id=" . $value["path"];
            }

            //Number of pages -------------------------------- Ps. Redundancy
            
            /*$sqlnumberofpages = 'SELECT COUNT(*) FROM ad a ' . $sqlpart;
            $stm = $this->db->prepare($sqlnumberofpages);
            $stm->execute();
            $total =  $stm->fetchColumn(0);*/

            if(isset($post_data["filter_limit"])) {
                $sqlnumberofpages = $sqlprimary . $sqlpart;
                $result2 = $this->db->select($sqlnumberofpages);

                $total = sizeof($result2);
                
                $ref = &$result1[]["config"];

                $ref[] = array("numberofpages" => ceil((int)$total/(int)$post_data["filter_limit"]));
                $ref[] = array("adsfound" => $total);

            }
            //------------------------------------------------
            
            return $result1;

        } catch(Exception $err) {
            return $err;
            //return "Erro na query: " . $sql;
        }
    }

    public function getimage($get_data)
    {
        $query = $this->db->prepare("SELECT image FROM ad_image WHERE id=:id");
        $query->execute(array(':id' => $get_data["id"]));

        $query->bindColumn(1, $image, PDO::PARAM_LOB);
        $query->fetch(PDO::FETCH_BOUND);
        
        return $image;
    }

    public function get($get_data)
    {
        $sth = $this->db->prepare("SELECT *, id_ad_type as service FROM ad WHERE id=:id");
        $sth->bindValue(":id", $get_data["id"]);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $result[0];
    }

    /*public function editSave($data)
    {
        $postData = array(
            'login' => $data['login'],
            'password' => Hash::create('sha256', $data['password'], HASH_PASSWORD_KEY),
            'role' => $data['role']
        );
        
        $this->db->update('user', $postData, "`userid` = {$data['userid']}");
    }*/

    public function update($post_data)
    {
        $postData = array(
            'id'            => $post_data['id'],
            'title'         => $post_data['title'],
            'zipcode'       => $post_data['zipcode'],
            'state'         => $post_data['state'],
            'id_ad_type'    => (int)$post_data['service'],
            'city'          => $post_data['city'],
            'description'   => $post_data['description']
        );
        
        $query = $this->db->update('ad', $postData, "`id` = {$postData['id']}");

        if ($query) {
            return 1;
        }
    }

    public function delete($id)
    {
        /*$result = $this->db->select('SELECT role FROM user WHERE userid = :userid', array(':userid' => $userid));

        if ($result[0]['role'] == 'owner')
        return false;*/
        
        $result = $this->db->delete('ad', "id = '$id'");

        if ($result)
            return 1;
        else
            return 0;
    }

    public function getlistofservices()
    {
        $result = $this->db->select('SELECT * FROM ad_type');
        return $result;
    }
}