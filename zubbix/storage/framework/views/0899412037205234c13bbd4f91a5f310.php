
<head>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a2e; /* Темный фон для страницы */
            color: #ffffff; /* Белый текст */
            padding: 20px;
            margin: 0;
        }
        .rar {
            width: 100%;
            border-collapse: collapse;
            background-color: #16213e; /* Темный фон таблицы */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); /* Тень для таблицы */
            border-radius: 10px; /* Закругленные углы */
            overflow: hidden; /* Скрыть лишние края */
        }
        .tabl {
            padding: 20px; /* Увеличенное внутреннее поле */
            text-align: left;
            font-size: 18px; /* Более крупный шрифт */
            border-bottom: 1px solid #333; /* Темная линия между строками */
        }
        .taeble:nth-child(even) {
            background-color: #1f4068; /* Цвет для четных строк */
        }
        .taeble:hover {
            background-color: #00adb5; /* Цвет при наведении на строку */
        }
        #b {
            background-color: #00adb5; /* Ярко-голубой цвет заголовка */
            color: white;
        }
        .ping-button {
            background-color: #00adb5; /* Ярко-голубой цвет кнопки */
            color: white;
            border: none;
            padding: 15px 25px; /* Увеличенные отступы кнопки */
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px; /* Увеличенный шрифт кнопки */
            transition: background-color 0.3s, transform 0.2s; /* Плавный переход цвета и эффекта нажатия */
        }
        .ping-button:hover {
            background-color: #007d7b34; /* Цвет кнопки при наведении */
            transform: scale(1.05); /* Увеличение кнопки при наведении */
        }
        .ping-result {
            font-weight: bold;
            color: #f0f0f0; /* Светлый текст результата */
            font-size: 18px; /* Увеличенный шрифт результата */
        }
        .button-container {
    text-align: center; /* Центрирование содержимого */
    margin-top: 20px; /* Отступ сверху для кнопки */
}

.button-container a {
    padding: 15px 30px; 
    background-color: #00adb5; 
    color: white; 
    text-decoration: none;
    border-radius: 5px; 
    font-size: 18px; 
    transition: background-color 0.3s; 
}

.button-container a:hover {
    background-color: #007d7a; 
}

        </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Устройства</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
    

    <table class="rar">
        <thead>
            <tr class="taeble" id="b">
                <th class="tabl"  id="a">Имя</th>
                <th class="tabl" id="a">IP-адрес</th>
                <th class="tabl"  id="a">Действия</th>
                <th class="tabl"  id="a">Результат</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="taeble">
                    <td class="tabl"><?php echo e($device->name); ?></td>
                    <td class="tabl"><?php echo e($device->ip_address); ?></td>
                    <td class="tabl">
                    <div class="png">
                        <button class="ping-button png"  data-id="<?php echo e($device->id); ?>">Проверка состояния</button>
                    </div>
                    </td>
                    <td class="tabl">
                        <span class="ping-result" id="result-<?php echo e($device->id); ?>"></span>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="button-container">
    <a href="/createdevices" class="tabl">Добавить устройство</a>
</div>

    <script>
        $(document).on('click', '.ping-button', function() {
            const deviceId = $(this).data('id');
            const resultDisplay = $('#result-' + deviceId);

            resultDisplay.text('Проверка...'); 


            $.ajax({
                url: '/devices/ping/' + deviceId,
                type: 'POST',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>' 
                },
                success: function(response) {
                    resultDisplay.text(response.message); 
                },
                error: function(xhr) {
                    resultDisplay.text('Ошибка при пинге устройства'); 
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\zubbix\resources\views/devices/index.blade.php ENDPATH**/ ?>