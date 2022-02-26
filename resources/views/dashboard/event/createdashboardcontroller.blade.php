<x-app-layout>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last">
                    <h3>{{ $action }} New Events</h3>
                    <p class="text-subtitle text-muted">You Can {{ $action }} New Events In This Page</p>
                </div>
            </div>
        </div>
        <!-- Basic Vertical form layout section start -->
        @livewire('event.create-dashboard-livewire',['action' => $action,'id_event' => $id_event])
        <!-- // Basic Vertical form layout section end -->
    </div>

</x-app-layout>
