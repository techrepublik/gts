<?php

class MY_Model extends CI_Model {
    const DB_TABLE = 'abstract';
    const DB_TABLE_PK = 'abstract';
    
    /**
     * Create record.
     */
    private function insert() {
        $this->db->insert($this::DB_TABLE, $this);
        $this->{$this::DB_TABLE_PK} = $this->db->insert_id();
    }
    
    /**
     * Update record.
     */
    private function update() {
        $this->db->update($this::DB_TABLE, $this, array($this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK}));
    }
    
    /**
     * Populate from an array or standard class.
     * @param mixed $row
     */
    public function populate($row, $post = 0) {
        foreach ($row as $key => $value) {
            $this->$key = $value;
            if($post)
            {
                $_POST[$key] = $value;
            }
        }
    }
    
    /**
     * Load from the database.
     * @param int $id
     */
    public function load($id, $post = 0, $where = array()) {
         $where = empty($where) ? array(
           $this::DB_TABLE_PK => $id, 
        ) : $where;
        $query = $this->db->get_where($this::DB_TABLE, $where);
        $this->populate($query->row(),$post);
    }
    
    /**
     * Delete the current record.
     */
    public function delete($where = array()) {
        $where = empty($where) ? array(
           $this::DB_TABLE_PK => $this->{$this::DB_TABLE_PK}, 
        ) : $where;
        $this->db->where($where)->delete($this::DB_TABLE);
        unset($this->{$this::DB_TABLE_PK});
    }
    
    /**
     * Save the record.
     */
    public function save() {
        if ( ! empty($this->{$this::DB_TABLE_PK})) {
            $this->update();
        }
        else {
            $this->insert();
        }
    }
    
    /**
     * Get an array of Models with an optional limit, offset.
     * 
     * @param int $limit Optional.
     * @param int $offset Optional; if set, requires $limit.
     * @return array Models populated by database, keyed by PK.
     */
    public function get($limit = 0, $offset = 0) {
        if ($limit) {
            $query = $this->db->get($this::DB_TABLE, $limit, $offset);
        }
        else {
            $query = $this->db->get($this::DB_TABLE);
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;
    }
    
    public function get_where($where = array(), $limit = 0, $offset = 0) {
        if ($limit) {
            $query = $this->db->get_where($this::DB_TABLE, $where, $limit, $offset);
        }
        else {
            $query = $this->db->get_where($this::DB_TABLE, $where);
        }
        $ret_val = array();
        $class = get_class($this);
        foreach ($query->result() as $row) {
            $model = new $class;
            $model->populate($row);
            $ret_val[$row->{$this::DB_TABLE_PK}] = $model;
        }
        return $ret_val;
    }
}