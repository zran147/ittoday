<x-guest-layout>
    @php
        $index = 0;
        if($event->start_event > date("Y-m-d")){
            $index = 1;
        }
        elseif ($event->start_event < date("Y-m-d") && $event->finish_event > date("Y-m-d")){
            $index = 2;
        }
        elseif ($event->finish_event < date("Y-m-d")){
            $index = 3;
        }
    @endphp
    <div id="detail" class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 mb-2">
              <div class="card">
                <img class="mx-auto" src="/img/cthposter.png" style="width: 50%; position: relative;"></img>
                <img class="mx animated" src="{{ asset('storage/'.$event->thumbnail_event) }}" style="width: 35%; position: relative;"></img>
                <div class="card-body parent">
                  <div class="box" style="background-image: url(/img/dirt.png);">
                    <div class="isi" style="padding: 10px;">
                      <h4>{{ $event->name_event }}</h4>
                      <h6>
                        @if ($index = 1)
                        <span class="btn-belum">Belum Mulai</span>
                        @elseif ($index = 2)
                        <span class="btn-berlangsung">Berlangsung</span>
                        @elseif ($index = 3)
                        <span class="btn-selesai">Sudah Terlaksana</span>
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
                @livewire('event.regis-event',['status' => $index, 'event' => $event->id, 'slug' => $event->slug_event])
                <!-- <div class="card-body text-center">
                  <h5>Pendaftaran</h5>
                  <span>ayayayyaya</span>
                </div> -->
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
</x-guest-layout>
