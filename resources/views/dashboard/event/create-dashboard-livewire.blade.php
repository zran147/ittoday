<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
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
                                        <div class="name_event">
                                            <div class="form-group">
                                                <label for="name-event-vertical">Name Event</label>
                                                <input type="text" id="name-event-vertical" class="form-control"
                                                    wire:model="name_event"
                                                    placeholder="Preparing Career in Data Science World">
                                            </div>
                                            @error('name_event')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="start_event">
                                            <div class="form-group">
                                                <label for="start-event-vertical">Start Event</label>
                                                <input type="date" id="start-event-vertical" class="form-control"
                                                    wire:model="start_event"
                                                    placeholder="Preparing Career in Data Science World">
                                            </div>
                                            @error('start_event')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="finish_event">
                                            <div class="form-group">
                                                <label for="finish-event-vertical">Finish Event</label>
                                                <input type="date" id="finish-event-vertical" class="form-control"
                                                    wire:model="finish_event"
                                                    placeholder="Preparing Career in Data Science World">
                                            </div>
                                            @error('finish_event')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="desc_event">
                                            <div class="form-group" wire:ignore>
                                                <label for="desc-event-vertical">Description Event</label>
                                                <textarea wire:model="desc_event" id="default" cols="30" rows="20">
                                                    {{-- @if ($id_event)
                                                        {!! $desc_event !!}
                                                    @endif --}}
                                                </textarea>
                                            </div>
                                            @error('desc_event')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="registrant_event">
                                            <div class="form-group">
                                                <label for="registrant-event-vertical">Registrant Event</label>
                                                <input type="number" id="registrant-event-vertical"
                                                    class="form-control" wire:model="registrant_event"
                                                    placeholder="500">
                                            </div>
                                            @error('registrant_event')
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    {{ $message }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @enderror
                                        </div>

                                        @if ($action == 'Update')
                                            <img src="{{ asset($thumbnail_event) }}" height="300"
                                                alt="{{ $name_event }}">
                                            {{-- <button class="btn btn-primary" wire:click="changethumbnail"
                                                onclick="confirm('Are you sure you want to change the thumbnail ?') || event.stopImmediatePropagation()">Change
                                                thumbnail</button> --}}
                                        @endif
                                        @if ($action != 'Update')
                                            <div class="thumbnail_event">
                                                <div class="form-group">
                                                    <label for="thumbnail-event-vertical">Thumbnail Event</label>
                                                    <input type="file" id="thumbnail-event-vertical"
                                                        class="form-control" wire:model="thumbnail_event">
                                                </div>
                                                @error('thumbnail_event')
                                                    <div class="alert alert-warning alert-dismissible fade show"
                                                        role="alert">
                                                        {{ $message }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @enderror
                                            </div>
                                            @if ($thumbnail_event)
                                                <label for="thumbnail-event-vertical">Preview Thumbnail Event</label>
                                                <img height="300" src="{{ $thumbnail_event->temporaryUrl() }}">
                                            @endif
                                        @endif
                                        <div class=" d-flex justify-content-start mt-5">
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
    @push('modals')
        <script src="/assets/vendors/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#default',
                toolbar: 'undo redo fontselect fontsizeselect formatselect bold italic alignleft aligncenter alignright bullist numlist outdent indent  ',
                plugins: 'fontselect fontsizeselect formatselect',
                height: (window.innerHeight - 300),
                forced_root_block: false,
                setup: function(editor) {
                    editor.on('init change', function() {
                        editor.save();
                    });
                    editor.on('change', function(e) {
                        @this.set('desc_event', editor.getContent());
                    });
                },
            });
        </script>
    @endpush
</div>
