<?php
require($_SERVER['DOCUMENT_ROOT'] . "/src/configs/db/connect.db.php");

class BaseQuery
{
    private static $instance = null;
    private static $stringQuery;
    private static $paramsArray = array();
    public static function getIns()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function getStringQuery()
    {
        return self::$stringQuery;
    }
    public function build()
    {
        try {
            $conn = Database::connect();
            $preStmt = $conn->prepare(self::$stringQuery);
            if (empty(self::$paramsArray) == false) {
                for ($i = 1; $i <= count(self::$paramsArray); $i++) {
                    $preStmt->bindValue($i, self::$paramsArray[$i - 1]);
                }
                self::$paramsArray = [];
            }
            $preStmt->execute();
        } catch (PDOException $th) {
            echo $th->getMessage();
        } finally {
            Database::close();
        }
    }
    public static function exec($sql)
    {
        try {
            $conn = Database::connect();
            $conn->exec($sql);
        } catch (PDOException $th) {
            echo $th->getMessage();
        } finally {
            Database::close();
        }
    }
    public function get()
    {
        try {
            $conn = Database::connect();
            $preStmt = $conn->prepare(self::$stringQuery);
            if (empty(self::$paramsArray) == false) {
                for ($i = 1; $i <= count(self::$paramsArray); $i++) {
                    $preStmt->bindValue($i, self::$paramsArray[$i - 1]);
                }
                self::$paramsArray = [];
            }
            $preStmt->execute();
            $result = $preStmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $th) {
            echo $th->getMessage();
        } finally {
            Database::close();
        }
        return [];
    }
    public function getOne()
    {
        try {
            $result = $this->get();
            if (empty($result)) {
                return null;
            }
            return $result[0];
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public static function all($table)
    {
        self::$stringQuery = "SELECT * FROM " . $table;
        return self::getIns()->get();
    }
    public static function insert($table, $keys = array(), $values = array())
    {
        self::$stringQuery = "INSERT INTO " . $table . " ( ";
        $params = "";
        for ($i = 0; $i < count($keys); $i++) {
            self::$stringQuery .= $keys[$i];
            $params .= "?";
            if ($i < count($keys) - 1) {
                self::$stringQuery .= ", ";
                $params .= ", ";
            }
        }
        self::$stringQuery .= ") VALUES (" . $params . ")";
        self::$paramsArray = $values;
        self::getIns()->build();
    }
    public static function update(
        $table,
        $keys = array(),
        $values = array(),
        $conditions = array(),
        $valuesCondition =  array()
    ) {
        self::$stringQuery = "UPDATE " . $table . " SET ";
        for ($i = 0; $i < count($keys); $i++) {
            self::$stringQuery .= $keys[$i] . "= ?";
            if ($i < count($keys) - 1) {
                self::$stringQuery .= ", ";
            }
        }
        if (empty($conditions) == false) {
            self::$stringQuery .= " WHERE ";
            for ($i = 0; $i < count($conditions); $i++) {
                self::$stringQuery .= $conditions[$i] . "= ?";
                if ($i < count($conditions) - 1) {
                    self::$stringQuery .= " AND ";
                }
            }
        }
        self::$paramsArray = ($values + $valuesCondition);
        echo self::$stringQuery;
        self::getIns()->build();
    }
    public static function findAll($table)
    {
        self::$stringQuery = "SELECT * from " . $table;
        return self::getIns();
    }
    public static function find($table, $attributes = array())
    {
        self::$stringQuery = "SELECT ";
        for ($i = 0; $i < count($attributes); $i++) {
            self::$stringQuery .= $attributes[$i];
            if ($i < count($attributes) - 1) {
                self::$stringQuery .= ", ";
            }
        }
        self::$stringQuery .= " from " . $table;
        return self::getIns();
    }
    public function condition($conditions = array(), $operators = array(), $values = array())
    {
        self::$stringQuery .= " ( ";
        for ($i = 0; $i < count($conditions); $i++) {
            self::$stringQuery .= $conditions[$i] . $operators[$i] . " ?";
            if ($i < count($conditions) - 1) {
                self::$stringQuery .= " AND ";
            }
        }
        self::$stringQuery .= " ) ";
        self::$paramsArray += $values;
        return self::getIns();
    }
    public function or()
    {
        self::$stringQuery .= " OR ";
        return self::getIns();
    }
    public function where()
    {
        self::$stringQuery .= " WHERE ";
        return self::getIns();
    }
    public function join($tables = array(), $conditions = array())
    {
        for ($i = 0; $i < count($tables); $i++) {
            self::$stringQuery .= " JOIN " . $tables[$i] . " ON " . $conditions[$i];
        }
        return self::getIns();
    }
}
// echo BaseQuery::find(
//     'products',
//     [
//         'products.id as productID',
//         'categories.name as categoryName'
//     ]
// )
//     ->join(
//         ['categories', 'images'],
//         [
//             'categories.id = products.category_id',
//             'images.product_id= products.id'
//         ]
//     )
//     ->where()
//     ->condition(
//         ['id'],
//         ['='],
//         [10]
//     )
//     ->getStringQuery();
