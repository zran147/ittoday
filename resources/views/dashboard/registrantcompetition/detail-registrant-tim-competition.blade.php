<div>
    {{-- Success is as dangerous as failure. --}}

    <section class="section">
        <div class="card">
            <div class="card-header text-center">
                <h1>{{ ucwords(str_replace('-', ' ', $name_competition)) }}</h1>
                <p>{{ $tim_competition->code_uniq_tim }}</p>
                <p>Regis : {{ $tim_competition->created_at }} </p>
                <span class="badge bg-primary">{{ $tim_competition->status_verification_tim }}</span>
            </div>
            <x-flash-message/>
            <div class="card-body">
                @if ($tim_competition->status_verification_tim == 'acc verification payment')
                <button type="button" class="btn btn-success" wire:click="timsuccess">Tim Success Administrasi</button>
                @endif
                {{-- @if ($tim_competition->status_verification_tim == 'tim successful verification')
                <a href="/dashboard/detailcompetition/{{ $name_competition }}/detailtim/{{ $tim_competition->code_uniq_tim }}/pdf" class="btn btn-success" >Export PDf Kompetisi</a>
                @endif --}}
                {{-- @dd($tim_competition->admin_id) --}}
                @if ($tim_competition->adminveriftimcompetition)
                <div class="p-2" style="width:100%;">
                    <h2>Infomasi Penanggung Jawab Tim</h2>
                    <div class="row p-3">
                        <div class="col border mx-2">
                            <div class="my-2">
                                <p>Nama Admin : {{ $tim_competition->adminveriftimcompetition->name }}</p>
                            </div>
                            <div class="my-2">
                                <p>Email Admin : {{ $tim_competition->adminveriftimcompetition->email }}</p>
                            </div>
                            <div class="my-2">
                                <p>Nomor WhatsApp : {{ $tim_competition->adminveriftimcompetition->wa_user }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

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
                @if ($name_competition != 'hack-today')

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

                @endif

                @php
                    $status = ['waiting verification administration', 'rejected verification administration'];
                @endphp
                @if (!in_array($tim_competition->status_verification_tim, $status))
                    {{-- invoice tim --}}
                    <div class="my-2 border p-2 border border-2 rounded border-secondary">
                        <div class="p-2" style="width:100%;">
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
                        @if ($tim_competition->status_verification_tim != 'tim successful verification')
                            <x-flash-message></x-flash-message>
                            <div class="d-flex justify-content-end">
                                <button type="button" wire:click="accpayment" class="btn btn-primary mx-2">ACC PAYMENT</button>
                                <button type="button" wire:click="refusepayment" class="btn btn-danger">REFUSE PAYMENT</button>
                            </div>
                        @endif
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
                        <livewire:competition.member-tim-competition :member="$tim_competition->membertimcompetition[$i]" :status="$tim_competition->status_verification_tim"
                        :wire:key="'member-profile-'.$i">
                        @else
                            <livewire:competition.member-tim-competition
                            :wire:key="'member-profile-'.$i">
                        @endif
                        @endfor
                </div>

                {{-- end registrant tim --}}

                {{-- email tim for status --}}

                <div class="my-2 border p-2 border border-2 rounded border-secondary">
                    <div class="p-2" style="width:100%;">
                        <h2>Email Konfirmasi Tim</h2>
                        <div class="row p-3">
                            <div class="col border mx-2">
                                <div class="my-2">
                                    <p>Email Tim : {{ $tim_competition->email_tim }}</p>
                                </div>
                            </div>
                            <div class="col border mx-2">
                                <div class="my-2">
                                    <p>Terakhir Kirim Email Pada Tanggal : {{ $tim_competition->email_verification_tim }}</p>
                                </div>
                            </div>
                        </div>
                        <h5>Pesan Untuk Tim :</h5>
                        <div class="row p-3">
                            <div class="form-group" wire:ignore>
                                <textarea id="default" cols="30" rows="20">
                                    <h3>Hallo {{ $tim_competition->name_tim }}</h3>
                                    <p>Kami akan konfirmasi bahwa status tim anda sekarang : </p>
                                    <h4>{{ $tim_competition->status_verification_tim }}</h4>
                                    @if ($tim_competition->status_verification_tim != 'tim successful verification')
                                    <p>untuk Proses Selanjutnya harap Klik Link <a href="ittoday.id/competitions/{{ $name_competition }}/regis/{{ $tim_competition->code_uniq_tim }}">Disini</a></p>
                                    @endif

                                </textarea>
                            </div>
                        </div>
                    </div>
                    <x-flash-message></x-flash-message>
                     <div class="d-flex justify-content-end">
                        <button type="button" wire:click="sendmessage" class="btn btn-primary mx-2">Kirim Email</button>
                    </div>
                </div>
                {{-- end emil tim for status --}}
            </div>
        </div>

    </section>

    @push('modals')
        <script src="/assets/vendors/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#default',
                toolbar: 'undo redo fontselect fontsizeselect formatselect bold italic alignleft aligncenter alignright bullist numlist outdent indent link',
                plugins: 'fontselect fontsizeselect formatselect link',
                height: (window.innerHeight - 300),
                forced_root_block: false,
                setup: function(editor) {
                    editor.on('init change', function() {
                        editor.save();
                    });
                    editor.on('init change', function(e) {
                        @this.set('message', editor.getContent());
                    });
                },
            });

        </script>
    @endpush
</div>
