<?php

class Admin
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUsers()
    {
        $this->db->query('SELECT * FROM users');

        $results = $this->db->resultSet();

        return $results;
    }

    public function getUserById($userId)
    {
        $this->db->query('SELECT * FROM users WHERE id=:user_id');

        // Bind values
        $this->db->bind(':user_id', $userId);

        $row = $this->db->single();

        return $row;
    }

    // Edit user
    public function editUser($data)
    {
        $this->db->query('UPDATE users SET name=:name, email=:email, role=:role WHERE id=:user_id');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete user
    public function deleteUser($id)
    {
        $this->db->query('DELETE FROM users WHERE id=:user_id');
        // Bind values
        $this->db->bind(':user_id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAttempts()
    {
        $this->db->query('SELECT *,
                            attempts.id as attemptId,
                            users.id as userId
                            FROM attempts
                            INNER JOIN users
                            ON attempts.user_id = users.id
                            ORDER BY attempts.attempted_at DESC
                            ');

        $results = $this->db->resultSet();

        return $results;
    }
}
    