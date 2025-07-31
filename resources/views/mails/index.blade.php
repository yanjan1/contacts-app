@extends('layouts.app')

@section('title', 'Your Mailbox')

@section('content')

<div class="container py-5">
    <h2 class="pb-4">Common Mailbox</h2>
  @forelse ($mails as $mail)
    <article class="card mb-4 shadow-sm">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $mail->subject }}</h5>
        <span class="badge bg-primary text-uppercase">{{ $mail->type }}</span>
      </div>
      <div class="card-body">
        <p class="text-muted mb-2"><strong>To:</strong> {{ $mail->to }}</p>
        <div class="mail-body" style="white-space: pre-line;">
          {{ $mail->body }}
        </div>
      </div>
      <div class="card-footer text-end">
        <small class="text-muted">Sent {{ $mail->created_at->diffForHumans() }}</small>
      </div>
    </article>
  @empty
    <div class="alert alert-info text-center">
      No mails found.
    </div>
  @endforelse

  <div class="d-flex justify-content-center mt-4">
    {{ $mails->links() }}
  </div>
</div>
@endsection
