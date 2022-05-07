<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Reach Us</h2>
            <p>Punya pertanyaan, permasalahan, atau saran? Kami akan sangat senang dapat mendengarnya dari Anda.</p>
        </div>

        <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                  <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Lokasi:</h4>
                    <p>Wing 20, Jl. Meranti Kampus IPB, Babakan, Kec. Dramaga, Kabupaten Bogor, Jawa Barat 16680</p>
                  </div>

                  <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>business@ittoday.id</p>
                  </div>

                  <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Narahubung:</h4>
                    <p>082127794660 (Salma)</p>
                  </div>

                  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15854.84718494163!2d106.731317!3d-6.5580193!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x89b0802179c78bdf!2sDepartemen%20Ilmu%20Komputer%20FMIPA%20IPB!5e0!3m2!1sen!2sid!4v1646064154864!5m2!1sen!2sid" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

              </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form role="form" class="php-email-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Nama</label>
                            <input type="text" name="name" wire:model="name_seeder" class="form-control" id="name"
                                required placeholder="IT Today 2022">
                            @error('name_seeder')
                                <div class="alert alert-warning my-2" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Email Anda</label>
                            <input type="email" class="form-control" wire:model="email_seeder" name="email" id="email"
                                required placeholder="admin@ittoday.id">
                            @error('email_seeder')
                                <div class="alert alert-warning my-2" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Subjek</label>
                        <input type="text" class="form-control" wire:model="subject" name="subject" id="subject"
                            required placeholder="Subject for IT Today">
                        @error('subject')
                            <div class="alert alert-warning my-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Pesan</label>
                        <textarea class="form-control" name="message" wire:model="body" rows="10" required></textarea>
                        @error('body')
                            <div class="alert alert-warning my-2" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <x-flash-message></x-flash-message>
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" wire:click="submitcontactform">Kirim</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
