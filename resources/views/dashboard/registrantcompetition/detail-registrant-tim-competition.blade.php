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
                                <p>Nama Institusi Tim : {{ $tim_competition->institusi_name_tim }}</p>
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

                @if ($tim_competition->status_verification_tim == 'acc verification payment')
                <div class="my-2 border p-2 border border-2 rounded border-secondary">
                    <div class="p-2" style="width:100%;">
                        <div></div>
                        <h2>Link Result Tim</h2>
                        <div class="row p-3">
                            <div class="col border mx-2">
                                <div class="my-2">
                                    <a href="{{ $tim_competition->link_competition_results }}" target="_blank">{{ $tim_competition->link_competition_results }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

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
                                        <p>Nama Rekening : {{ $tim_competition->bank_account_name_payment_tim }}</p>
                                    </div>
                                </div>
                                <div class="col border mx-2">
                                    <div class="my-2">
                                        <p>Biaya Pembayaran : {{ $tim_competition->payment_fee_payment_tim }}</p>
                                    </div>
                                </div>
                            </div>
                            <h5>Bukti Pembayaran :</h5>
                            <div class="row p-3">
                                @if ($tim_competition->proof_of_payment_tim)
                                <a href="/storage/{{ $tim_competition->proof_of_payment_tim }}" target="_blank">
                                    <div class="image-invoice ">
                                        <img src="/storage/{{ $tim_competition->proof_of_payment_tim }}"
                                            class="rounded mx-auto d-block" style="width: 100%;">
                                    </div>
                                </a>
                                @else
                                <h5 class="text-center badge rounded-pill bg-info text-dark">Belum Upload</h5>
                                @endif
                            </div>
                        </div>
                        <x-flash-message></x-flash-message>
                        <div class="d-flex justify-content-end">
                            <button type="button" wire:click="accpayment" class="btn btn-primary mx-2">ACC PAYMENT</button>
                            <button type="button" wire:click="refusepayment" class="btn btn-danger">REFUSE PAYMENT</button>
                        </div>
                    </div>
                    {{-- end invoice tim --}}
                @endif

                {{-- registrant tim --}}
                <div class="p-2 my-3" style="width:100%;">
                    <h2>Infomasi Angota Tim</h2>
                        @php
                            $countmember = $tim_competition->membertimcompetition->count();
                            if(is_null($countmember)){
                                $countmember = 0;
                            }
                        @endphp
                        @for ($i = 0; $i < $tim_competition->participant; $i++)
                        @if ($i < $countmember)
                        <livewire:competition.member-tim-competition :member="$tim_competition->membertimcompetition[$i]"
                        :wire:key="'member-profile-'.$i">
                        @else
                            <livewire:competition.member-tim-competition
                            :wire:key="'member-profile-'.$i">
                        @endif
                        @endfor

                    {{-- @foreach ($tim_competition->membertimcompetition as $item)
                        <livewire:competition.member-tim-competition :member="$item"
                            :wire:key="'member-profile-'.$item->id">
                    @endforeach --}}
                </div>

                {{-- end registrant tim --}}

                {{-- email tim for status --}}
            </div>
        </div>

    </section>
</div>
