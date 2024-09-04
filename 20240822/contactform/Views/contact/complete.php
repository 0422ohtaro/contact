<?php
require_once('path/to/smarty/libs/Smarty.class.php');
require_once('path/to/db_connection.php');
session_start();

error_log("Complete.php accessed with method: " . $_SERVER['REQUEST_METHOD']);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['form_data'])) {
    $form_data = $_SESSION['form_data'];

    // データベースへの書き込み
    try {
        $stmt = $db->prepare("INSERT INTO contacts (name, kana, tel, email, body) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $form_data['name'],
            $form_data['kana'],
            $form_data['tel'],
            $form_data['email'],
            $form_data['body']
        ]);

        error_log("Data inserted successfully: " . print_r($form_data, true));

        // セッションのクリア
        unset($_SESSION['form_data']);
        $_SESSION['from_confirm'] = true;

        $smarty = new Smarty();
        $smarty->template_dir = 'path/to/templates';
        $smarty->compile_dir = 'path/to/templates_c';

        $smarty->display('complete.tpl');
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        echo "データベースエラーが発生しました。再度お試しください。";
    }
} else {
    error_log("Invalid request or missing session data.");
    header('Location: /contact/index');
    exit();
}
?>