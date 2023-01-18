<?php 

require_once __DIR__ . '/users.php';

/**
 * La classe DbManager doit pouvoir gérer n'importe quelle table de votre base de donnée
 * 
 * Complétez les fonctions suivantes pour les faires fonctionner
 */

class DbManager {
    private $db;

    function __construct(PDO $db) {
        $this->db = $db;
    }
    function isConnected() {
        return $this->db != null;
    }

    // return l'id inseré
    function insert(string $sql, array $data) {
        $hihi = $this -> db -> prepare($sql);
        $hihi->execute($data);
        return $this->db->lastInsertId();

    }

    function insert_advanced(DbObject $dbObj) {
        $class = strtolower(get_class($dbObj));
        $sql = 'INSERT INTO ' . $class. ' (';
        $columns = [];
        $values = [];
        foreach ($dbObj as $key => $value) {
            if (!empty($value)) {
                    $columns[] = $key;
                    $values[] = $value;
            }
        }
        $sql .= implode(', ', $columns);
        $sql .= ') VALUES (';
        $sql .= implode(', ', array_fill(0, count($values), '?'));
        $sql .= ')';
        return $this->insert($sql, $values);
    }
    function select(string $sql, array $data, string $className) {
        $hihi = $this -> db -> prepare($sql);
        $hihi->execute($data);
        $hihi->setFetchMode(PDO::FETCH_CLASS, $className);
        return $hihi->fetchAll();
    }

    function getById_advanced($id, string $className) {
        $class = strtolower($className);
        $hihi = $this -> db -> prepare('SELECT * FROM ' . $class . ' WHERE id = ?');
        $hihi->execute([$id]);
        $hihi->setFetchMode(PDO::FETCH_CLASS, $className);
        return $hihi->fetchAll();
    }

    function getBy(string $tableName, string $column, $value, string $className) {
        $hihi = $this -> db -> prepare('SELECT * FROM ' . $tableName . ' WHERE ' . $column . ' = ?');
        $hihi->execute([$value]);
        $hihi->setFetchMode(PDO::FETCH_CLASS, $className);
        return $hihi->fetchAll();
    }

    function getBy_advanced(string $column, $value, string $className) {
        $class = strtolower($className);
        $hihi = $this -> db -> prepare('SELECT * FROM ' . $class . ' WHERE ' . $column . ' = ?');
        $hihi->execute([$value]);
        $hihi->setFetchMode(PDO::FETCH_CLASS, $className);
        return $hihi->fetchAll();
    }

    function removeById(string $tableName, $id) {
        $hihi = $this -> db -> prepare('DELETE FROM ' . $tableName . ' WHERE id = ?');
        $hihi->execute([$id]);
    }

    function update(string $tableName, array $data) {
        $sql = 'UPDATE ' . $tableName . ' SET ';
        $keys = array_keys($data);
        // Array ( [0] => cle1 [1] => cle2 [2] => cle3 )
        $id = $data['id'];
        // 1
        $value='';

        for ($i = 1; $i < count($keys); $i++) {
            $key = $keys[$i];
            $value = $data[$key];
            $sql .= $key . ' = :'.$key.'';
            if ($i < count($keys) - 1) {
                $sql .= ', ';
            }
        }
        $sql .= ' WHERE id = :id';
        $data['id'] = $id;
        echo $sql;
        $hihi = $this->db->prepare($sql);
        $hihi ->execute($data);
    }

    // function update(string $tableName, array $data)
    // {
    //     $sql = "UPDATE " . $tableName . " SET ";
    //     foreach ($data as $key => $value) {
    //         if ($key != 'id') {
    //             $sql .= $key . " = ?, ";
    //         }
    //     }
    //     $sql = substr($sql, 0, -2) . " WHERE id = ?"; // substr($sql, 0, -2) remove last comma

    //     $id = $data['id'];
    //     $data = array_values($data);
    //     $data[] = $id;
    //     array_shift($data); // remove first element
    //     $stmt = $this->db->prepare($sql);
    //     $stmt->execute($data);
    //     return $id;
    // }


    function update_advanced(DbObject $dbObj) {
        $tableName = strtolower(get_class($dbObj));
        echo $tableName;
        $data = get_object_vars($dbObj);
        $this->update($tableName, $data);
        var_dump($data);
    }

    // CREATE TABLE `users` (
    //     `id_user` int(11) NOT NULL,
    //     `id_account` int(11) NOT NULL,
    //     `nom` varchar(255) NOT NULL,
    //     `prenom` varchar(255) NOT NULL,
    //     `telephone` int(11) NOT NULL,
    //     `email` varchar(255) NOT NULL,
    //     `password` varchar(255) NOT NULL,
    //     `role` varchar(255) NOT NULL,
    //     `created_at` datetime NOT NULL
    //   ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      
    function create_account(dbObject $dbObj) {
        $tableName = strtolower(get_class($dbObj));
        echo $tableName;
        $data = get_object_vars($dbObj);
        $sql = 'INSERT INTO ' . $tableName . ' (';
        $columns = [];
        $values = [];
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $columns[] = $key;
                $values[] = $value;
            }
        }
        $sql .= implode(', ', $columns);
        $sql .= ') VALUES (';
        $sql .= implode(', ', array_fill(0, count($values), '?'));
        $sql .= ')';
        return $this->insert($sql, $values);
    }
    function create_bank_account(dbObject $dbObj) {
        $tableName = strtolower(get_class($dbObj));
        $data = get_object_vars($dbObj);
        $sql = 'INSERT INTO ' . $tableName . ' (';
        $columns = [];
        $values = [];
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $columns[] = $key;
                $values[] = $value;
            }
        }
        $sql .= implode(', ', $columns);
        $sql .= ') VALUES (';
        $sql .= implode(', ', array_fill(0, count($values), '?'));
        $sql .= ')';
        $this->insert($sql, $values);
    }

}
