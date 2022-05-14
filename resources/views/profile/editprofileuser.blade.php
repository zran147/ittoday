<x-guest-layout>
    <section id="profile" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Edit Profile</h2>
                <!-- <p>Punya pertanyaan, permasalahan, atau saran? Kami akan sangat senang dapat mendengarnya dari anda.</p> -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="/profile/updateprofile" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            @error('name')
                                <div class="alert alert-warning my-2" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="number" name="wa_user" class="form-control" value="{{ Auth::user()->wa_user }}">
                            @error('wa_user')
                            <div class="alert alert-warning my-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                            @error('email')
                            <div class="alert alert-warning my-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>

                        <div class="text-center mt-5">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-2">
                                    <a type="submit" href="/account" class="btn_kembali mr-5" style="float: right;">Kembali</a>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn_submit" style="float: left;">Submit</button>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </section>
</x-guest-layout>
