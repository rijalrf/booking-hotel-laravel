{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<style>
    /* Container for notification */
    .notification-container {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        width: 500px;
    }

    /* Base style for all notifications */
    .notification {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        padding: 15px;
        border-radius: 5px;
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    /* Close button style */
    .close-btn {
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Colors for different notification types */
    .success {
        background-color: #4CAF50;
        /* Green */
    }

    .info {
        background-color: #2196F3;
        /* Blue */
    }

    .warning {
        background-color: #FF9800;
        /* Orange */
    }

    .error {
        background-color: #F44336;
        /* Red */
    }
</style>
</head>

<body>
    <!-- Notification Container -->
    <div class="notification-container">
        <!-- Notification -->
        <div class="notification animate__animated animate__fadeInDown {{ $type }}" id="notification">
            <div>
                <i data-feather="check-circle"></i>
            </div>
            <div class="mr-3">{{ $message }}</div>
            <span class="close-btn">&times;</span>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const notification = document.getElementById('notification');

            // Function to hide notification
            const hideNotification = () => {
                notification.classList.remove('animate__fadeInDown');
                notification.classList.add('animate__fadeOutUp');
                setTimeout(() => notification.style.display = 'none',
                500); // Delay untuk sinkron dengan animasi
            };

            // Menutup notifikasi saat tombol X diklik
            document.querySelector('.close-btn').addEventListener('click', hideNotification);

            // Menyembunyikan notifikasi setelah 5 detik
            setTimeout(hideNotification, 5000); // 5000ms = 5 detik
        });
    </script> --}}





<style>
    /* Container for notification */
    .notification-container {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        width: 500px;
    }

    /* Base style for all notifications */
    .notification {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
        padding: 15px;
        border-radius: 5px;
        color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        animation: fadeIn 0.5s ease, fadeOut 0.5s 4s forwards;
        cursor: pointer;
    }

    /* Close button style */
    .close-btn {
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
    }

    /* Colors for different notification types */
    .success {
        background-color: #4CAF50;
        /* Green */
    }

    .info {
        background-color: #2196F3;
        /* Blue */
    }

    .warning {
        background-color: #FF9800;
        /* Orange */
    }

    .error {
        background-color: #F44336;
        /* Red */
    }

    Fade in and fade out animation @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
</style>
<div class="notification-container">
    <div class="notification {{ $type }}">
        <div>
            @if ($type == 'success')
                <i data-feather="check-circle"></i>
            @elseif($type == 'info')
                <i data-feather="info"></i>
            @elseif($type == 'warning')
                <i data-feather="alert-circle"></i>
            @else
                <i data-feather="x-circle"></i>
            @endif
        </div>
        <div class="mr-3">{{ $message }}</div>
        <span class="close-btn">&times;</span>
    </div>

</div>

<script>
    // Menutup notifikasi saat tombol X diklik
    document.querySelectorAll('.close-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            this.parentElement.style.display = 'none';
        });
    });

    // Menyembunyikan notifikasi setelah 5 detik
    setTimeout(function() {
        const notifications = document.querySelectorAll('.notification');
        notifications.forEach(notification => {
            notification.style.display = 'none';
        });
    }, 5000); // 5000ms = 5 detik
</script>
