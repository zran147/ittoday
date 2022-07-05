<div>
<form class="bg-light p-3 my-5">
    <x-flash-message></x-flash-message>
    @if ($status_verification_tim)
        <div class="alert alert-info">
            <h5>Status Tim : {{ ucwords($status_verification_tim) }}</h5>
            <ul>
                <li>
                    <p>
                        Ramaikan kompetisi IT Today dengan ikutan mengunggah twibbon
                        <a href="{{ $link_twibbon_competition }}">ini.</a>
                    </p>
                </li>
                <li>
                    <p>Setiap perubahan status tim akan di infomasikan melalui email <i>{{ $email_tim }}</i> </p>
                </li>
                @if (in_array($status_verification_tim,array("acc verification administration","rejected verification payment")))
                    <li>
                        <p>
                            Informasi untuk pembayaran : <br>
                            Bank BNI <br>
                            Isti Adilia Habibah <br>
                            Account number: 0966756048
                        </p>
                    </li>
                @endif
            </ul>
        </div>
    @endif

    <div class="row gy-4">
        <div class="col-md-6 form-group">
            <label for="nama_Tim" class="form-label">Nama Tim</label>
            <input type="text" name="name_tim" wire:model="name_tim" class="form-control" placeholder="IT Today" required>
            @error('name_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="tingkat_institusi" class="form-label">Tingkat Institusi</label>
            <select class="form-select col-md-6 form-control control" wire:model="tingkat_institusi" aria-label="Default select example" required>
              <option value="{{ Null }}" selected>Pilih Tingkat Institusi Tim</option>
              <option value="kuliah">Kuliah</option>
              @if ($slug != 'ux-today')
                <option value="sma">SLTA/sederajat</option>
              @endif
            </select>
            @error('tingkat_institusi')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="nama_institusi" class="form-label">Nama Institusi</label>
            <input type="text" name="institusi" wire:model="nama_institusi" class="form-control" placeholder="Institut Pertanian Bogor" required>
            @error('nama_institusi')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="Email" class="form-label">Email Tim</label>
            <input type="email" class="form-control" wire:model="email_tim" name="email" placeholder="ittoday@gmail.com" required>
            @error('email_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="username_telegram_Tim" class="form-label">Username Telegram Tim</label>
            <input type="text" name="tele" wire:model="username_telegram_tim" class="form-control" placeholder="ITtoday" required>
            @error('username_telegram_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="nomor_whatsApp" class="form-label">Nomor WhatsApp</label>
            <input type="number" class="form-control"  wire:model="nomor_whatsApp" name="nomerhp" placeholder="08*******" required>
            @error('nomor_whatsApp')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @if ($action == 'create')
        <div class="col-md-12 form-group">
            <label for="Jumlah_anggota_tim" class="form-label">Jumlah Anggota Tim</label>
            <select id="reason-list" class="col-md-6 form-control control" wire:model="participants" required>
              <option value="{{ Null }}">Pilih Anggota Tim</option>
              <option value="1">1 (Solo)</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            <div id="Jumlah_anggota_timHelp" class="form-text">Jumlah Anggota Tim Tidak Dapat Di Ubah Setelah Membuat Tim</div>
            @error('participants')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @endif
        @if ($status_verification_tim == 'waiting verification administration' || is_null($status_verification_tim))
        <div class="col-md-12 gy-4 text-center my-3">
            <button type="button" wire:click="{{ $action }}" wire:offline.attr="disabled" onclick="confirm('Sudah Yakin Semua Data Benar ?') || event.stopImmediatePropagation()" wire:loading.attr="disabled" class="btn btn-primary">{{ ucfirst($action) }} Tim</button>
        </div>
        @endif
    </div>

    @if ($action == 'update')
        <div class="my-4" wire:ignore>
                <h2 class="text-center">Information Member Tim</h2>
                @for ($i = 0; $i < $participants; $i++)
                    @if ($i < $membertim->count())
                        @livewire('registranttimcompetition.form-registrant-member-competition',['index' => $i, 'membertim'=>$membertim[$i], 'tim_id'=> $id_tim, 'action'=>'update','level_tim' => $tingkat_institusi])
                    @else
                        @livewire('registranttimcompetition.form-registrant-member-competition',['index' => $i, 'tim_id'=> $id_tim, 'action'=>'create','level_tim' => $tingkat_institusi])
                    @endif
                @endfor
        </div>
    @endif
        @php
            if (is_null($bank_account_name)) {
               $actionpayment = "submit";
            }else{
                $actionpayment = "edit";
            }
            $statuspayment = array("acc verification payment", "tim successful verification");
            $status = array("waiting verification administration","rejected verification administration", null)
        @endphp
    @if (!in_array($status_verification_tim,$status))
    <div class="mt-5" wire:ignore>
        <div class="row gy-4 ">
            <h2 class="text-center">Information Payment Tim</h2>
            <div class="col-md-6 form-group">
                <label for="username_telegram_Tim" class="form-label"> Nama Akun Bank</label>
                <input type="text" name="nama" wire:model="bank_account_name" class="form-control" placeholder="ITtoday" >
                @error('bank_account_name')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="payment_fee_payment_tim" class="form-label">Jumlah Pembayaran</label>
                <input type="number" class="form-control" wire:model="payment_fee_payment_tim" name="jumlah_pembayaran" placeholder="60000" >
                @error('payment_fee_payment_tim')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12 form-group">
                <label for="proof_of_payment_tim" class="form-label">Bukti Pembayaran</label>
                <div class="col form-group col-kiri form-control file-upload-wrapper" data-text="Bukti Transfer">
                  <input name="file-upload-field" wire:model="proof_of_payment_tim" type="file" class="form-control padding" >
                  <div wire:loading wire:target="proof_of_payment_tim">
                    Processing Upload...
                </div>
                  @error('payment_fee_payment_tim')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                    @if ($proof_of_payment_tim2)
                        <a href="/storage/{{ $proof_of_payment_tim2 }}" target="_blank"><div class="form-text mt-3">Klik Disini Untuk Review Bukti Pembayaran</div></a>
                    @endif
                </div>
            </div>
        @if (!in_array($status_verification_tim,$statuspayment))
        <div class="col-md-12 gy-4 text-center my-3">
            <button type="button" wire:click="{{ $actionpayment }}" wire:offline.attr="disabled" wire:loading.attr="disabled" class="btn btn-primary">{{ ucfirst($actionpayment) }} Payment Tim</button>
        </div>
        @endif
    </div>
    @endif
    @if ($slug == 'ux-today')
        @if (in_array($status_verification_tim,$statuspayment))
            <div class="mt-5" wire:ignore>
                <div class="row gy-4 ">
                    <h2 class="text-center">submission proposal </h2>
                    <div class="col form-group">
                        <label for="link_competition_results" class="form-label">Link submission proposal</label>
                        <input type="text" class="form-control" wire:model="link_competition_results" name="link_competition_results" placeholder="https://drive.google.com/" >
                        @error('link_competition_results')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @if (is_null($link_competition_results))
                    <div class="col-md-12 gy-4 text-center my-3">
                        <button type="button" wire:click="createresult" wire:offline.attr="disabled" wire:loading.attr="disabled" class="btn btn-primary">Create Result Tim</button>
                    </div>
                    @else
                    <div class="col-md-12 gy-4 text-center my-3">
                        <span class="btn btn-info">Thank You For Participating In The Competition</span>
                    </div>
                    @endif
                </div>
            </div>
        @endif
    @endif
</form>
</div>
