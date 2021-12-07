<?php
class database {
    public $host       = 'localhost';
    public $dbname     = 'exositetest';
    public $utf        = 'utf8';
    public $username   = 'root';
    public $password   = '';
    

    public function connexion() {
        
            $db = 
        new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=". $this->utf, $this->username, $this->password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        
        return $db;          
                
        
    }
}
