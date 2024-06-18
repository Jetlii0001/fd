<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V-Item Modifier</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #v-item-frame {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <iframe id="v-item-frame" src="https://v-item.ru"></iframe>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('service-worker.js')
                .then(function(registration) {
                    console.log('Service Worker зарегистрирован:', registration);
                }).catch(function(error) {
                    console.error('Ошибка регистрации Service Worker:', error);
                });
        }
    </script>
</body>
</html>
