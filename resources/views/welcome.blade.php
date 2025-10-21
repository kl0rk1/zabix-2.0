<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zubbix</title>
    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a2e; 
            color: #ffffff; 
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center; 
            height: 100vh; 
        }
        .kabin {
            background-color: #16213e; 
            padding: 30px; 
            border-radius: 10px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5); 
            text-align: center; 
        }
        .naz {
            margin-bottom: 20px; 
        }
        .kabnn {
            background-color: #00adb5; 
            color: white; 
            padding: 15px 25px; 
            text-decoration: none; 
            border-radius: 5px; 
            font-size: 18px; 
            transition: background-color 0.3s, transform 0.2s; 
        }
        .kabnn:hover {
            background-color: #007d7a; 
            transform: scale(1.05); 
        }
    </style>
</head>
<body>
    <form action="devices" method="POST">
        <div class="kabin" id="fot">
            <div class="naz">
                <a href="devices" class="kabnn">На главную -></a>
            </div>
        </div>
    </form>
</body>
</html>
