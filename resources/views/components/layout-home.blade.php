<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Hotel</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('Js/feather.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
</head>

<body>
    @if (session('notification'))
        <x-message>
            <x-slot:type>{{ session('notification.type') }}</x-slot:type>
            <x-slot:message>{{ session('notification.message') }}</x-slot:message>
        </x-message>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-message>
                <x-slot:type>error</x-slot:type>
                <x-slot:message>{{ $error }}</x-slot:message>
            </x-message>
        @endforeach
    @endif


    <x-navbar></x-navbar>
    <main id="main">
        <div>
            <img class="w-100" src="{{ asset('img/room_banner.jpg') }}" alt="">
        </div>
        <div class="mt-3">
            {{ $slot ?? '' }}
        </div>
    </main>

    <script>
        feather.replace();
    </script>
    <script src="{{ asset('Js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
