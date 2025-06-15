<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WarungAbdya - Landing Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .bg {
            background: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            width: 100vw;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0,0,0,0.6);
            z-index: 2;
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 3;
            text-align: center;
            color: #fff;
            width: 90vw;
            max-width: 350px;
        }
        .title {
            font-family: 'Montserrat', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .subtitle {
            font-family: 'Open Sans', sans-serif;
            font-size: 1.1rem;
            font-weight: 400;
            margin-bottom: 2rem;
        }
        .btn {
            background: linear-gradient(90deg, #ff7300 0%, #ff9100 100%);
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 0.8rem 2.5rem;
            font-size: 1rem;
            font-family: 'Open Sans', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            box-shadow: 0 4px 16px rgba(255, 115, 0, 0.2);
        }
        .btn:hover {
            background: linear-gradient(90deg, #ff9100 0%, #ff7300 100%);
        }
    </style>
</head>
<body>
    <div class="bg" style="@if(isset(
        $landing) && $landing->background_image)background-image: url('{{ $landing->background_image }}');@endif"></div>
    <div class="overlay"></div>
    <div class="content">
        <div class="title">{{ $landing->title ?? 'WarungAbdya' }}</div>
        <div class="subtitle">{{ $landing->subtitle ?? 'Nikmati hidangan lezat diantar ke rumah Anda' }}</div>
        <a href="{{ route('login') }}" class="btn" style="display:inline-block;text-decoration:none;">{{ $landing->button_text ?? 'Mulai Sekarang' }}</a>
    </div>
</body>
</html> 