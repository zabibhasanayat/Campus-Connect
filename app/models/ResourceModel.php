<?php
class ResourceModel {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all resources
    public function getResources() {
        $this->db->query('SELECT * FROM resources ORDER BY name ASC');
        return $this->db->resultSet();
    }

    // Add this method to your existing ResourceModel.php

public function searchResources($query = '', $type = '', $location = '', $capacity = 0, $availability = '', $sort = 'name') {
    // Build SQL query
    $sql = "SELECT 
                resource_id,
                name,
                type,
                location,
                capacity,
                available_capacity
            FROM resources 
            WHERE 1=1";
    
    // Add search query filter
    if (!empty($query)) {
        $sql .= " AND (name LIKE :query OR location LIKE :query OR type LIKE :query)";
    }
    
    // Add type filter
    if (!empty($type)) {
        $sql .= " AND type = :type";
    }
    
    // Add location filter
    if (!empty($location)) {
        $sql .= " AND location = :location";
    }
    
    // Add capacity filter
    if ($capacity > 0) {
        $sql .= " AND capacity >= :capacity";
    }
    
    // Add availability filter
    if ($availability == 'available') {
        $sql .= " AND available_capacity > 0";
    } elseif ($availability == 'limited') {
        $sql .= " AND available_capacity > 0 AND available_capacity < capacity";
    }
    
    // Add sorting
    switch($sort) {
        case 'capacity':
            $sql .= " ORDER BY capacity DESC";
            break;
        case 'availability':
            $sql .= " ORDER BY available_capacity DESC";
            break;
        default:
            $sql .= " ORDER BY name ASC";
    }
    
    $this->db->query($sql);
    
    // Bind parameters
    if (!empty($query)) {
        $this->db->bind(':query', '%' . $query . '%');
    }
    if (!empty($type)) {
        $this->db->bind(':type', $type);
    }
    if (!empty($location)) {
        $this->db->bind(':location', $location);
    }
    if ($capacity > 0) {
        $this->db->bind(':capacity', $capacity);
    }
    
    return $this->db->resultSet();
}


    // Get a single resource by ID
    public function getResourceById($id) {
        $this->db->query('SELECT * FROM resources WHERE resource_id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    // Decrease available capacity when booking is approved
    public function decreaseCapacity($resource_id) {
        $this->db->query('UPDATE resources 
                         SET available_capacity = available_capacity - 1 
                         WHERE resource_id = :id AND available_capacity > 0');
        $this->db->bind(':id', $resource_id);
        return $this->db->execute();
    }

    // Increase available capacity when booking is rejected/cancelled
    public function increaseCapacity($resource_id) {
        $this->db->query('UPDATE resources 
                         SET available_capacity = available_capacity + 1 
                         WHERE resource_id = :id AND available_capacity < capacity');
        $this->db->bind(':id', $resource_id);
        return $this->db->execute();
    }

    // Check if resource has available capacity
    public function hasAvailableCapacity($resource_id) {
        $this->db->query('SELECT available_capacity FROM resources WHERE resource_id = :id');
        $this->db->bind(':id', $resource_id);
        $resource = $this->db->single();
        
        return ($resource && $resource->available_capacity > 0);
    }
}
