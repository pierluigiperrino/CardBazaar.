<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            background-color: #fff;
            padding: 0;
            margin: 0;
            background-image: url('../../../public/assets/images/background.png');
            background-size: cover;
            background-repeat: repeat;
        }

        .header {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0px;
            padding: 0px;
            background-color:#422168;
            height: 60px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-bottom: 5px solid #FFC107;
        }

        h3 {
            color: #fff;
            font-size: 28px;
        }

        .content {
            width: 50%;
            margin: 5% 30%;
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: center;
        }

        .info {
            display: flex;
            justify-content: start;
            margin-left: 30px;
            align-items: center;
            margin-bottom: 10px;
        }

        .centrato {
            text-decoration: underline;
        }

        .label {
            color: #000;
            font-size: 20px;
            margin: 0;
        }

        .value {
            color: #000;
            font-size: 18px;
            margin: 0;
        }

        .make-revisor-button {
            background-color: #422168;
            color: #fff;
            font-size: 18px;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .make-revisor-button a {
            text-decoration: none;
        }

        .footer {
            background-color: #422168;
            color: #fff;
            text-align: center;
            padding: 10px;
            border-top: solid 5px #FFC107;
        }
    </style>
</head>

<body>
    <div class="header">
        <h3>CardBazaar.</h3>
    </div>

    <div class="content">
        <div class="info centrato" style="margin-bottom: 30px;">
            <p class="label"><strong>L'utente {{$user->name}} ha chiesto di diventare un revisore.</strong></p>

        </div>
        <div class="info label" style="margin-bottom: 15px;"><strong>Mail:</strong>
            <span class="value">{{$user->email}}</span>
        </div>
        <div class="info label" style="margin-bottom: 15px;"><strong>Utente registrato il: </strong>
            <span class="value">{{$user->created_at->format('d/m/Y')}}</span>
        </div>

        <div class="info label" style="margin-bottom: 5px;"><strong>Messaggio: </strong></div>

        <div class="info value" style="margin-bottom: 30px;">{{$content['aboutYou']}}</div>
        <div class="info label">
            <button class="make-revisor-button "><a href="{{route('make.revisor', compact('user'))}}"
                    style="color:#fff;">Rendi revisore</a></button>
        </div>
    </div>
    <div class="footer">
        <p>Copyright &copy; Designed by DevelHopers, 2023</p>
    </div>
</body>

</html>
