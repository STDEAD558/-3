<?php
$page_title = 'Расписание | IT-Universe | IT-Куб Находка';
include 'header.php';
?>

<section class="section">
    <div class="container">

        <div class="section-header fade-in">
            <div class="tag">📅 Актуальное расписание</div>
            <h1 style="font-size:clamp(32px,5vw,58px);margin-bottom:16px;">Расписание занятий</h1>
            <p>Скачивайте актуальные файлы расписания и планируйте время</p>
        </div>

        <?php
        $stmt = $conn->query("SELECT id, filename, original_name, upload_date FROM schedules ORDER BY upload_date DESC");
        $files = $stmt->fetchAll();

        if (empty($files)): ?>
            <div class="empty-state fade-in">
                <span class="empty-icon">📭</span>
                <h3>Расписание ещё не загружено</h3>
                <p>Администратор скоро добавит файлы расписания. Попробуйте зайти позже.</p>
                <a href="contact.php" class="button" style="margin-top:28px;">
                    <i class="fas fa-phone"></i> Связаться с нами
                </a>
            </div>
        <?php else: ?>
            <div class="files-grid">
                <?php foreach ($files as $i => $file):
                    $name = htmlspecialchars($file['original_name']);
                    $link = 'uploads/' . htmlspecialchars($file['filename']);
                    $date = date('d.m.Y в H:i', strtotime($file['upload_date']));
                ?>
                <a href="<?= $link ?>" target="_blank" class="file-card fade-in" style="transition-delay:<?= $i * 0.08 ?>s; display:flex; text-decoration:none;">
                    <div class="file-icon">📊</div>
                    <div>
                        <div class="file-name"><?= $name ?></div>
                        <div class="file-date"><i class="fas fa-clock" style="margin-right:5px;"></i><?= $date ?></div>
                    </div>
                    <div style="margin-left:auto;color:var(--primary);font-size:20px;display:flex;align-items:center;">
                        <i class="fas fa-download"></i>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div style="margin-top:80px;text-align:center;" class="fade-in">
            <div style="background:var(--dark-card);border:1px solid var(--border);border-radius:24px;padding:48px 40px;max-width:700px;margin:0 auto;">
                <div style="font-size:48px;margin-bottom:16px;">❓</div>
                <h3 style="margin-bottom:12px;">Есть вопросы по расписанию?</h3>
                <p style="color:var(--text-muted);margin-bottom:28px;font-size:16px;">Свяжитесь с нами — ответим в течение рабочего дня</p>
                <a href="contact.php" class="button" style="font-size:16px;padding:14px 36px;">
                    <i class="fas fa-paper-plane"></i> Написать нам
                </a>
            </div>
        </div>

    </div>
</section>

<?php include 'footer.php'; ?>
