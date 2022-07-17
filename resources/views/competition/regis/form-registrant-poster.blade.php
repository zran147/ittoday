<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
        <form class="bg-light p-3 my-5">
            <x-flash-message></x-flash-message>
            @if ($status_verification_tim)
                <div class="alert alert-info">
                    <h5>Status Tim : {{ ucwords($status_verification_tim) }}</h5>
                    <ul>
                        <li>
                            <p>Ramaikan kompetisi IT Today dengan ikutan mengunggah twibbon
                                <a href="{{ $link_twibbon_competition }}">ini.</a> (wajib)</p>
                        </li>
                        <li>
                            <p>Setiap perubahan status tim akan di infomasikan melalui email <i>{{ $email }}</i> </p>
                        </li>
                    </ul>

                </div>
            @endif

            <div class="row gy-4">
                <div class="col-md-6 form-group">
                    <label for="nama_Tim" class="form-label">Full Name</label>
                    <input type="text" name="name" wire:model="name" class="form-control" placeholder="ITtoday" required>
                    @error('name')
                        <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="tingkat_institusi" class="form-label">Tingkat Institusi</label>
                    <select class="form-select col-md-6 form-control control" wire:model="tingkat_institusi" aria-label="Default select example" required>
                      <option value="{{ Null }}" selected>Pilih Tingkat Institusi Tim</option>
                      <option value="umum">Umum</option>
                      <option value="kuliah">Kuliah</option>
                      <option value="sma">Sekolah</option>
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
                    <div id="emailHelp" class="form-text">Untuk "Umum" Harap Isi Dengan "-"</div>
                    @error('nama_institusi')
                        <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="Email" class="form-label">Email</label>
                    <input type="email" class="form-control" wire:model="email" name="email" placeholder="ittoday@gmail.com" required>
                    @error('email')
                        <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="username_telegram_Tim" class="form-label">Username Telegram</label>
                    <input type="text" name="tele" wire:model="username_telegram" class="form-control" placeholder="ittoday" required>
                    @error('username_telegram')
                        <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="nomor_whatsApp" class="form-label">Nomor WhatsApp</label>
                    <input type="number" class="form-control"  wire:model="nomor_whatsApp" name="nomerhp" placeholder="0895*****" required>
                    @error('nomor_whatsApp')
                        <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="nomor_whatsApp" class="form-label">Domisili ( Provinsi )</label>
                    <input type="text" class="form-control"  wire:model="domisili" name="provinsi" placeholder="Jawa Timur" required>
                    @error('domisili')
                        <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6 form-group">
                    <label for="username_telegram_team" class="form-label">Kartu Identitas</label>
                    <div class="col-md-6 form-group col-kiri form-control file-upload-wrapper" data-text="KTM / Kartu Pelajar">
                    <input name="file-upload-field" wire:model="idcard" type="file" class="form-control padding">
                    <div id="idcard" class="form-text text text-dark">Seperti foto Kartu Pelajar, KTM, KTP, atau kartu identitas lainnya. <br> Only PNG, JPEG, JPG and Maximal Size 2 MB</div>
                    <div wire:loading wire:target="idcard">
                        Processing Upload...
                    </div>
                    @if (!is_null($idcard2))
                        <a href="/storage/{{ $idcard2 }}" target="_blank">
                            <div class="form-text mt-3 text-success">Klik Disini Untuk Melihat Kartu Identitas</div>
                        </a>
                    @endif
                    @error('idcard')
                        <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                @if ($status_verification_tim != 'tim successful verification')
                <div class="col-md-12 gy-4 text-center my-3">
                    <button type="button" wire:click="{{ $action }}" wire:loading.attr="disabled" class="btn btn-primary">{{ ucwords($action) }} Registrasi</button>
                </div>
                @endif
            </div>
            @if ($action == 'update')
            <div class="border my-3 p-2">
                <h5>Submission Twibbon</h5>
                <div class="row gy-3 mb-3">
                    <div class="col form-group">
                        <label for="prof_upload_twibon" class="form-label">Link Instagram</label>
                        <input type="text" name="Link Twibon" wire:model="prof_upload_twibon" class="form-control" placeholder="https://www.instagram.com/p/Cdm9mYbPpxd/?utm_source=ig_web_copy_link" >
                        <div id="emailHelp" class="form-text">Seluruh peserta Poster Competition diwajibkan untuk mengunggah twibbon ke Instagram pribadi. Informasi mengenai twibbon dapat dilihat di <a href="{{ $link_twibbon_competition }}">sini</a></div>
                        @error('prof_upload_twibon')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if ($status_verification_tim != 'tim successful verification')

                        @php
                            $status_action = null;
                            if ($prof_upload_twibon2 == null) {
                                $status_action = 'submit';
                            }else{
                                $status_action = 'update';
                            }
                        @endphp
                            <div class="col-md-12 gy-4 text-center my-3">
                                <button type="button" wire:click="submittwibbon" wire:loading.attr="disabled" wire:ignore class="btn btn-primary">{{ ucwords($status_action) }} Twibbon</button>
                            </div>
                    @endif
                </div>
            </div>
            @endif
            @if ($status_verification_tim == 'tim successful verification')
            <div class="border my-3 p-2">
                <h5>Submission Poster</h5>
                <div class="row gy-3 mb-3">
                    <div class="col form-group">
                        <label for="submission_poster" class="form-label">Link Drive</label>
                        <input type="text" name="Link Twibon" wire:model="submission_poster" class="form-control" placeholder="https://drive.google.com/drive/my-drive" >
                        <div id="emailHelp" class="form-text">Masukan link yang berisi poster anda</div>
                        @error('submission_poster')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @if ($submission_poster2 == null)
                    <div class="col-md-12 gy-4 text-center my-3">
                        <button type="button" wire:click="uploadposter" onclick="confirm('Sudah Yakin Semua Data Benar ?') || event.stopImmediatePropagation()" wire:offline.attr="disabled" wire:loading.attr="disabled" class="btn btn-primary">Submit Link Poster</button>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </form>

</div>
