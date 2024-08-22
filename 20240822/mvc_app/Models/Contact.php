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
            $stmt->bindParam(':name', htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8'));
            $stmt->bindParam(':kana', htmlspecialchars($data['kana'], ENT_QUOTES, 'UTF-8'));
            $stmt->bindParam(':tel', htmlspecialchars($data['tel'], ENT_QUOTES, 'UTF-8'));
            $stmt->bindParam(':email', htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8'));
            $stmt->bindParam(':body', htmlspecialchars($data['body'], ENT_QUOTES, 'UTF-8'));
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
                htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($data['kana'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($data['tel'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($data['body'], ENT_QUOTES, 'UTF-8')
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
                htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($data['kana'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($data['tel'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8'),
                htmlspecialchars($data['body'], ENT_QUOTES, 'UTF-8'),
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
