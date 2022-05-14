<div>
<form class="bg-light p-3 my-5">
    <x-flash-message></x-flash-message>

    <div class="alert alert-info">
        <h5>Status Your Tim : {{ $status_verification_tim }}</h5>
    </div>

    <div class="row gy-4">
        <div class="col-md-6 form-group">
            <label for="nama_Tim" class="form-label">Nama Tim</label>
            <input type="text" name="name_tim" wire:model="name_tim" class="form-control" placeholder="Tim Name" required>
            @error('name_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="level_Tim" class="form-label">level Tim</label>
            <select class="form-select col-md-6 form-control control" wire:model="level_tim" aria-label="Default select example" required>
              <option value="{{ Null }}" selected>Select level your Tim</option>
              <option value="kuliah">Kuliah</option>
              @if ($slug != 'ux-today')
                <option value="sma">Sekolah Menengah Atas</option>
              @endif

            </select>
            @error('level_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="email_Tim" class="form-label">Institution Name</label>
            <input type="text" name="institusi" wire:model="name_institusi_tim" class="form-control" placeholder="Nama Institusi" required>
            @error('name_institusi_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="email_Tim" class="form-label">Email Tim</label>
            <input type="email" class="form-control" wire:model="email_tim" name="email" placeholder="Email" required>
            @error('email_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="username_telegram_Tim" class="form-label">Username Telegram Tim</label>
            <input type="text" name="tele" wire:model="username_telegram_tim" class="form-control" placeholder="Username Telegram" required>
            @error('username_telegram_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="no_handphone_Tim" class="form-label">No Handphone Tim</label>
            <input type="number" class="form-control"  wire:model="no_handphone_tim" name="nomerhp" placeholder="Nomor Hp" required>
            @error('no_handphone_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @if ($action == 'create')
        <div class="col-md-12 form-group">
            <label for="level_Tim" class="form-label">Number of Tim</label>
            <select id="reason-list" class="col-md-6 form-control control" wire:model="participants" required>
              <option value="{{ Null }}">Choose number of Tims</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
            @error('participants')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        @endif
        @if ($status_verification_tim == 'waiting verification administration' || is_null($status_verification_tim))
        <div class="col-md-12 gy-4 text-center my-3">
            <button type="button" wire:click="{{ $action }}" class="btn btn-primary">{{ $action }} Tim</button>
        </div>
        @endif
    </div>

    @if ($action == 'update')
        <div class="my-4" wire:ignore>
                <h2 class="text-center">Information Member Tim</h2>
                @for ($i = 0; $i < $participants; $i++)
                    @if ($i < $membertim->count())
                        @livewire('registranttimcompetition.form-registrant-member-competition',['index' => $i, 'membertim'=>$membertim[$i], 'tim_id'=> $id_tim, 'action'=>'update','level_tim' => $level_tim])
                    @else
                        @livewire('registranttimcompetition.form-registrant-member-competition',['index' => $i, 'tim_id'=> $id_tim, 'action'=>'create','level_tim' => $level_tim])
                    @endif
                @endfor
        </div>
    @endif
        @php
            if (is_null($bank_account_name)) {
               $actionpayment = 'submit';
            }else{
                $actionpayment = 'edit';
            }
            $statuspayment = array('acc verification payment', 'tim successful varification');
            $status = array('waiting verification administration','rejected verification administration', null)
        @endphp
    @if (!in_array($status_verification_tim,$status))
    <div class="mt-5" wire:ignore>
        <div class="row gy-4 ">
            <h2 class="text-center">Information Payment Tim</h2>

            <div class="col-md-6 form-group">
                <label for="username_telegram_Tim" class="form-label">Tim's Bank Account Name </label>
                <input type="text" name="nama" wire:model="bank_account_name" class="form-control" placeholder="Nama Tim" >
                @error('bank_account_name')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="username_telegram_Tim" class="form-label">fee payment Number</label>
                <input type="number" class="form-control" wire:model="payment_fee_payment_tim" name="Provinsi" placeholder="Rekening" >
                @error('payment_fee_payment_tim')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12 form-group">
                <label for="username_telegram_Tim" class="form-label">Payment Receipt</label>
                <div class="col form-group col-kiri form-control file-upload-wrapper" data-text="Bukti Transfer">
                  <input name="file-upload-field" wire:model="proof_of_payment_tim" type="file" class="form-control padding" >
                  @error('payment_fee_payment_tim')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                    @if ($proof_of_payment_tim2)
                        <a href="/storage/{{ $proof_of_payment_tim2 }}" target="_blank"><div class="form-text mt-3">Klik Disini Untuk Revire ID Card Anda</div></a>
                    @endif
                </div>
            </div>
        @if (!in_array($status_verification_tim,$statuspayment))
        <div class="col-md-12 gy-4 text-center my-3">
            <button type="button" wire:click="{{ $actionpayment }}" class="btn btn-primary">{{ ucfirst($actionpayment) }} Payment Tim</button>
        </div>
        @else
        <div class="col-md-12 gy-4 text-center my-3">
            <button class="btn btn-info">Payment Berhasil Di Verifikasi</button>
        </div>
        @endif
    </div>
    @endif

    @if ($status_verification_tim == 'acc verification payment')
    <div class="mt-5" wire:ignore>
        <div class="row gy-4 ">
            <h2 class="text-center">Result Tim</h2>


            <div class="col form-group">
                <label for="link_competition_results" class="form-label">Link Result Your Task</label>
                <input type="text" class="form-control" wire:model="link_competition_results" name="link_competition_results" placeholder="https://drive.google.com/" >
                @error('link_competition_results')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        @if (is_null($link_competition_results))
        <div class="col-md-12 gy-4 text-center my-3">
            <button type="button" wire:click="createresult" class="btn btn-primary">Create Result Tim</button>
        </div>
        @else
        <div class="col-md-12 gy-4 text-center my-3">
            <button class="btn btn-info">Link Sudah Terkirim</button>
        </div>
        @endif
    </div>
    @endif
</form>
</div>
