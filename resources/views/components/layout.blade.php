<x-layout-base>
    <x-navbar></x-navbar>
    {{-- <x-sidebar-base>
    </x-sidebar-base> --}}
    <main class="main-content container" style="margin-top: 100px" id="main">
        <div class="my-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{ $breadcrumb ?? '' }}
                </ol>
            </nav>
        </div>

        <div class="d-flex justify-content-between">
            <div class="poppins-bold fs-2">{{ $title ?? '' }}</div>
            <div>
                {{ $action ?? '' }}
            </div>
        </div>
        <div class="mt-3">
            {{ $slot ?? '' }}
        </div>
    </main>


</x-layout-base>
