<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        const base_url = '{{ $base_url }}';
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
<div class="header-box">
    <div class="title-box">
        <h1>Dashboard</h1>
    </div>
    <div>
        <div class="select-box">
            <div class="select-label-box">
                <label class="select-label" for="coinslist">
                    Sélectionnez une cryptomonnaie
                </label>
            </div>
            <div class="select-input-box">
                <select class="select" id="coinslist">
                    @foreach($coins_info as $coin)
                        <option value="{{ $coin['id'] }}">{{ $coin['name'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<div id="chart-box">
</div>
</body>

</html>
