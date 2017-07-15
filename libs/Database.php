<?php

/**
 * $dbh = "Database Handle"
 * $sth = "Statement Handle"
 */
class Database extends PDO
{
    
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        $optutf8 = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ); 
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS,$optutf8);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /**
     * select
     * @param string $sql An SQL string
     * @param array $array Paramters to bind
     * @param constant $fetchMode A PDO Fetch mode
     * @return mixed
     */
    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }
        
        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }
    
    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insert($table, $data)
    {
        ksort($data);
        
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            //echo $key . ":" . $value . " ";
            $sth->bindValue(":$key", $value);
        }

        try {
            $sth->execute();
            return $this->lastInsertId();
        } catch(Exception $e) {
            echo $e;
            return null;
        }
    }

    /**
     * insert
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function insertimage($table, $id_ad, $path, $first)
    {
        $fp = fopen($path, 'rb');

        $stmt = $this->prepare("INSERT INTO ad_image (id_ad, image, first) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $id_ad);
        $stmt->bindParam(2, $fp, PDO::PARAM_LOB);
        $stmt->bindParam(3, $first);
        $stmt->execute();
        return 1;
    }
    
    /**
     * update
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where the WHERE query part
     */
    public function update($table, $data, $where)
    {
        ksort($data);
        
        $fieldDetails = NULL;
        foreach($data as $key=> $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
        return 1;
    }
    
    /**
     * delete
     * 
     * @param string $table
     * @param string $where
     * @param integer $limit
     * @return integer Affected Rows
     */
    public function delete($table, $where, $limit = 1)
    {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
    
}