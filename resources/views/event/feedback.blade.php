<x-guest-layout title="Feedback">
    <div id="list" class="album py-5">
        <div class="container" data-aos="fade-up">
            <div class="alert my-5 text-center">
                <h1>Terima Kasih Atas Partisipasi Dalam Rangkaian Event ITTODAY 2022</h1>
            </div>

            <form action="/event/feedback/{{ $event }}" method="post">
                @csrf
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="feedback"></textarea>
                    <label for="floatingTextarea2">FeedBack in Here</label>
                </div>
                <div class="row">
                    <div class="col align-self-center my-3">
                        <button type="submit" class="btn btn-primary">Kirim FeedBack</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>
