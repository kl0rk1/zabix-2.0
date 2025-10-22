
<head>
    <style>
         body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a2e; 
            color: #ffffff;
            padding: 20px;
            margin: 0;
        }
        .rar {
            width: 100%;
            border-collapse: collapse;
            background-color: #16213e; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); 
            border-radius: 10px; 
            overflow: hidden; 
        }
        .tabl {
            padding: 20px; 
            text-align: left;
            font-size: 18px;
            border-bottom: 1px solid #333; 
        }
        .taeble:nth-child(even) {
            background-color: #1f4068; 
        }
        .taeble:hover {
            background-color: #00adb5; 
        }
        #b {
            background-color: #00adb5; 
            color: white;
        }
        .ping-button {
            background-color: #00adb5; 
            color: white;
            border: none;
            padding: 15px 25px; 
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px; 
            transition: background-color 0.3s, transform 0.2s; 
        }
        .ping-button:hover {
            background-color: #007d7b34;
            transform: scale(1.05); 
        }
        .ping-result {
            font-weight: bold;
            color: #f0f0f0; 
            font-size: 18px; 
        }
        .button-container {
    text-align: center; 
    margin-top: 20px; 
}

.button-container a {
    display: inline-block; 
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
            @foreach ($devices as $device)
                <tr class="taeble">
                    <td class="tabl">{{ $device->name  }}</td>
                    <td class="tabl">{{ $device->ip_address }}</td>
                    <td class="tabl">
                    <div class="png">
                        <button class="ping-button png"  data-id="{{ $device->id }}">Проверка состояния</button>
                    </div>
                    </td>
                    <td class="tabl">
                        <span class="ping-result" id="result-{{ $device->id }}"></span>
                    </td>
                </tr>
            @endforeach
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
                    _token: '{{ csrf_token() }}' 
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
