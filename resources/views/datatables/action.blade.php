<form id="form_hapus_jurnal_kelas" action="{{ route('jurnal.destroy', $model) }}" method="POST">
  @method('delete')
  @csrf
  <a href="#" route-jurnal="{{ route('jurnal.show', $model) }}" id="show_jurnal" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#jurnal_kelas_modal">
    <i class="fas fa-info-circle"></i>
  </a>
  <a href="{{ route('jurnal.edit', $model) }}" class="btn btn-warning btn-circle btn-sm">
      <i class="fas fa-exclamation-triangle"></i>
  </a>
  <button onclick="return false" id="hapus_jurnal_kelas" class="btn btn-danger btn-circle btn-sm">
    <i class="fas fa-trash"></i>
  </button>
</form>
