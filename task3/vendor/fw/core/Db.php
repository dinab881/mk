<?php
namespace fw\core;
class Db
{
    use TSingleton;
    protected $pdo;

    public static $countsql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        require LIBS . '/rb.php';

        \R::setup($db['dsn'], $db['user'], $db['pass']);
        \R::freeze(true);
        //\R::fancyDebug(true);
       /* $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);*/
    }



    public function execute($sql, $params = [])
    {
        self::$countsql++;
        self::$queries[] = $sql;

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    //for selects
    public function query($sql, $params = [])
    {
        self::$countsql++;
        self::$queries[] = $sql;

        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }

}