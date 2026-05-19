<?php
session_start();
require_once 'connect.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['role'] != 1) {
    header("Location: auth.php");
    exit;
}

$page_title = 'Админ-панель | IT-Universe';
include 'header.php';

// Удаление файла
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("SELECT filename FROM schedules WHERE id = ?");
    $stmt->execute([$id]);
    $file = $stmt->fetch();
    if ($file) {
        $filepath = 'uploads/' . $file['filename'];
        if (file_exists($filepath)) unlink($filepath);
        $stmt = $conn->prepare("DELETE FROM schedules WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: administrator.php?msg=deleted");
    }
}

$upload_message = '';
$upload_type    = '';
$upload_dir     = 'uploads/';
if (!is_dir($upload_dir)) mkdir($upload_dir, 0755, true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excel'])) {
    $file = $_FILES['excel'];
    if ($file['error'] === 0) {
        $allowed = ['xlsx', 'xls', 'xlsm'];
        $ext     = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $new_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $file['name']);
            $target   = $upload_dir . $new_name;
            if (move_uploaded_file($file['tmp_name'], $target)) {
                $stmt = $conn->prepare("INSERT INTO schedules (filename, original_name, uploaded_by) VALUES (?, ?, ?)");
                $stmt->execute([$new_name, $file['name'], $_SESSION['user_id']]);
                $upload_message = "Файл успешно загружен!";
                $upload_type    = 'success';
            } else {
                $upload_message = "Ошибка при сохранении файла.";
                $upload_type    = 'error';
            }
        } else {
            $upload_message = "Разрешены только файлы Excel (.xlsx, .xls, .xlsm)";
            $upload_type    = 'error';
        }
    }
}

$stmt  = $conn->query("SELECT id, filename, original_name, upload_date FROM schedules ORDER BY upload_date DESC");
$files = $stmt->fetchAll();

$stmt_users = $conn->query("SELECT COUNT(*) as cnt FROM users");
$user_count = $stmt_users->fetch()['cnt'];
?>

<section class="section">
    <div class="container">

        <!-- Header -->
        <div style="margin-bottom:48px;" class="fade-in">
            <div class="tag">⚙️ Администрирование</div>
            <h1 style="font-size:clamp(28px,4vw,46px);margin-top:16px;margin-bottom:8px;">
                Панель администратора
            </h1>
            <p style="color:var(--text-muted);">
                Добро пожаловать, <strong style="color:var(--primary);"><?= htmlspecialchars($_SESSION['login']) ?></strong>
            </p>
        </div>

        <!-- Stats -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:24px;margin-bottom:40px;">
            <div class="card fade-in" style="text-align:center;transition-delay:0s;">
                <div style="font-size:36px;margin-bottom:8px;">📊</div>
                <div style="font-family:'Montserrat',sans-serif;font-size:36px;font-weight:900;color:var(--primary);"><?= count($files) ?></div>
                <div style="color:var(--text-muted);font-size:15px;margin-top:4px;">Файлов расписания</div>
            </div>
            <div class="card fade-in" style="text-align:center;transition-delay:0.1s;">
                <div style="font-size:36px;margin-bottom:8px;">👥</div>
                <div style="font-family:'Montserrat',sans-serif;font-size:36px;font-weight:900;color:var(--primary);"><?= $user_count ?></div>
                <div style="color:var(--text-muted);font-size:15px;margin-top:4px;">Пользователей</div>
            </div>
            <div class="card fade-in" style="text-align:center;transition-delay:0.2s;">
                <div style="font-size:36px;margin-bottom:8px;">📅</div>
                <div style="font-family:'Montserrat',sans-serif;font-size:24px;font-weight:700;color:var(--primary);margin-top:4px;"><?= date('d.m.Y') ?></div>
                <div style="color:var(--text-muted);font-size:15px;margin-top:4px;">Сегодня</div>
            </div>
        </div>

        <!-- Upload -->
        <div class="admin-card fade-in">
            <h2><i class="fas fa-upload" style="color:var(--primary);"></i> Загрузить новое расписание</h2>

            <?php if ($upload_message): ?>
                <div class="alert alert-<?= $upload_type === 'success' ? 'success' : 'error' ?>" style="margin-bottom:24px;">
                    <i class="fas fa-<?= $upload_type === 'success' ? 'check-circle' : 'exclamation-circle' ?>"></i>
                    <?= htmlspecialchars($upload_message) ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
                <div class="alert alert-success" style="margin-bottom:24px;">
                    <i class="fas fa-check-circle"></i> Файл успешно удалён.
                </div>
            <?php endif; ?>

            <form method="post" enctype="multipart/form-data">
                <div class="upload-area" onclick="document.getElementById('fileInput').click();" style="cursor:pointer;">
                    <span class="upload-icon">📁</span>
                    <p style="font-size:17px;font-weight:600;margin-bottom:8px;">Нажмите для выбора файла</p>
                    <p>Поддерживаются: .xlsx, .xls, .xlsm</p>
                    <input type="file" id="fileInput" name="excel" accept=".xlsx,.xls,.xlsm" required
                           style="display:none;" onchange="updateLabel(this)">
                    <p id="fileLabel" style="margin-top:16px;color:var(--primary);font-weight:600;"></p>
                </div>
                <button class="button" type="submit" style="font-size:16px;padding:14px 36px;">
                    <i class="fas fa-cloud-upload-alt"></i> Загрузить на сервер
                </button>
            </form>
        </div>

        <!-- Files list -->
        <div class="admin-card fade-in">
            <h2><i class="fas fa-list" style="color:var(--primary);"></i> Загруженные расписания</h2>

            <?php if (empty($files)): ?>
                <div class="empty-state" style="padding:40px 20px;">
                    <span class="empty-icon" style="font-size:48px;">📭</span>
                    <h3>Файлы не загружены</h3>
                    <p>Загрузите первый файл расписания выше</p>
                </div>
            <?php else: ?>
                <div style="overflow-x:auto;border-radius:16px;border:1px solid var(--border);">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Файл</th>
                                <th>Дата загрузки</th>
                                <th>Просмотр</th>
                                <th>Действие</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($files as $file):
                                $name = htmlspecialchars($file['original_name']);
                                $link = 'uploads/' . htmlspecialchars($file['filename']);
                                $date = date('d.m.Y в H:i', strtotime($file['upload_date']));
                            ?>
                            <tr>
                                <td>
                                    <div style="display:flex;align-items:center;gap:12px;">
                                        <div style="width:40px;height:40px;background:rgba(0,212,184,0.1);border-radius:10px;display:grid;place-items:center;font-size:20px;">📊</div>
                                        <div>
                                            <div style="font-weight:600;"><?= $name ?></div>
                                        </div>
                                    </div>
                                </td>
                                <td style="color:var(--text-muted);"><?= $date ?></td>
                                <td>
                                    <a href="<?= $link ?>" target="_blank" class="button btn-outline" style="font-size:13px;padding:8px 18px;">
                                        <i class="fas fa-eye"></i> Открыть
                                    </a>
                                </td>
                                <td>
                                    <button onclick="if(confirm('Удалить файл «<?= addslashes($name) ?>»?')) location.href='?delete=<?= $file['id'] ?>'"
                                            class="button btn-danger" style="font-size:13px;padding:8px 18px;">
                                        <i class="fas fa-trash"></i> Удалить
                                    </button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<script>
function updateLabel(input) {
    const label = document.getElementById('fileLabel');
    if (input.files.length > 0) {
        label.textContent = '✓ Выбран файл: ' + input.files[0].name;
    }
}
</script>

<?php include 'footer.php'; ?>
