@extends('layouts.app')

@section('title', 'Your Mailbox')

@section('content')

    <div class="container py-5">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th scope="col">To</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Body</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mails as $mail)
                        <tr>
                            <td>{{ $mail->to_email }}</td>
                            <td>{{ $mail->subject }}</td>
                            <td style="white-space: pre-line">{{ $mail->body }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">No mails found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex flex-row  justify-content-center">
            {{ $mails->links() }}
        </div>
    </div>

@endsection
