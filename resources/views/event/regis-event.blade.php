<div>
    <div class="card-body text-center anak1">
        <div class="box" style="background-image: url(/img/boxx.png);">
          <div class="isi" style="padding: 10px;">
            <h5>Pendaftaran</h5>
            @guest
                <a href="/login"><span class="btn-selesai p-2">Silakan Daftar</span></a>
            @endguest
            @auth
                @if ($regis)
                    <button class="btn-selesai">Sudah Terdaftar</button>
                @else
                    @if ($status != 3)
                        @if ($maxim > 0)
                            <button class="btn-selesai" wire:click="regisevent">Silakan Daftar</button>
                        @else
                            <button class="btn-selesai">Kuota Sudah Terpenuhi</button>
                        @endif
                    @else
                        <span class="btn-selesai">Sudah Terlaksana</span>
                    @endif
                @endif
            @endauth

            @push('script')
            <script>
                window.addEventListener('info', event => {
                    alert('Anda telah ' + event.detail.status + ' terdaftar');
                })
                </script>
            @endpush
          </div>
        </div>
      </div>
</div>
