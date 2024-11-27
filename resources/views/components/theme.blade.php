<div class="dropdown-center p-2">
    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <span id="currTh" class="text-black"></span>
    </a>
    <ul class="dropdown-menu">
        <li onclick="setTheme('light')">
            <a class="dropdown-item" href="#">
                <i data-feather="sun"></i>
                <span id="thValue"">Light</span>
            </a>
        </li>
        <li onclick="setTheme('dark')">
            <a class="dropdown-item" href="#">
                <i data-feather="moon"></i>
                <span id="thValue">Dark</span>
            </a>
        </li>
    </ul>
</div>

<script>
    const currTh = document.getElementById('currTh');
    const navbar = document.getElementById('navbar');
    const theme = localStorage.getItem('theme') || 'light';
    if (theme == 'dark') {
        currTh.innerHTML = '<i data-feather="moon"></i>';
        navbar.classList.remove('bg-white');
        navbar.classList.add('bg-dark');
        currTh.classList.remove('text-dark');
        currTh.classList.add('text-white');

    } else {
        currTh.innerHTML = '<i data-feather="sun"></i>';
        navbar.classList.remove('bg-dark');
        navbar.classList.add('bg-white');
        currTh.classList.remove('text-white');
        currTh.classList.add('text-dark');
    }
    document.getElementsByTagName('html')[0].setAttribute('data-bs-theme', theme);

    function setTheme(theme) {
        localStorage.setItem('theme', theme);
        location.reload();
    }
</script>
