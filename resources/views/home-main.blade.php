      
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الموقع قيد التطوير</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-family: 'Tahoma', sans-serif;
        }

        .logo {
            max-width: 200px;
            margin-bottom: 20px;
        }

        .card {
            padding: 40px;
            border: none;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border-radius: 16px;
            background-color: #ffffff;
        }

        .title {
            font-size: 24px;
            margin-top: 20px;
            color: #333;
        }

        .subtitle {
            font-size: 16px;
            color: #6c757d;
        }

        .logo {
            max-width: 200px;
            margin: 0 auto 20px auto;
            display: block;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="card mx-auto" style="max-width: 500px;">
            <img src="{{ asset('assets/images/logo.png') }}" alt="شعار المؤسسة" class="logo mx-auto d-block">
            <h1 class="title">الموقع قيد التطوير</h1>
            <p class="subtitle">نحن نعمل على تحسين تجربتكم، سيتم إطلاق الموقع قريباً إن شاء الله.</p>
        </div>
    </div>
</body>
</html>
