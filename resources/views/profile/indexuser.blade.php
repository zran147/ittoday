<x-guest-layout>
    @push('style')
        <link href="/profile/profile.css" rel="stylesheet">
    @endpush
    <section id="profile" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title mt-5">
                <x-flash-message></x-flash-message>
            </div>


            <div class="col-md-4">
                <div class="card card-custome profilecard" style="background: #202749;">
                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Profile" class="profile" height="300">

                    <div class="nameProfile text-center">
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="card-body-custome">
                        <div class="text-center mt-3" style="color: #F2E5DB; margin-left: 0%;">

                            <span class="konten">
                                <!-- <span class="nameProfile text-center">John Doe Nomor HP</span> -->
                                <span class="kontencustomeprofile" style="text-align: left;"><b>Nomor HP</b></th>
                                    <td>&nbsp;</td>
                                    <td>:&nbsp;</td>
                                    <td style="text-align: left;">{{ $user->wa_user }}</td></span>
                                <span class="kontencustomeprofile" style="text-align: left;"><b>Email</b></th>
                                    <td>&nbsp;</td>
                                    <td>:&nbsp;</td>
                                    <td style="text-align: left;">{{ $user->email }}</td></span>
                            </span>
                        </div>
                        <a class="btn_slide text-center text-white a" style="margin-top: 10%;" href="/account/editprofile">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="card text-center mt-4">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs justify-content-center" id="myTab">
                        <li class="nav-item">
                            <a href="#event" class="nav-link active" data-bs-toggle="tab">Event</a>
                        </li>
                        <li class="nav-item">
                            <a href="#compe" class="nav-link" data-bs-toggle="tab">Competition</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="event">
                            <div class="row">
                            @if ($user->registrant->count() < 1)
                                <h5>Anda Belum Daftar Event</h5>
                            @endif
                            @foreach ($user->registrant as $item)
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{ asset('storage/'.$item->event->thumbnail_event) }}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                      <h5 class="card-title">{{ $item->event->name_event }}</h5>
                                      <p class="card-text">{!!  Str::limit(strip_tags($item->event->description_event), 200) !!}</p>
                                      <a href="/event/detail/{{ $item->event->slug_event }}" class="btn btn-primary">Go Event</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="compe">
                            <div class="row">
                                @if ($user->regsitranttimcompetition->count() < 1)
                                <h5>Anda Belum Daftar Kompetisi</h5>
                                @endif
                                @foreach ($user->regsitranttimcompetition as $item)

                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="/img/competition/thumbnail/{{ $item->competition->slug_competition }}.png" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">{{ $item->competition->name_competition }}</h5>
                                        <p class="card-text">{{ ucwords($item->status_verification_tim) }}</p>
                                        @php
                                            if($item->competition->name_competition == 'Poster'){
                                                $url = '/poster';
                                            }else{
                                                $url = null;
                                            }
                                        @endphp
                                        <a href="/competitions/{{ $item->competition->slug_competition }}/regis/{{ $item->code_uniq_tim }}{{ $url }}" class="btn btn-primary">Go Competition</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
