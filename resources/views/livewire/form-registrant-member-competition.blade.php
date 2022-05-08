<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="row gy-4 my-2">
        
        <h5>Member {{ $index + 1 }} @if ($index == 0)
            {{ "/ Ketua Team" }}
        @endif</h5>
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
            @error('id_card_member')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>

        <div class="col-md-6 form-group ">
            <label for="username_telegram_team" class="form-label">Surat Aktif Member Team</label>
            <div class="col-md-6 form-group col-kiri col-bawah form-control file-upload-wrapper" data-text="SKMA">
            <input name="file-upload-field" wire:model="sk_member" type="file" class="form-control" value="" >
            @error('sk_member')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}
                </div>
            @enderror
            </div>
        </div>

        <div class="col text-center my-6">
            <button type="button" wire:click="{{ $action }}membertim" class="btn btn-primary">{{ $action }} member</button>
        </div>
    </div>
</div>
