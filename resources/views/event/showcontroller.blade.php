<x-guest-layout title="{{ $event->name_event }}">
    @php
    $index = 0;
    if($event->start_event > Carbon::now()->format('Y-m-d')){
        $index = 1;
    }
    elseif ($event->start_event == Carbon::now()->format('Y-m-d') || $event->finish_event == Carbon::now()->format('Y-m-d') || $event->start_event < Carbon::now()->format('Y-m-d') && $event->finish_event > Carbon::now()->format('Y-m-d')){
        $index = 2;
    }
    elseif ($event->finish_event < Carbon::now()->format('Y-m-d')){
        $index = 3;
    }
    @endphp
    <div id="detail" class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 mb-2">
              <div class="card">
              <img class="mx-auto" src="/img/let'stry.png" style="width: 60%; position: relative;"/>
              <img id="myImg" class="mx-auto animated" src="{{ asset('storage/'.$event->thumbnail_event) }}" style="width: 32.2%; position: relative; cursor: pointer;"/>
              <div id="myModal" class="modal">
                <span class="close"><i class="bi bi-x"></i></span>
                <img class="modal-content" id="img01">
              </div>
                <div class="card-body parent">
                  <div class="box" style="background-image: url(/img/dirt.png);">
                    <div class="isi" style="padding: 10px;">
                      <h4>{{ $event->name_event }}</h4>
                      <h6>
                        @if ($index == 1)
                        <span class="btn-belum">Event Belum Dimulai</span>
                        @elseif ($index == 2)
                        <span class="btn-registered">Event Sedang Berlangsung</span>
                        @elseif ($index == 3)
                        <span class="btn-selesai">Event Sudah Terlaksanakan</span>
                        @endif
                      </h6>
                      {!! $event->description_event !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="card">
                @php
                    $maxim = $event->registrant_event - $event->registrant->count();
                @endphp
                @livewire('event.regis-event',['status' => $index, 'event' => $event->id, 'slug' => $event->slug_event, 'maxim' => $maxim])
              </div>
              <div class="card mt-2">
                <div class="card-body text-center anak2">
                  <div class="box" style="background-image: url(/img/boxxp.png);">
                    <div class="isi" style="padding: 10px;">
                      <h5>Detail Event</h5>
                      <ul class="list-unstyled mt-4 text-start">
                        <li class="mb-4 mt-4">
                          <h6><i class="bi bi-view-list"></i> Tipe Event</h6>
                          <div class="keterangan">{{ $event->category->name_category }}</div>
                        </li>
                        <li class="mb-4">
                          <h6><i class="bi bi-calendar-event"></i> Mulai</h6>
                          <div class="keterangan">{{ $event->start_event }}</div>
                        </li>
                        <li class="mb-4">
                          <h6><i class="bi bi-calendar-check"></i> Selesai</h6>
                          <div class="keterangan">{{ $event->finish_event }}</div>
                        </li>
                        <li class="mb-4">
                          <h6><i class="bi bi-person-dash-fill"></i> Kuota Tersisa</h6>
                          <div class="keterangan">{{ $event->registrant_event - $event->registrant->count() }} partisipan</div>
                        </li>
                        <li class="mb-4">
                          <h6><i class="bi bi-person-plus-fill"></i> Mengikuti</h6>
                          <div class="keterangan">{{ $event->registrant->count() }} partisipan</div>
                        </li>
                        <li class="mb-4">
                          <h6><i class="bi bi-app-indicator"></i> Status Event</h6>
                          <div class="keterangan">{{ $event->keterangan }}</div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      @push('script')
        <script>
            var modal = document.getElementById("myModal");
            var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            }
            var span = document.getElementsByClassName("close")[0];
            span.onclick = function() {
            modal.style.display = "none";
            }
        </script>
      @endpush

</x-guest-layout>
