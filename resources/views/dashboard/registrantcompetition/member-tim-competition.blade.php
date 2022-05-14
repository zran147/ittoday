<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @if (is_null($member))
    <div class="my-4 border p-2 bg-light text-dark rounded">
        <h5>Belum Regis Member Tim</h5>
    </div>
    @else
    <div class="my-4 border p-2 bg-light text-dark rounded">
        <h4>Anggota
            @if ($member->team_leader_registrant_competitions == '1')
                / Ketua
            @endif
        </h4>
        @php
            if ($member->verivication_registrant_competitions == 'acc') {
                $bg = 'success';
            } elseif ($member->verivication_registrant_competitions == 'improve') {
                $bg = 'danger';
            } else {
                $bg = 'secondary';
            }
        @endphp

        <span class="badge bg-{{ $bg }}"> {{ $member->verivication_registrant_competitions }}
            verification</span>
        <div class="row p-3">
            <div class="col border mx-2">
                <div class="my-2">
                    <p>Name Registrant : {{ $member->name_registrant_competitions }}</p>
                </div>
                @if ($member->message_registrant_competitions != 'acc')
                    <div class="my-2">
                        <p>Message for member Registrant (revisi): {{ $member->message_registrant_competitions }}</p>
                    </div>
                @endif
            </div>
            <div class="col border mx-2">
                <div class="my-2">
                    <p>Provinsi Registrant : {{ $member->provinsi_registrant_competitions }}
                    </p>
                </div>
            </div>
        </div>

        <h5>ID Card Registrant :</h5>
        <div class="row p-3">
            @if (!is_null($member->member_card_registrant_competitions))
            <a href="/storage/{{ $member->member_card_registrant_competitions }}" target="_blank">
                <div class="image-invoice ">
                    <img src="/storage/{{ $member->member_card_registrant_competitions }}"
                        class="rounded mx-auto d-block" style="width: 100%;">
                </div>
            </a>
            @else
                <h5 class="text-center badge rounded-pill bg-info text-dark">Belum Upload</h5>
            @endif

        </div>
        <h5>SK Aktif Registrant :</h5>
        <div class="row p-3">
            @if (!is_null($member->letter_active_member_card_registrant_competitions))
            <a href="/storage/{{ $member->letter_active_member_card_registrant_competitions }}" target="_blank">
                <div class="image-invoice ">
                    <img src="/storage/{{ $member->letter_active_member_card_registrant_competitions }}"
                        class="rounded mx-auto d-block" style="width: 100%;">
                </div>
            </a>
            @else
                <h5 class="text-center badge rounded-pill bg-info text-dark">Belum Upload</h5>
            @endif

        </div>
        <x-flash-message />
        <div class="d-flex justify-content-end my-2">
            <button type="button" wire:click="accmemberrergistrant('{{ Crypt::encrypt($member->id) }}')"
                class="btn btn-primary mx-2">acc verification</button>
            <button type="button" wire:click="refusememberregistrant" class="btn btn-danger">Refuse
                verification</button>
        </div>
        @if ($message == 'on')
            <form wire:submit.prevent="messagememberregistrant('{{ Crypt::encrypt($member->id) }}')">
                <div class="my-3">
                    <input wire:model="messageformember" type="text" class="form-control"
                        id="exampleFormControlInput1" placeholder="Message for registrant">
                    @error('messageformember')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
                <button type="button" wire:click="cancelrefuse" class="btn btn-secondary">Cancel refuse</button>
            </form>
        @endif
    </div>

    @endif
</div>
