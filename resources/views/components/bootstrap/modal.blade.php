<!-- Modal -->
<div class="modal fade" id="{{ $modalId }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="{{ $modalLabel }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="{{ $modalLabel }}">{{ $modalTitle }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      {{ $slot }}

    </div>
  </div>
</div>
