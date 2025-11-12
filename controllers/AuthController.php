<?php
// controllers/AuthController.php

class AuthController {
    public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // TODO: Kiểm authentic từ DB (giờ hardcode để test)
        if ($email === 'admin@example.com' && $password === '123') {
            $_SESSION['user'] = [
                'id' => 1,
                'name' => 'Admin Pro',
                'email' => $email,
                'role' => 'admin'
            ];
            header('Location: /admin');
            exit;
        }

        if ($email === 'hdv@example.com' && $password === '123') {
            $_SESSION['user'] = [
                'id' => 2,
                'name' => 'HDV Nam',
                'email' => $email,
                'role' => 'hdv'
            ];
            header('Location: /hdv');
            exit;
        }

        $error = "Sai email hoặc mật khẩu!";
    }

    require __DIR__ . '/../views/auth/login.php';
}

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }
}