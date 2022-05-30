<x-guest-layout title="Events">
    @if($event->count() > 0)
        <div id="list" class="album py-5">
            <div class="container" data-aos="fade-up">
            <div class="row try row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 d-flex justify-content-center">
                @foreach ($event as $item)
                <div class="col" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card">
                        <div class="image-text">
                            <img src="{{ asset('storage/'.$item->thumbnail_event) }}" alt=""/>
                        </div>
                        <div class="card-body">
                            <div class="box" style="background-image: url(img/boxx.png);">
                                <div class="isi" style="padding: 10px;">
                                    <h6>
                                        @if ($item->start_event > Carbon::now()->format('Y-m-d'))
                                            <span class="btn-belum">Event Belum Dimulai</span>
                                        @elseif ($item->start_event == Carbon::now()->format('Y-m-d') || $item->finish_event == Carbon::now()->format('Y-m-d') || $item->start_event < Carbon::now()->format('Y-m-d') && $item->finish_event > Carbon::now()->format('Y-m-d'))
                                            <span class="btn-registered">Event Sedang Berlangsung</span>
                                        @elseif ($item->finish_event < Carbon::now()->format('Y-m-d'))
                                            <span class="btn-selesai">Event Sudah Terlaksanakan</span>
                                        @endif
                                    </h6>
                                    <h3>{{ $item->name_event }} </h3>
                                    <h2>{{ $item->category->name_category }}</h2>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="/event/detail/{{ $item->slug_event }}" class="stretched-link" type="detail">Detail</a>
                                        <small class="text-muted"><div><i class="bi bi-calendar"></i> {{ $item->start_event }}</div><div><i class="bi bi-people-fill"></i> {{ $item->registrant->count() }} partisipan</div></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>

    @else
    <div class="comingsoonevent">
        <img src="/img/comingsoon.png" alt="">
    </div>
    @endif
</x-guest-layout>
