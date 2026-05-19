    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="logo-area">
                        <img src="logo4.png" alt="IT-Куб">
                        <span>IT-Universe</span>
                    </div>
                    <p>Центр цифрового образования детей «IT-Куб. Находка» — бесплатное обучение IT-навыкам для детей и подростков 7–17 лет.</p>
                </div>

                <div class="footer-col">
                    <h4>Навигация</h4>
                    <a href="index.php">Главная</a>
                    <a href="information.php">О нас</a>
                    <a href="schedule.php">Расписание</a>
                    <a href="contact.php">Контакты</a>
                    <a href="registr.php">Регистрация</a>
                </div>

                <div class="footer-col">
                    <h4>Контакты</h4>
                    <a><i class="fas fa-phone" style="color:var(--primary);margin-right:8px;"></i> +7 (924) 240-22-87</a>
                    <a><i class="fas fa-envelope" style="color:var(--primary);margin-right:8px;"></i> itcube25@yandex.ru</a>
                    <a><i class="fas fa-map-marker-alt" style="color:var(--primary);margin-right:8px;"></i> ул. Юбилейная, 12, 3 этаж</a>
                    <a style="margin-left:32px;">г. Находка, 692900</a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2022–<?= date('Y') ?> IT-Куб Находка &nbsp;•&nbsp; Центр цифрового образования детей &nbsp;•&nbsp; Все права защищены</p>
                <p style="display:flex;align-items:center;gap:6px;">
                    <span style="width:8px;height:8px;background:var(--primary);border-radius:50%;display:inline-block;"></span>
                    Бесплатное обучение
                </p>
            </div>
        </div>
    </footer>

    <script>
    // Scroll animation observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, i * 80);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

    // Active nav link
    const links = document.querySelectorAll('.links a');
    const current = window.location.pathname.split('/').pop();
    links.forEach(link => {
        if (link.getAttribute('href') === current) {
            link.classList.add('active');
        }
    });
    </script>
</body>
</html>
