<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="row gy-4 my-2">
        <h5>Member {{ $index + 1 }} @if ($index == 0)
            {{ "/ Ketua Team" }}
        @endif</h5>
        <div class="col-md-6 form-group">
            <label for="username_telegram_team" class="form-label">Team Member Name</label>
            <input type="text" name="nama" class="form-control" placeholder="Full Name" >
        </div>

        <div class="col-md-6 form-group">
            <label for="username_telegram_team" class="form-label">Provinsi Member Team</label>
            <input type="text" class="form-control" name="Provinsi" placeholder="Provinsi" >
        </div>

        <div class="col-md-6 form-group">
            <label for="username_telegram_team" class="form-label">ID Card</label>
            <div class="col-md-6 form-group col-kiri form-control file-upload-wrapper" data-text="KTM / Kartu Pelajar">
            <input name="file-upload-field" type="file" class="form-control padding" value="" >
            <span class="btn-primary col-atas_bawah btn-sm" role="button" aria-pressed="true" >Browse</span>
            </div>
        </div>

        <div class="col-md-6 form-group ">
            <label for="username_telegram_team" class="form-label">Surat Aktif Member Team</label>
            <div class="col-md-6 form-group col-kiri col-bawah form-control file-upload-wrapper" data-text="SKMA">
            <input name="file-upload-field" type="file" class="form-control" value="" >
            <span class="btn-primary col-atas_bawah btn-sm" role="button" aria-pressed="true" >Browse</span>
            </div>
        </div>

        <div class="col text-center my-6">
            <button type="button" wire:click="storetim" class="btn btn-primary">Submit member</button>
        </div>
    </div>
</div>
