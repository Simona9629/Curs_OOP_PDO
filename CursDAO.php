<?php
require_once 'Database.php';

class CursDAO {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function get()
    {
        $this->db->prepareStatement("SELECT * FROM curs ORDER BY data_incepere");
        return $this->db->resultSet();
    }
    
    public function add(Curs $curs)
    {
        $this->db->prepareStatement("INSERT INTO curs VALUES(:id, :nume, :data, :sala)");
        $this->db->bind(':id', NULL);
        $this->db->bind(':nume', $curs->getNume());
        $this->db->bind(':data', $curs->getData_incepere());
        $this->db->bind(':sala', $curs->getSala());
        return $this->db->execute();
    }
    
    public function getDupaId($id)
    {
        $this->db->prepareStatement("SELECT * FROM curs WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function update(Curs $curs)
    {
        $this->db->prepareStatement("UPDATE curs SET nume = :nume, data_incepere= :data, sala= :s WHERE id = :id");
        
        $this->db->bind(':id', $curs->getId());
        $this->db->bind(':nume', $curs->getNume());
        $this->db->bind(':data', $curs->getData_incepere());
        $this->db->bind(':s', $curs->getSala());
        
        return $this->db->execute();          
    }
    
    public function delete($id)
    {
        $this->db->prepareStatement("DELETE FROM curs WHERE id= :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
