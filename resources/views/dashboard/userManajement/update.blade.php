<x-layouts.dashboard title="update">
  <x-slot:body>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ubah User</h6>
      </div>
      <div class="card-body">
        <form action="{{ route('user_manajement.update', $user) }}" method="post" class="col-md-4">
          @method('patch')
          @csrf
          <div class="form-check pl-0">
            <input id="stackedCheck1" class="form-check-input" type="checkbox" data-toggle="toggle" @if ($user->hasRole('guru'))checked @endif name="guru">
            <label for="stackedCheck1" class="form-check-label mx-3">Guru</label>
          </div>
          <button class="btn btn-success my-3">Perbaharui</button>
        </form>
      </div>
    </div>
  </x-slot>
  <x-slot:script>
    
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
  </x-slot>
</x-layouts>
