<x-guest-layout>
    @push('style')
        <link rel="stylesheet" href="/competition/hacktoday.css">
    @endpush
    <div class="container my-5">
        @livewire('registranttimcompetition.form-registrant-poster',['codeuniqteam' => $code,'action' => $action ,'slug' => $slug])
    </div>
</x-guest-layout>
