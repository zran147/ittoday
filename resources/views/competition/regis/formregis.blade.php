<x-guest-layout>

    @push('style')
        <link rel="stylesheet" href="/competition/hacktoday.css">
    @endpush
    <div class="container my-5">
    @livewire('registranttimcompetition.form-registrant-competition',['codeuniqteam' => $code,'action' => $action])
    </div>
</x-guest-layout>
