<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" wire:submit.prevent="{{ $action }}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="name_competition">
                                            <div class="form-group">
                                                <label for="name-competition-vertical">Name Competition</label>
                                                <input type="text" id="name-competition-vertical" class="form-control"
                                                    wire:model="name_competition"
                                                    placeholder="Preparing Career in Data Science World">
                                            </div>
                                            @error('name_competition')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="finish_registrasi_competition">
                                            <div class="form-group">
                                                <label for="start-event-vertical">Finish Registrasi Competition</label>
                                                <input type="date" id="start-event-vertical" class="form-control"
                                                    wire:model="finish_registrasi_competition"
                                                    placeholder="Preparing Career in Data Science World">
                                            </div>
                                            @error('finish_registrasi_competition')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="link_rule_book_competition">
                                            <div class="form-group">
                                                <label for="link_rule_book_competition">Link Rule Book Competition</label>
                                                <input type="text" id="link_rule_book_competition"
                                                    class="form-control" wire:model="link_rule_book_competition"
                                                    placeholder="https://web.whatsapp.com/">
                                            </div>
                                            @error('link_rule_book_competition')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class=" d-flex justify-content-start mt-3">
                                            <button type="submit"
                                                class="btn btn-primary me-1 mb-1">{{ $action }}</button>
                                            @if ($action != 'Update')
                                                <button type="button" wire:click="resetall"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
