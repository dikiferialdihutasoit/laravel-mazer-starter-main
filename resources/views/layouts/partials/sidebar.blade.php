<x-mazer-sidebar :href="route('dashboard')" logo="asset('static/images/logo/logo.png')">
    <x-mazer-sidebar-item icon="bi bi-grid-fill" :link="route('dashboard')" name="Dashboard" />
    
    {{-- Jadikan Fitur Survei sebagai Menu Utama --}}
    <x-mazer-sidebar-item icon="bi bi-file-earmark-text-fill" :link="route('survey.form')" name="Formulir Survei" />

     {{-- >> TAMBAHKAN LINK BARU DI SINI << --}}
    <x-mazer-sidebar-item icon="bi bi-card-checklist" :link="route('survey.results')" name="Hasil Survei" />

    {{-- Menu Komponen terpisah --}}
    <x-mazer-sidebar-item icon="bi bi-stack" name="Components">
        <x-mazer-sidebar-subitem :link="route('component.accordion')" name="Accordion" :active="false"/>
        {{-- Hapus subitem form dari sini --}}
    </x-mazer-sidebar-item>
</x-mazer-sidebar>