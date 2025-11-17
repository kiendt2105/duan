<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> - TourQL</title>

    <link href="<?= ADMIN_ASSET ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="<?= ADMIN_ASSET ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= ADMIN_ASSET ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">

    <div id="wrapper">
        <?php include __DIR__ . '/sidebar.php'; ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include __DIR__ . '/topbar.php'; ?>

                <div class="container-fluid">
                    <?php
                    $file = __DIR__ . '/content/' . $current_page . '.php';
                    if (file_exists($file)) {
                        include $file;
                    } else {
                        echo "<div class='alert alert-danger'>Không tìm thấy: $file</div>";
                    }
                    ?>
                </div>
            </div>
            <?php include __DIR__ . '/footer.php'; ?>
        </div>
    </div>

    <script src="<?= ADMIN_ASSET ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= ADMIN_ASSET ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= ADMIN_ASSET ?>js/sb-admin-2.min.js"></script>
    <script src="<?= ADMIN_ASSET ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= ADMIN_ASSET ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>
</html>