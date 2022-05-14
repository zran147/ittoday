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
                        <span>{{ Auth::user()->name }}</span>
                    </div>
                    <div class="card-body-custome">
                        <div class="text-center mt-3" style="color: #F2E5DB; margin-left: 0%;">

                            <span class="konten">
                                <!-- <span class="nameProfile text-center">John Doe Nomor HP</span> -->
                                <span class="kontencustomeprofile" style="text-align: left;"><b>Nomor HP</b></th>
                                    <td>&nbsp;</td>
                                    <td>:&nbsp;</td>
                                    <td style="text-align: left;">{{ Auth::user()->wa_user }}</td></span>
                                <span class="kontencustomeprofile" style="text-align: left;"><b>Email</b></th>
                                    <td>&nbsp;</td>
                                    <td>:&nbsp;</td>
                                    <td style="text-align: left;">{{ Auth::user()->email }}</td></span>
                            </span>
                        </div>
                        <a class="btn_slide text-center text-white a" style="margin-top: 10%;" href="/profile/editprofile">Edit Profile</a>
                    </div>
                </div>
            </div>

            <div class="card text-center mt-4">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs justify-content-center" id="myTab">
                        <li class="nav-item">
                            <a href="#home" class="nav-link active" data-bs-toggle="tab">Event</a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages" class="nav-link" data-bs-toggle="tab">Competition</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home">
                            @foreach (Auth::user()->registrant as $item)
                            <h5 class="card-title">Home tab content</h5>
                            <p class="card-text">Here is some example text to make up the tab's content. Replace it with your own text anytime.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="messages">
                            <h5 class="card-title">Messages tab content</h5>
                            <p class="card-text">Here is some example text to make up the tab's content. Replace it with your own text anytime.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section>
</x-guest-layout>
