<!DOCTYPE html>
<html>
<head>

    <title>Sohbet GPT</title>
    <link href='https://fonts.googleapis.com/css?family=Space Grotesk' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .logo {
            font-family: Arial, sans-serif; /* Kullanılacak font */
            font-size: 29px; /* Yazı boyutu */
            font-weight: bold; /* Kalın Yazı */
            color: #333; /* Yazı rengi */
            background-color: #f8f8f8; /* Arka plan rengi */
            padding: 10px 20px; /* İçerik padding değerleri */
            border-radius: 5px; /* Kenar yuvarlatma */
            display: inline-block;
        }
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow:
                3.3px 2px 2.2px rgba(0, 0, 0, 0.07),
                7.8px 4.8px 5.3px rgba(0, 0, 0, 0.05),
                14.8px 9px 10px rgba(0, 0, 0, 0.042),
                26.4px 16.1px 17.9px rgba(0, 0, 0, 0.035),
                49.3px 30.1px 33.4px rgba(0, 0, 0, 0.028),
                118px 72px 80px rgba(0, 0, 0, 0.02);
        }


        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .card-body p {
            margin-bottom: 0;
        }

        .input-group {
            margin-bottom: 20px;
        }
        .user-a{
            color: #2ac02a;
        }
        .user-m{
            text-align: right;
            color: #ff0000;
        }
        .card-body-as{
            font-size: 22px;
        }
        .card-body-us{
            text-align: right;
            font-size: 22px;
        }
        .css-button-shadow-border-sliding--red {
            min-width: 130px;
            height: 40px;
            text-decoration: none;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            outline: none;
            border-radius: 5px;
            border: none;
            box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5), 7px 7px 20px 0px rgba(0,0,0,.1), 4px 4px 5px 0px rgba(0,0,0,.1);
            background: #d90429;
            z-index: 1;
        }
        .css-button-shadow-border-sliding--red:hover{
            color: #3a3a3a;
        }
        .css-button-shadow-border-sliding--red:hover:after {
            width: 100%;
            left: 0;
        }
        .css-button-shadow-border-sliding--red:after {
            border-radius: 5px;
            position: absolute;
            content: "";
            width: 0;
            height: 100%;
            top: 0;
            z-index: -1;
            box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5), 7px 7px 20px 0px rgba(0,0,0,.1), 4px 4px 5px 0px rgba(0,0,0,.1);
            transition: all 0.3s ease;
            background-color: #ef233c;
            right: 0;
        }
        .css-button-shadow-border-sliding--red:active {
            top: 2px;
        }
        .css-button-neumorphic {
            min-width: 130px;
            height: 40px;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            outline: none;
            border-radius: 5px;
            border: none;
            background: #efefef;
            box-shadow: 2px 2px 4px #c8d0e7, -1px -1px 3px #fff;
            color: #585858;
        }
        .css-button-neumorphic:active {
            box-shadow: inset 1px 1px 3px #c8d0e7, inset -1px -1px 3px #fff;
        }
    </style>
</head>

<body>
<div class="logo">
    Sohbet-GPT
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($Sorular as $soru)
                <div class="card mb-3">
                    <div class="card-header @if ($soru['role'] === 'assistant') user-a @else user-m @endif">
                        @if ($soru['role'] === 'assistant')
                            Sohbet-GPT
                        @else
                            Sen
                        @endif
                    </div>
                    <div class="card-body @if ($soru['role'] === 'assistant') card-body-as @else card-body-us @endif" >
                        <p>{!! \Illuminate\Mail\Markdown::parse($soru['content']) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-md-12">
            <form class="mb-3" action="/" method="post">
                @csrf
                <div class="input-group">
                    <input name="soru" class="form-control" placeholder="Soru" autocomplete="off">
                    <button type="submit" class="css-button-neumorphic">Gönder</button>
                    <a href="/reset" class="css-button-shadow-border-sliding--red">Sohbeti Temizle</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
<footer><svg style="margin-top: 225px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,96L48,85.3C96,75,192,53,288,85.3C384,117,480,203,576,202.7C672,203,768,117,864,85.3C960,53,1056,75,1152,90.7C1248,107,1344,117,1392,122.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg></footer>
</html>
