<?php
// ۱. داده‌های نمونه (آرایه اصلی)
$data = range(1, 53); // فرض می‌کنیم ۵۳ آیتم داریم

// ۲. تنظیمات صفحه‌بندی
$limit = 10; // تعداد آیتم در هر صفحه
$total_items = count($data);
$total_pages = ceil($total_items / $limit);

// گرفتن شماره صفحه از URL (پیش‌فرض صفحه ۱)
$page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
// کنترل اینکه صفحه از حد مجاز بیشتر نشود
$page = min($page, $total_pages);

// ۳. محاسبه و برش آرایه (جایگزین LIMIT و OFFSET)
$offset = ($page - 1) * $limit;
$current_page_data = array_slice($data, $offset, $limit);
?>

<!-- ۴. نمایش داده‌ها -->
<ul>
    <?php foreach ($current_page_data as $item): ?>
        <li>مورد شماره
            <?= $item ?>
        </li>
    <?php endforeach; ?>
</ul>

<!-- ۵. دکمه‌های ناوبری -->
<div>
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>" style="margin: 5px; <?= ($i == $page) ? 'color:red;' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
</div>