<x-app-layout title="Manage Contact">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Contact</h3>
                    <p class="text-subtitle text-muted">You Can Manage Contact In This Page</p>
                </div>
            </div>
        </div>
        @livewire('detail-dashboard-comment',['comment' => $comment])
    </div>
</x-app-layout>
