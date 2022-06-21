<div>
    {{-- Be like water. --}}
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>{{ $comment->name_seeder }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>{{ $comment->email_seeder }}</td>
                    </tr>
                </table>
                <div>
                    <h1>{{ $comment->subject_seeder }}</h1>
                    <h4>Pesan</h4>
                    <div class="border p-3">
                        {!! $comment->body_seeder !!}
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
