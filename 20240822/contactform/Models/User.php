<?php
require_once(ROOT_PATH . 'Models/Db.php');

class User extends Db {

    public function __construct($dbh = null) {
        parent::__construct($dbh);
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create(string $name, string $kana, string $email, string $password) {
        try {
            // 重複アドレスの確認
            $query = 'SELECT COUNT(*) as count FROM users WHERE email = :email';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if ($result->count != 0) {
                return false; // メールアドレスが重複している場合はfalseを返却
            }

            // 重複がない場合は処理を続行
            $this->dbh->beginTransaction();
            $query = 'INSERT INTO users (name, kana, email, password) VALUES (:name, :kana, :email, :password)';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':kana', $kana, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
            $stmt->execute();
            $lastId = $this->dbh->lastInsertId();
            $this->dbh->commit();

            return $lastId; // ユーザーIDを返却
        } catch (PDOException $e) {
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }

    public function certification(string $email, string $password) {
        try {
            $query = 'SELECT id, password FROM users WHERE email = :email';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (is_array($result) && count($result) === 1) {
                $result_password = $result[0]['password'];
                if (password_verify($password, $result_password)) {
                    return $result[0];
                }
                return false;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "認証エラー: " . $e->getMessage() . "\n";
            exit();
        }
    }

    public function getMyPage(string $id): stdClass {
        try {
            $query = 'SELECT * FROM users WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "認証エラー: " . $e->getMessage() . "\n";
            exit();
        }
    }

    public function update(string $id, string $name, string $kana, string $email, string $password = null): bool {
        try {
            // 重複アドレスの確認
            $query = 'SELECT COUNT(*) as count FROM users WHERE email = :email AND id <> :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);

            if ($result->count == '0') {
                // 重複がない場合は処理を続行
                $this->dbh->beginTransaction();
                $query =  'UPDATE users SET name = :name, kana = :kana, email = :email';
                if (!empty($password)) {
                    $hash = password_hash($password, PASSWORD_BCRYPT);
                    $query .= ', password = :password';
                }
                $query .= ' WHERE id = :id';
                $stmt = $this->dbh->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':kana', $kana);
                $stmt->bindParam(':email', $email);
                if (!empty($password)) {
                    $stmt->bindParam(':password', $hash);
                }
                $stmt->execute();
                $this->dbh->commit();
                return true;
            } else {
                return false; // メールアドレスが重複している場合はfalseを返却
            }
        } catch (PDOException $e) {
            $this->dbh->rollBack();
            echo "登録失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }

    public function deleteUserAccount(string $id) {
        try {
            $this->dbh->beginTransaction();
            $query = 'DELETE FROM users WHERE id = :id';
            $stmt = $this->dbh->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $this->dbh->commit();
            return; // トランザクションを完了することでデータの削除を確定させる
        } catch (PDOException $e) {
            $this->dbh->rollBack();
            echo "退会失敗: " . $e->getMessage() . "\n";
            exit();
        }
    }
}
