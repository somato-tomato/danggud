<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Daftar Outlet') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Daftar Outlet</div>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-md-3">
            <livewire:outlet.outlet-store />
        </div>
        <div class="col-md-9">
            <livewire:outlet.outlet-index />
        </div>
    </div>
</x-app-layout>
