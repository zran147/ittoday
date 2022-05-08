<div>
<form class="bg-light p-3 my-5">
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
        @if ($action == 'storetim')
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
            <button type="button" wire:click="{{ $action }}" class="btn btn-primary">{{ $action }}</button>
        </div>
    </div>

        <div class="my-4">
                <h2 class="text-center">Information Member Team</h2>
                @for ($i = 0; $i < $participants; $i++)
                    @if ($i < $membertim->count())
                        @livewire('registranttimcompetition.form-registrant-member-competition',['index' => $i, 'membertim'=>$membertim[$i], 'tim_id'=> $id_tim, 'action'=>'update'])
                    @else
                        @livewire('registranttimcompetition.form-registrant-member-competition',['index' => $i, 'tim_id'=> $id_tim, 'action'=>'create'])
                    @endif
                @endfor
        </div>
</form>
</div>
