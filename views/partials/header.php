<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">QL Tour</a>
        <div class="navbar-nav ms-auto">
            <?php if (isAdmin()): ?>
                <a class="nav-link" href="/admin">Admin</a>
                <a class="nav-link" href="/admin/tours">Tour</a>
                <a class="nav-link" href="/logout">Đăng xuất</a>
            <?php elseif (isHdv()): ?>
                <a class="nav-link" href="/hdv">HDV</a>
                <a class="nav-link" href="/hdv/tours">Tour</a>
                <a class="nav-link" href="/logout">Đăng xuất</a>
            <?php else: ?>
                <a class="nav-link" href="/login">Đăng nhập</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
<div class="container"></div>