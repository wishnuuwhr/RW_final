<?php

class Edit_model extends CI_Model
{
    
    public function createPuisi($data)
    {
        $this->db->insert('puisi', $data);
        return $this->db->affected_rows();
    }

    public function updatePuisi($data, $id)
    {
        $this->db->update('puisi', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
    

}