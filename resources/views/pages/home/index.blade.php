<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body>
    <x-navbar></x-navbar>
    <div class="mb-3">
        <img class="w-100" src="{{ asset('img/room_banner.jpg') }}" alt="">
    </div>
    <div class="container">
        <main class="main-content" id="main">
            <div class="mt-3">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-body">
                                    {{-- list room static --}}
                                    <div class="table-responsive">
                                        <table class="table table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Column 1</th>
                                                    <th scope="col">Column 2</th>
                                                    <th scope="col">Column 3</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                    <td scope="row">R1C1</td>
                                                    <td>R1C2</td>
                                                    <td>R1C3</td>
                                                </tr>
                                                <tr class="">
                                                    <td scope="row">Item</td>
                                                    <td>Item</td>
                                                    <td>Item</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    {{-- list room static --}}
                                    <div class="table-responsive">
                                        <table class="table table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Column 1</th>
                                                    <th scope="col">Column 2</th>
                                                    <th scope="col">Column 3</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                    <td scope="row">R1C1</td>
                                                    <td>R1C2</td>
                                                    <td>R1C3</td>
                                                </tr>
                                                <tr class="">
                                                    <td scope="row">Item</td>
                                                    <td>Item</td>
                                                    <td>Item</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card mt-3">
                                <div class="card-body">
                                    {{-- list room static --}}
                                    <div class="table-responsive">
                                        <table class="table table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Column 1</th>
                                                    <th scope="col">Column 2</th>
                                                    <th scope="col">Column 3</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                    <td scope="row">R1C1</td>
                                                    <td>R1C2</td>
                                                    <td>R1C3</td>
                                                </tr>
                                                <tr class="">
                                                    <td scope="row">Item</td>
                                                    <td>Item</td>
                                                    <td>Item</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body">
                                    {{-- list room static --}}
                                    <div class="table-responsive">
                                        <table class="table table-primary">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Column 1</th>
                                                    <th scope="col">Column 2</th>
                                                    <th scope="col">Column 3</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="">
                                                    <td scope="row">R1C1</td>
                                                    <td>R1C2</td>
                                                    <td>R1C3</td>
                                                </tr>
                                                <tr class="">
                                                    <td scope="row">Item</td>
                                                    <td>Item</td>
                                                    <td>Item</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        feather.replace();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
