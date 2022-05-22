<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
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
                        <h2>Infomasi Administrasi</h2>
                        <div class="row p-3">
                            <div class="col border mx-2">
                                <div class="my-2">
                                    <p>Nama Lengkap : {{ $tim_competition->name_tim }}</p>
                                </div>
                                <div class="my-2">
                                    <p>Tingkat Institusi : {{ $tim_competition->level_tim }}</p>
                                </div>
                                <div class="my-2">
                                    <p>Nama Institusi : {{ $tim_competition->institusi_name_tim }}</p>
                                </div>
                            </div>
                            <div class="col border mx-2">
                                <div class="my-2">
                                    <p>Email : {{ $tim_competition->email_tim }}</p>
                                </div>
                                <div class="my-2">
                                    <p>Username Telegram : {{ $tim_competition->username_telegram_tim }}</p>
                                </div>
                                <div class="my-2">
                                    <p>No Handphone : {{ $tim_competition->no_hp_tim }}</p>
                                </div>
                                <div class="my-2">
                                    <p>Domisili : {{ $tim_competition->bank_account_name_payment_tim }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($tim_competition->status_verification_tim == 'tim successful verification')
                    <div class="my-2 border p-2 border border-2 rounded border-secondary">
                        <div class="p-2" style="width:100%;">
                            <div></div>
                            <h2>Link Submission Poster</h2>
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
                        <div class="my-2 border p-2 border border-2 rounded border-secondary">
                            <div class="p-2" style="width:100%;">
                                <div class="row p-3">
                                    <div class="col border mx-2">
                                        <div class="my-2">
                                            <p>Link Twibbon : <a href="{{ $tim_competition->payment_fee_payment_tim }}">{{ $tim_competition->payment_fee_payment_tim }}</a></p>
                                        </div>
                                    </div>
                                </div>
                                <h5>Bukti Pendukung :</h5>
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
                                    <button type="button" wire:click="accregis" class="btn btn-primary mx-2">ACC Regis</button>
                                    <button type="button" wire:click="refuseregis" class="btn btn-danger">REFUSE Regis</button>
                                </div>
                            @endif
                        </div>

                    <div class="my-2 border p-2 border border-2 rounded border-secondary">
                        <div class="p-2" style="width:100%;">
                            <h2>Email Konfirmasi</h2>
                            <div class="row p-3">
                                <div class="col border mx-2">
                                    <div class="my-2">
                                        <p>Email : {{ $tim_competition->email_tim }}</p>
                                    </div>
                                </div>
                                <div class="col border mx-2">
                                    <div class="my-2">
                                        <p>Terakhir Kirim Email Pada Tanggal : {{ $tim_competition->email_verification_tim }}</p>
                                    </div>
                                </div>
                            </div>
                            <h5>Pesan Untuk :</h5>
                            <div class="row p-3">
                                <div class="form-group" wire:ignore>
                                    <textarea id="default" cols="30" rows="20">
                                        <h3>Hallo {{ $tim_competition->name_tim }}</h3>
                                        <p>Kami akan konfirmasi bahwa status Pendaftaran anda sekarang : </p>
                                        <h4>{{ $tim_competition->status_verification_tim }}</h4>
                                        @if ($tim_competition->status_verification_tim != 'tim successful verification')
                                        <p>untuk Proses Selanjutnya harap Klik Link <a href="ittoday.id/competitions/{{ $name_competition }}/regis/{{ $tim_competition->code_uniq_tim }}/poster">Disini</a></p>
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
