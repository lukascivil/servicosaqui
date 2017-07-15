<?php

class Adview_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getadview($data)
    {
        // Get ads ID
        ///$ads = $this->db->select('SELECT * FROM ad WHERE id_user = :id', array('id' => $_SESSION['id']));

        //return $ads;
        //Get image path
        //return $this->db->select('SELECT b.id_ad, a.title FROM ad a, ad_image b WHERE a.id_user = :id AND a.id = b.id_ad AND b.id_ad IN $ads["id"]', array('id' => $_SESSION['id']));

        //Get image path
        //return $this->db->select('SELECT b.id_ad, a.title FROM ad a, ad_image b WHERE a.id_user = :id ', array('id' => $_SESSION['id']));
        //echo $_SESSION["id"];

        //return $this->db->select('SELECT a.title, a.description, a.datetime, a.state, b.id AS "path" FROM ad a LEFT OUTER JOIN ad_image b ON a.id = b.id_ad WHERE a.id ='.$data["id"]);
        //
        $result = $this->db->select('SELECT a.*, c.*, d.type, GROUP_CONCAT(b.id ORDER BY b.first DESC) AS paths
            FROM ad a
            LEFT JOIN ad_image b ON a.id = b.id_ad
            JOIN user c ON c.id = a.id_user 
            LEFT JOIN ad_type d ON d.id = a.id_ad_type
            WHERE a.id = ' . $data["id"] . '
            GROUP BY a.id ');

        $result[0]["paths"] = explode(',', $result[0]["paths"]);

        foreach ($result[0]["paths"] as $key => &$value) {
            $value = URL . "ad/getimage/?id=" . $value;
        }

        return $result;
    }
    
    /*public function noteSingleList($noteid)
    {
        return $this->db->select('SELECT * FROM note WHERE userid = :userid AND noteid = :noteid', 
            array('userid' => $_SESSION['userid'], 'noteid' => $noteid));
    }
    
    public function create($data)
    {
        $this->db->insert('note', array(
            'title' => $data['title'],
            'userid' => $_SESSION['userid'],
            'content' => $data['content'],
            'date_added' => date('Y-m-d H:i:s') // use GMT aka UTC 0:00
        ));
    }
    
    public function editSave($data)
    {
        $postData = array(
            'title' => $data['title'],
            'content' => $data['content'],
        );
        
        $this->db->update('note', $postData, 
                "`noteid` = '{$data['noteid']}' AND userid = '{$_SESSION['userid']}'");
    }
    
    public function delete($id)
    {
        $this->db->delete('note', "`noteid` = {$data['noteid']} AND userid = '{$_SESSION['userid']}'");
    }*/
}