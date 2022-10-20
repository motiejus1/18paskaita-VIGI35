<?php

//trait - jos neturi konstruktoriaus ir destruktoriaus. use zodeli, iskarto paveldeti databaseManager, ir kai susikuria employee objektas,

// paveldziu traito savybes

//class su statiniais metodais - jos neturi konstruktoriaus ir destruktoriaus. Man net nereiketu kurtis objekto

//class

// trukumas - greitaveika
//  privalumas - konstruktorius destruktorius, automatiniam duomenu bazes uzdarymui/atidarymui

class DatabaseManager {

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'production';

    protected $conn;

    public function __construct() {
    
        try { 
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            //echo "Prisijungta prie duomenu bazes";
        } catch (PDOException $e) {
           
            echo "Klaida: " . $e->getMessage();
        }
    }


    public function select($table) {
        // SELECT * FROM `kompanijos` WHERE 1
        $sql = "SELECT * FROM `$table` WHERE 1";
        try {

            //paruosti prisijungima uzklausos vykdymui
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //kad rodytu klaidas
            //paruosti uzklausa vykdymui
            $stmt = $this->conn->prepare($sql);
            //vykdyti uzklausa
            $stmt->execute();

            //rezultato pasidejimas

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); // lenteles pasirnkti duomenys yra paverciami i asociatyvu masyva
            $result = $stmt->fetchAll();

            return $result; //visas kompanijas kaip asociatyvu masyva

        } catch (PDOException $e) {
            echo "Klaida: " . $e->getMessage();
        }
    }

    public function insert($table, $cols, $values) {    

        $cols = implode(',', $cols); // pavadinimas,aprasymas
        
        for ($i=0; $i < count($values); $i++) { 
            $values[$i] = "'".$values[$i]."'";
        }
        
        $values = implode(',', $values); // pavadinimas',aprasymas'

        

        //lentele gali tureti skirtingus stuleplius, skirtingas ivedamas reiksmes
        $sql = "INSERT INTO `$table`($cols) VALUES ($values)";

        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //exec komanda naudojama kai uzklausa negrazina rezulatu
            $this->conn->exec($sql);

            echo "irasas   sekmingai pridetas";
        }
        catch(PDOException $e) {
            echo "Klaida: " . $e->getMessage();
        }
    }

    public function delete($table, $col, $id) {
        

        $sql = "DELETE FROM `$table` WHERE $col='$id'";
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec($sql);
        }
        catch(PDOException $e) {
            echo "Klaida: " . $e->getMessage();
        }

    }
    public function update($table, $id, $data) {
        //$data - array

        $cols = array_keys($data); // ["vardas", "pavarde", "miestas", "kompanijosID"]
        $values = array_values($data); // ["test", "test", "Kaunas", 5]

        $dataString = [];

        for($i = 0; $i < count($data); $i++) {
            $dataString[] = $cols[$i] . "='" . $values[$i]. "'";
        }
        //implode - masyva pavercia i stringa pagal zenkla

        $sql = "UPDATE `$table` SET $dataString WHERE id='$id'";
        try {
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec($sql);
        }
        catch(PDOException $e) {
            echo "Klaida: " . $e->getMessage();
        }

    }

    public function __destruct() {
        // 3. Atsijungimas nuo duomenu bazes
        $this->conn = null; //prisijungimas = null,
        //echo "  Atsijungta nuo duomenu bazes";
    }
}

