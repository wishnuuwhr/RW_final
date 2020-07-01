<?php

class Puisi_model extends CI_Model
{
    
    public function getPuisi($id = null)
    {
        if($id === null) {
            return $this->db->get('puisi')->result_array();
        } else {
            return $this->db->get_where('puisi', ['id' => $id])->result_array;
        }
    }

    // public function createPuisi($data)
    // {
    //     $this->db->insert('puisi', $data);
    //     return $this->db->affected_rows();
    // }

    // public function updatePuisi($data, $id)
    // {
    //     $this->db->update('puisi', $data, ['id' => $id]);
    //     return $this->db->affected_rows();
    // }
    

}