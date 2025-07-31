 @if (session('success'))
     <div class="my-2 alert alert-success">
         {{ session('success') }}
     </div>
 @endif

 @if (session('error'))
     <div class="my-2 alert alert-danger">
         {{ session('error') }}
     </div>
 @endif
