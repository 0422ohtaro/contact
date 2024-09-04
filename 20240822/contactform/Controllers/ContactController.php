<?php
require_once __DIR__ . '/../libs/Smarty.class.php';
require_once __DIR__ . '/../Controllers/Controller.php';
require_once __DIR__ . '/../Models/Contact.php';

class ContactController extends Controller {
    public function index() {
        $_SESSION['contact_step'] = 'index';
        $contactModel = new Contact();
        $contacts = $contactModel->getAllContacts();
        $csrfToken = $this->generateCsrfToken();
    
        $this->view('contact/index', [
            'contacts' => $contacts,
            'csrf_token' => $csrfToken
        ]);
    }
    

    public function delete() {
        if (!isset($_GET['id'])) {
            header('Location: /contact/index');
            exit();
        }
    
        $id = $_GET['id'];
        $contact = new Contact();
        $contact->deleteContact($id);
    
        header('Location: /contact/index');
        exit();
    }
    

    public function confirm() {
        
        if ($_SESSION['contact_step'] !== 'index') {
            header('Location: /contact/index');
            exit();
        }
        $_SESSION['contact_step'] = 'confirm';

        $data = $_POST;
        if (!isset($data['csrf_token']) || !$this->isValidCsrfToken($data['csrf_token'])) {
            throw new Exception('Invalid CSRF token');
        }

        // $data = array_map(function($value) {
        //     return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        // }, $data);

        $_SESSION['contact_data'] = $data;
        $csrfToken = $this->generateCsrfToken();

        $this->view('contact/confirm', [
            'contact' => $data,
            'csrf_token' => $csrfToken
        ]);

    }

    public function complete() {
        if ($_SESSION['contact_step'] !== 'confirm') {
            header('Location: /contact/index');
            exit();
        }
        $_SESSION['contact_step'] = 'complete';

        $data = $_SESSION['contact_data'] ?? null;
        if (!$data || !isset($data['csrf_token']) || !$this->isValidCsrfToken($data['csrf_token'])) {
            throw new Exception('Invalid CSRF token');
        }

        $contactModel = new Contact();
        $contactModel->createContact($data);

        unset($_SESSION['contact_data']);

        $this->view('contact/complete');

            }

    private function validate($data) {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name'] = '氏名は必須です。';
        }

        if (empty($data['kana'])) {
            $errors['kana'] = 'フリガナは必須です。';
        }

        if (empty($data['tel'])) {
            $errors['tel'] = '電話番号は必須です。';
        } elseif (!preg_match('/^\d{10,11}$/', $data['tel'])) {
            $errors['tel'] = '電話番号は10桁または11桁の数字でなければなりません。';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'メールアドレスは必須です。';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'メールアドレスの形式が正しくありません。';
        }

        if (empty($data['body'])) {
            $errors['body'] = 'お問い合わせ内容は必須です。';
        }

        return $errors;
    }

    public function edit() {
        $_SESSION['contact_step'] = 'edit';
        if (!isset($_GET['id'])) {
            header('Location: /contact/index');
            exit();
        }
    
        $id = $_GET['id'];
        $contact = new Contact();
        $contactData = $contact->getContactById($id);
    
        if (!$contactData) {
            header('Location: /contact/index');
            exit();
        }
    
        $csrfToken = $this->generateCsrfToken();

        $this->view('contact/edit', [
            'csrf_token' => $csrfToken,
            'contact' => $contactData
        ]);

            }

    public function update() {
        if ($_SESSION['contact_step'] !== 'edit') {
            header('Location: /contact/index');
            exit();
        }
        $_SESSION['contact_step'] = 'update';
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /contact/index');
            exit();
        }
    
        $data = $_POST;
        if (!isset($data['csrf_token']) || !$this->isValidCsrfToken($data['csrf_token'])) {
            throw new Exception('Invalid CSRF token');
        }
    
        $id = $data['id'];
        unset($data['csrf_token']);
    
        $contact = new Contact();
        $contact->updateContact($id, $data);
    
        header('Location: /contact/index');
        exit();
    }
}
?>
