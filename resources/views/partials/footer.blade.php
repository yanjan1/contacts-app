<footer class="bg-dark text-white py-5 mt-5">
  <div class="container">
    <div class="row">
      <!-- About -->
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold">About Us</h5>
        <p class="text-white-50">
          A solid application for managing your contacts efficiently. All your contacts in one place, easily searchable and manageable.
        </p>
      </div>

      <!-- Links -->
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold">Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="{{ route('mails.index') }}" class="text-white text-decoration-none">Common Mail Box</a></li>
          <li><a href="{{ route('login') }}" class="text-white text-decoration-none">Sign in</a></li>
          <li><a href="{{ route('register') }}" class="text-white text-decoration-none">Sign up</a></li>
          <li><a href="{{ route('password.request') }}" class="text-white text-decoration-none">Reset Password</a></li>
        </ul>
      </div>

      <!-- Social -->
      <div class="col-md-4 mb-4">
        <h5 class="fw-bold">Follow Us</h5>
        <div class="d-flex gap-3 fs-5">
          <a href="#" class="text-white"><i class="bi bi-facebook"></i></a>
          <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
          <a href="#" class="text-white"><i class="bi bi-github"></i></a>
          <a href="#" class="text-white"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

    </div>

    <hr class="border-secondary" />

    <div class="text-center text-white-50 small">
      &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
  </div>
</footer>
