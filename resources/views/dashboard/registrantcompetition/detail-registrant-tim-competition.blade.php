<div>
    {{-- Success is as dangerous as failure. --}}
    <section class="section">
        <div class="card">
            <div class="card-header text-center">
                <h1>Hack Today</h1>
                <p>{{ $tim_competition->code_uniq_tim }}</p>
                <span class="badge bg-primary">{{ $tim_competition->status_verification_tim }}</span>
            </div>
            <div class="card-body">
                {{-- information tim --}}
                <div class="p-2" style="width:100%;">
                    <h2>Infomasi Administrasi Tim</h2>
                    <div class="row p-3">
                        <div class="col border mx-2">
                            <div class="my-2">
                                <p>Nama Tim : {{ $tim_competition->name_tim }}</p>
                            </div>
                            <div class="my-2">
                                <p>Tingkat Institusi Tim : {{ $tim_competition->level_tim }}</p>
                            </div>
                            <div class="my-2">
                                <p>Nama Institusi Tim : {{ $tim_competition->level_tim }}</p>
                            </div>
                        </div>
                        <div class="col border mx-2">
                            <div class="my-2">
                                <p>Email Tim : {{ $tim_competition->email_tim }}</p>
                            </div>
                            <div class="my-2">
                                <p>Username Telegram Tim : {{ $tim_competition->username_telegram_tim }}</p>
                            </div>
                            <div class="my-2">
                                <p>No Handphone Tim : {{ $tim_competition->no_hp_tim }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end information tim --}}
                @php
                    $status = ['waiting verification administration', 'rejected verification administration'];
                @endphp
                @if (!in_array($tim_competition->status_verification_tim, $status))
                    {{-- invoice tim --}}
                    <div class="my-2 border p-2 border border-2 rounded border-secondary">
                        <div class="p-2" style="width:100%;">
                            <div></div>
                            <h2>Infomasi Pembayaran Tim</h2>
                            <div class="row p-3">
                                <div class="col border mx-2">
                                    <div class="my-2">
                                        <p>Nama Rekening : Lintang lazuardi</p>
                                    </div>
                                </div>
                                <div class="col border mx-2">
                                    <div class="my-2">
                                        <p>Biaya Pembayaran : 60000</p>
                                    </div>
                                </div>
                            </div>
                            <h5>Bukti Pembayaran :</h5>
                            <div class="row p-3">
                                <div class="image-invoice ">
                                    <img src="data:image/jpeg;base64,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"
                                        class="rounded mx-auto d-block">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mx-2">ACC PAYMENT</button>
                            <button type="button" class="btn btn-danger">REFUSE PAYMENT</button>
                        </div>
                    </div>
                    {{-- end invoice tim --}}
                @endif

                {{-- registrant tim --}}
                <div class="p-2 my-3" style="width:100%;">
                    <h2>Infomasi Angota Tim</h2>
                    @foreach ($tim_competition->membertimcompetition as $item)
                        <livewire:competition.member-tim-competition :member="$item"
                            :wire:key="'member-profile-'.$item->id">
                            {{-- @livewire('competition.member-tim-competition', ['member' => $item], key($item->id)) --}}
                    @endforeach
                </div>

                {{-- end registrant tim --}}

                <div class="my-2 border p-2 border border-2 rounded border-secondary" style="width:100%;">
                    <h2>Email Tim</h2>
                    {{-- @foreach ($tim_competition->membertimcompetition as $item)
                        <livewire:competition.member-tim-competition :member="$item"
                            :wire:key="'member-profile-'.$item->id">
                            @livewire('competition.member-tim-competition', ['member' => $item], key($item->id))
                    @endforeach --}}
                </div>

                {{-- email tim for status --}}
            </div>
        </div>

    </section>
</div>
