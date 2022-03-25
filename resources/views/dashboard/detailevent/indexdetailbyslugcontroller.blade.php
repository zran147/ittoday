<x-app-layout title="{{ $slug }}">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Registrant Events</h3>
                    <p class="text-subtitle text-muted">You Can Manage Registrant Events In This Page</p>
                </div>
            </div>
        </div>
        @livewire('detailevent.deatail-event', ['slug' => $slug])
    </div>
</x-app-layout>
