<div>
    <div class="card-body text-center anak1">
        <div class="box" style="background-image: url(/img/boxx.png);">
          <div class="isi" style="padding: 10px;">
            <h5>Pendaftaran</h5>
            @guest
                <a href="/login"><span class="btn-selesai">daftar</span></a>
            @endguest
            @auth
                @if ($regis)
                    <button class="btn-selesai">Sudah terdaftar</button>
                @else
                    @if ($status != 3)
                    <button class="btn-selesai" wire:click="regisevent">silakan daftar</button>
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
