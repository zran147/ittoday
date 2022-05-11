<div wire:poll.5s>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <h5>Member {{ $index + 1 }} @if ($index == 0)
        {{ "/ Ketua Team" }}
    @endif</h5>
    @if ($status == 'wait')
    <span class="badge rounded-pill bg-secondary">Wait</span>
    @elseif ($status == 'acc')
    <span class="badge rounded-pill bg-success">Success</span>
    @elseif ($status == 'improve')
        <span class="badge rounded-pill bg-danger">{{ $status }}</span>
        <div class="alert alert-info mt-2" role="alert">
            <h4>Message : </h4>
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row gy-3 mb-3">
        <div class="col-md-6 form-group">
            <label for="username_telegram_team" class="form-label">Team Member Name</label>
            <input type="text" name="nama" wire:model="name_member" class="form-control" placeholder="Full Name" >
            @error('name_member')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="username_telegram_team" class="form-label">Provinsi Member Team</label>
            <input type="text" class="form-control" name="Provinsi" wire:model="provinsi_member"  placeholder="Provinsi" >
            @error('provinsi_member')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="username_telegram_team" class="form-label">ID Card</label>
            <div class="col-md-6 form-group col-kiri form-control file-upload-wrapper" data-text="KTM / Kartu Pelajar">
            <input name="file-upload-field" wire:model="id_card_member" type="file" class="form-control padding" value="" >
            @if (!is_null($id_card_member2))
                <a href="/storage/{{ $id_card_member2 }}" target="_blank"><div class="form-text mt-3">Klik Disini Untuk Revire ID Card Anda</div></a>
            @endif
            @error('id_card_member')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>

        @if ($level_tim != 'sma')
        <div class="col-md-6 form-group ">
            <label for="username_telegram_team" class="form-label">Surat Aktif Member Team</label>
            <div class="col-md-6 form-group col-kiri col-bawah form-control file-upload-wrapper" data-text="SKMA">
            <input name="file-upload-field" wire:model="sk_member" type="file" class="form-control">
            @if (!is_null($sk_member2))
                <a href="/storage/{{ $sk_member2 }}" target="_blank"><div class="form-text mt-3">Klik Disini Untuk review Surat Keterangan Anda</div></a>
            @endif
            @error('sk_member')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>
        @endif
        @if ($status != 'acc')
        <div class="col-md-12 gy-4 text-center my-3">
            <button type="button" wire:click="{{ $action }}membertim" class="btn btn-primary">{{ $action }} member</button>
        </div>
        @endif
    </div>
</div>
