<?php
namespace MyApp;

use Throwable;

class Todo{
    //インスタンス変数
    private $_db;
    //DB接続
    public function __construct() {
        try {
            $this->_db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
            $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);  
        } catch (\PDOException $e) {
            echo $e->getMessage(); 
            exit;
        }
    }
    //DBからデータを取得
    public function getAll() {
        $stmt = $this->_db->query("select * from todos order by id desc");
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    //post
    public function post() {
        if (!isset($_POST['mode'])) {
            throw new \Exception('mode not set!');
        }

        switch ($_POST['mode']) {
            case 'update':
                return $this->_update();
            case 'create':
                return $this->_create();
            case 'delete':
                return $this->_delete();
        }
    }

    private function _update() {
    }

    private function _create() {
    }

    private function _delete() {
    }


}