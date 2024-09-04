<?php

require_once 'Db.php';

class Contact {
    private $db;

    public function __construct() {
        $this->db = Db::getDB();
    }

    public function beginTransaction() {
        $this->db->beginTransaction();
    }

    public function commit() {
        $this->db->commit();
    }

    public function rollback() {
        $this->db->rollBack();
    }

    public function create($data) {
        try {
            $this->beginTransaction();
            $stmt = $this->db->prepare("INSERT INTO contacts (name, kana, tel, email, body) VALUES (:name, :kana, :tel, :email, :body)");
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':kana', $data['kana']);
            $stmt->bindParam(':tel', $data['tel']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':body', $data['body']);
            $stmt->execute();
            $this->commit();
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }

    public function getAllContacts() {
        $stmt = $this->db->query("SELECT * FROM contacts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createContact($data) {
        try {
            $this->beginTransaction();
            $stmt = $this->db->prepare("INSERT INTO contacts (name, kana, tel, email, body, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt->execute([
                $data['name'],
                $data['kana'],
                $data['tel'],
                $data['email'],
                $data['body']
            ]);
            $this->commit();
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }

    public function updateContact($id, $data) {
        try {
            $stmt = $this->db->prepare("UPDATE contacts SET name = ?, kana = ?, tel = ?, email = ?, body = ? WHERE id = ?");
            $stmt->execute([
                $data['name'],
                $data['kana'],
                $data['tel'],
                $data['email'],
                $data['body'],
                $id
            ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getContactById($id) {
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteContact($id) {
        try {
            $this->beginTransaction();
            $stmt = $this->db->prepare("DELETE FROM contacts WHERE id = ?");
            $stmt->execute([$id]);
            $this->commit();
        } catch (Exception $e) {
            $this->rollback();
            throw $e;
        }
    }
}
