<div wire:poll.5s>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="border my-3 p-2">
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
                <label for="username_telegram_team" class="form-label">Nama</label>
                <input type="text" name="nama_member" wire:model="name_member" class="form-control" placeholder="IT Today">
                @error('name_member')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="username_telegram_team" class="form-label">Domisili</label>
                <input type="text" class="form-control" name="Provinsi" wire:model="provinsi_member"  placeholder="Jawa Barat" >
                @error('provinsi_member')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="username_telegram_team" class="form-label">KTM / Kartu Pelajar</label>
                <div class="col-md-6 form-group col-kiri form-control file-upload-wrapper" data-text="KTM / Kartu Pelajar">
                <input name="file-upload-field" wire:model="id_card_member" name="id_card" type="file" class="form-control padding">
                <div id="idcard" class="form-text text text-dark">Image Only PNG, JPEG, JPG and Maximal Size 2 MB</div>

                <div wire:loading wire:target="id_card_member">
                    Processing Upload...
                </div>


                @if (!is_null($id_card_member2))
                    <a href="/storage/{{ $id_card_member2 }}" target="_blank">
                        <div class="form-text mt-3 text-success">Klik Disini Untuk Melihat KTM / Kartu Pelajar</div>
                    </a>
                @endif
                @error('id_card_member')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>

            <div class="col-md-6 form-group ">
                <label for="username_telegram_team" class="form-label">Bukti Pendukung</label>
                <div class="col-md-6 form-group col-kiri col-bawah form-control file-upload-wrapper" data-text="SKMA">
                <input name="file-upload-field" wire:model="member_tim_certificate" name="bukti_pendukung" type="file" class="form-control">
                <div id="idcard" class="form-text text text-dark">Misal : Surat Keterangan Mahasiswa Aktif atau lainnya. <br> Image Only PNG, JPEG, JPG and Maximal Size 2 MB</div>
                <div wire:loading wire:target="member_tim_certificate">
                    Processing Upload...
                </div>
                @if (!is_null($member_tim_certificate2))
                    <a href="/storage/{{ $member_tim_certificate2 }}" target="_blank">
                        <div class="form-text mt-3 text-success">Klik Disini Untuk Melihat Bukti Pendukung</div>
                    </a>
                @endif
                @error('member_tim_certificate')
                    <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>

            @if ($status != 'acc')
            <div class="col-md-12 text-center">
                <button type="button" wire:click="{{ $action }}membertim"  wire:offline.attr="disabled" wire:loading.attr="disabled" class="btn btn-primary">{{ ucfirst($action) }} Member</button>
            </div>
            @endif
        </div>
    </div>
</div>
