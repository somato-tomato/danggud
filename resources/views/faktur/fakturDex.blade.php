<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Faktur') }}</h1>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item">Suku Cadang</div>
        </div>
    </x-slot>

    <div class="row">
        <div class="col-md-12">
            <livewire:faktur.faktur-index />
        </div>
    </div>
</x-app-layout>
