<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Faktoriall</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href={{ asset('css/app.css') }}>

    <!-- Styles -->
</head>

<body>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Kalkulator Faktorial</h5>
                    <div class="card-body">
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="input" placeholder="Masukkan Angka"
                                    name="input">
                            </div>
                            <div class="col-md-12">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-block" type="submit" id="hitung">Hitung
                                        Faktorial</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="result"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $("document").ready(function() {
            $("#hitung").click(function(e) {
                e.preventDefault();
                var input = $('#input').val();
                if (input != parseInt(input, 10)) {
                    $("#input").css('border', 'solid 2px red');
                    $("#result").text('Please enter an integer')
                    $("#result").css('color', 'red');
                } else {
                    $("#input").css('border', 'solid 1px #ccc');
                    var callDetails = {
                        type: 'POST',
                        url: '/faktorial',
                        data: {
                            'number': input
                        }
                    };
                    $.ajax(callDetails).done(function(factorial) {
                        console.log('Done Calling');
                        console.log(factorial);
                        $("#result").css('color', 'black');
                        $("#result").text('Faktorial dari ' + input + ' adalah: ' + factorial
                            .result);
                    });
                }
            });
        });
    </script>
</body>

</html>
