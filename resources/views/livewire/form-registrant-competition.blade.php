<div>
<form class="bg-light p-3">
    <div class="row gy-4">
        <div class="col-md-6 form-group">
            <label for="nama_team" class="form-label">Nama Team</label>
            <input type="text" name="name_tim" wire:model="name_tim" class="form-control" placeholder="Team Name" required>
            @error('name_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}

                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="level_team" class="form-label">level Team</label>
            <select class="form-select col-md-6 form-control control" wire:model="level_tim" aria-label="Default select example" required>
              <option value="{{ Null }}" selected>Select level your team</option>
              <option value="sma">Sekolah Menengah Atas</option>
              <option value="kuliah">Kuliah</option>
            </select>
            @error('level_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}

                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="email_team" class="form-label">Institution Name</label>
            <input type="text" name="institusi" wire:model="name_institusi_tim" class="form-control" placeholder="Nama Institusi" required>
            @error('name_institusi_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}

                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="email_team" class="form-label">Email Team</label>
            <input type="email" class="form-control" wire:model="email_tim" name="email" placeholder="Email" required>
            @error('email_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}

                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="username_telegram_team" class="form-label">Username Telegram Team</label>
            <input type="text" name="tele" wire:model="username_telegram_tim" class="form-control" placeholder="Username Telegram" required>
            @error('username_telegram_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}

                </div>
            @enderror
        </div>

        <div class="col-md-6 form-group">
            <label for="no_handphone_team" class="form-label">No Handphone Team</label>
            <input type="number" class="form-control"  wire:model="no_handphone_tim" name="nomerhp" placeholder="Nomor Hp" required>
            @error('no_handphone_tim')
                <div class="alert alert-warning alert-dismissible fade show my-2" role="alert">
                    {{ $message }}

                </div>
            @enderror
        </div>
        @if (empty($participantslist))
        <div class="col-md-12 form-group">
            <label for="level_team" class="form-label">Number of Team</label>
            <select id="reason-list" class="col-md-6 form-control control" wire:model="participants" required>
              <option value="{{ Null }}">Choose number of teams</option>
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
        <div class="col-md-12 gy-4 text-center my-3">
            <button type="button" wire:click="storetim" class="btn btn-primary">Create Team</button>
        </div>

    </div>

    @if (!empty($participantslist))
        <div class="my-4">

                <h2 class="text-center">Information Member Team</h2>
                @foreach ($participantslist as $item)
                    @livewire('registranttimcompetition.form-registrant-member-competition',['index' => $loop->index, 'timmember' => $item])
                @endforeach
        </div>

    @endif


              {{-- <div class="row gy-4 ">
                <div class="col-6 menengah turun">
                    <!--<form class="form">-->
                      <div class="row gy-4 data">

                        <h2>Information Payment Team</h2>

                        <div class="col-md-6 form-group">
                          <label for="username_telegram_team" class="form-label">Team's Account Name </label>
                          <input type="text" name="nama" class="form-control" placeholder="Full Name" >
                        </div>

                        <div class="col-md-6 form-group">
                          <label for="username_telegram_team" class="form-label">Account Number</label>
                          <input type="text" class="form-control" name="Provinsi" placeholder="Provinsi" >
                        </div>

                        <div class="col-md-12 form-group">
                          <label for="username_telegram_team" class="form-label">Bukti Transfer Member Team</label>
                          <div class="col form-group col-kiri form-control file-upload-wrapper" data-text="KTM / Kartu Pelajar">
                            <input name="file-upload-field" type="file" class="form-control padding" value="" >
                            <span class="btn-primary col-atas_bawah btn-sm" role="button" aria-pressed="true" >Browse</span>
                          </div>
                        </div>

                        <div class="col-md-12 gy-4 text-center marginturun">
                          <div class="loading">Loading</div>
                          <div class="error-message">Please fill the form </div>
                          <div class="sent-message">Your message has been sent. Thank you!</div>
                          <a>
                            <button type="submit">Submit</button>
                          </a>
                        </div>
                      </div>
                    <!--</form>-->
                </div>
              </div> --}}

              {{-- <div class="row gy-4 ">
                <div class="col-6 menengah turun">
                    <!--<form class="form">-->
                      <div class="row gy-4 data">

                        <h2>Result Competition Team</h2>

                        <div class="col-md-12 form-group">
                          <label for="username_telegram_team" class="form-label">Username Telegram Team</label>
                          <input type="link" name="nama" class="form-control" placeholder="Full Name" >
                        </div>

                        <div class="col-md-12 gy-4 text-center marginturun">
                          <div class="loading">Loading</div>
                          <div class="error-message">Please fill the form </div>
                          <div class="sent-message">Your message has been sent. Thank you!</div>
                          <a href="formty.html">
                            <button type="submit">Submit</button>
                          </a>
                        </div>
                      </div>
                </div>
              </div> --}}
</form>
</div>