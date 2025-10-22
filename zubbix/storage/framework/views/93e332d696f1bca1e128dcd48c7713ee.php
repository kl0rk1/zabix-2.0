<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление устройства</title>
    <link rel="stylesheet" href="<?php echo e(asset('main.css')); ?>">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a2e; /* Темный фон страницы */
            color: #ffffff; /* Белый текст */
            margin: 0;
            display: flex;
            justify-content: center; /* Центрирование содержимого */
            align-items: center; /* Вертикальное центрирование */
            height: 100vh; /* Высота на весь экран */
        }

        .mk {
            background-color: #A0C4DC; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); 
            max-width: 400px; 
            width: 100%; 
            margin: auto;
        }

        h1 {
            margin-bottom: 20px; 
            color: #16213e; /* Темный цвет заголовка */
            text-align: center; /* Центрирование заголовка */
        }

        .kokol {
            font-size: 18px; 
            padding: 15px; /* Увеличенные внутренние отступы */
            width: 100%; 
            margin-bottom: 20px; 
            border: 2px solid #ccc; 
            border-radius: 5px; 
            box-sizing: border-box; 
            background-color: #ffffff; /* Белый фон для полей ввода */
            color: #333; /* Темный текст в полях ввода */
        }

        .ippip {
            font-size: 20px;
            padding: 15px; 
            width: 100%; 
            border: none; 
            border-radius: 5px; 
            color: white; 
            background-color: #00adb5; /* Ярко-голубой цвет кнопки */
            cursor: pointer; 
            transition: background-color 0.3s, transform 0.2s; /* Плавный переход цвета и эффекта нажатия */
        }

        .ippip:hover {
            background-color: #007d7a; /* Цвет кнопки при наведении */
            transform: scale(1.05); /* Увеличение кнопки при наведении */
        }
    </style>
</head>
<body>
    <footer>
        <div class="mk">
            <form action="<?php echo e(route('devices.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <h1>Добавление устройства</h1>
                <input class="kokol" type="text" name="name" placeholder="Имя устройства" required>
                <input class="kokol" type="text" name="ip_address" placeholder="IP-адрес устройства" required>
                <button class="ippip" type="submit">Добавить устройство</button>
            </form>
        </div>
    </footer>
</body>
</html>
        <?php /**PATH C:\xampp\htdocs\zubbix\resources\views/createdevices.blade.php ENDPATH**/ ?>