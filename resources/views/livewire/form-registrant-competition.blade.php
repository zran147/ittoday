<div>
    {{-- The whole world belongs to you. --}}
    <form>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Information General</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_team" class="form-label">Nama Team</label>
                        <input type="text" wire:model="name_tim" name="nama_team" class="form-control" id="nama_team"
                            placeholder="Nama Team">
                        @error('name_tim')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email_team" class="form-label">Email Team</label>
                        <input type="email" wire:model="email_tim" name="email_team" class="form-control"
                            id="email_team" placeholder="emailtim@gmail.com">
                        @error('email_tim')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="level_team" class="form-label">level Team</label>
                        <select class="form-select" aria-label="Default select example" wire:model="level_tim"
                            name="level_team">
                            <option value="{{ null }}" selected>Select level your team</option>
                            <option value="sma">Sekolah Menengah Atas</option>
                            <option value="kuliah">Kuliah</option>
                        </select>
                        @error('level_tim')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="username_telegram_team" class="form-label">Username Telegram Team</label>
                        <input type="text" class="form-control" wire:model="username_telegram_tim"
                            name="username_telegram_" id="username_telegram_team" placeholder="telegram_name">
                        @error('username_telegram_tim')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_institusi" class="form-label">Nama Institusi Team</label>
                        <input type="text" class="form-control" wire:model="name_institusi_tim" name="nama_institusi"
                            id="nama_institusi" placeholder="Institut Pertanian Bogor">
                        @error('name_institusi_tim')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="no_handphone_team" class="form-label">No Handphone Team</label>
                        <input type="number" class="form-control" wire:model="no_handphone_tim" name="no_handphone"
                            id="no_handphone_team" placeholder="085*******">
                        @error('no_handphone_tim')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="member_of_team" class="form-label">choose member of team</label>
                        <select class="form-select" aria-label="Default select example" wire:model="participants">
                            <option value="{{ null }}" selected>choose member of team</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        @error('participants')
                            <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-end mx-4">
                    <button type="button" class="btn btn-secondary mx-2">Reset</button>
                    <button type="button" class="btn btn-primary mx-2" wire:click="storetim">Submit</button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Information Member Team</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_member" class="form-label">Nama Member Team</label>
                        <input type="text" class="form-control" id="nama_member" placeholder="Nama member Team">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="provinsi_member_team" class="form-label">Provinsi Member Team</label>
                        <input type="email" class="form-control" id="provinsi_member_team"
                            placeholder="emailtim@gmail.com">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="card_identity" class="form-label">Kartu Identitas Member Team</label>
                        <input type="file" class="form-control" id="inputGroupFile02">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sk_member" class="form-label">Surat Aktif Member Team</label>
                        <input type="file" class="form-control" id="inputGroupFile02">
                    </div>
                </div>
                <div class="d-flex justify-content-end mx-4">
                    <button type="button" class="btn btn-secondary mx-2">Reset</button>
                    <button type="submit" class="btn btn-primary mx-2">Submit</button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Information Payment Team</h3>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama_rekening_member" class="form-label">Nama Rekening Team</label>
                        <input type="text" class="form-control" id="nama_rekening_member"
                            placeholder="Nama member Team">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama_rekening_member" class="form-label">No Rekening Team</label>
                        <input type="email" class="form-control" id="nama_rekening_member"
                            placeholder="emailtim@gmail.com">
                    </div>
                    <div class="col mb-3">
                        <label for="card_identity" class="form-label">Bukti Transfer Member Team</label>
                        <input type="file" class="form-control" id="inputGroupFile02">
                    </div>
                </div>
                <div class="d-flex justify-content-end mx-4">
                    <button type="button" class="btn btn-secondary mx-2">Reset</button>
                    <button type="submit" class="btn btn-primary mx-2">Submit</button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Result competition Team</h3>
                <div class="row">
                    <div class="col mb-3">
                        <label for="link_result_tim" class="form-label">Link Result Team</label>
                        <input type="text" class="form-control" id="link_result_tim"
                            placeholder="https://www.google.com/">
                    </div>
                </div>
                <div class="d-flex justify-content-end mx-4">
                    <button type="button" class="btn btn-secondary mx-2">Reset</button>
                    <button type="submit" class="btn btn-primary mx-2">Submit</button>
                </div>
            </div>
    </form>
</div>
