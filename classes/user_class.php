<?php

require_once '../settings/db_class.php';

/**
 * 
 */


class User extends db_connection
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $date_created;
    private $phone_number;
    private $country;
    private $city;

    public function __construct($id = null)
    {
        parent::db_connect();
        if ($id) {
            $this->id = $id;
            $this->loadUser();
        }
    }


    private function loadUser($id = null)
    {
        if ($id) {
            $this->id = $id;
        }
        if (!$this->id) {
            return false;
        }
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if ($result) {
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->role = $result['role'];
            $this->date_created = isset($result['created_at']) ? $result['created_at'] : null;
            $this->phone_number = $result['phone_number'];
            $this->country = isset($result['country']) ? $result['country'] : null;
            $this->city = isset($result['city']) ? $result['city'] : null;
        }
    }

    public function createUser($name, $email, $password, $phone_number, $country, $city, $role)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->db->prepare("INSERT INTO users (name, email, password, phone_number, country, city, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            error_log('Prepare failed: ' . $this->db->error);
            return false;
        }
    $stmt->bind_param("sssssss", $name, $email, $hashed_password, $phone_number, $country, $city, $role);
        if ($stmt->execute()) {
            return $this->db->insert_id;
        } else {
            error_log('Execute failed: ' . $stmt->error);
        }
        return false;
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

}
