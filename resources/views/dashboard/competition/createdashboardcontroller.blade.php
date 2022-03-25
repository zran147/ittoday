<x-app-layout title="{{ $action }} Event">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last">
                    <h3>{{ $action }} New Competition</h3>
                    <p class="text-subtitle text-muted">You Can {{ $action }} New Competition In This Page</p>
                </div>
            </div>
        </div>
        @livewire('competition.create-competition-dashboard-livewire',['action' => $action,'id_competition' => $id_competition])
    </div>

</x-app-layout>