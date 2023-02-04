<x-layouts.dashboard title="Berita">

  <x-slot:body>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kategory</h6>
        </div>
        <div class="card-body">
          <h1 class="h3 mb-0 text-gray-800 mb-2">Kategory</h1>

          <a href="#" data-toggle="modal" data-target="#add_kategory_modal" class="btn btn-success btn-icon-split my-3">
              <span class="text">Tambah</span>
          </a>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name Kategory</th>
                  <th>Tanggal Buat</th>
                  <th>Tanggal Pembaharuan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Name Kategory</th>
                  <th>Tanggal Buat</th>
                  <th>Tanggal Pembaharuan</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
                <tbody id="body_table_kategory">

                </tbody>
              </table>
            </div>
        </div>
    </div>

    {{-- modal add --}}
    <div class="modal fade" id="add_kategory_modal" tabindex="-1" role="dialog" aria-labelledby="add_kategory_modal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategory Baru?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama">Email address</label>
                    <input type="email" class="form-control" id="nama" name="nama_kategory">
                    <div class="invalid-feedback" id="invalid_feedback_name">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button id="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>

  </x-slot>
  <x-slot:script>
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    {{-- swetalert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      const submit = document.querySelector('#submit');
      const route = "{{ route('kategory.store') }}";
      const token = "{{ csrf_token() }}";
      const modal_kategory = document.querySelector('#add_kategory_modal');

      let input = document.getElementById('nama');
      let invalid_feedback_nama = document.querySelector('#invalid_feedback_name');

      submit.addEventListener('click', function () {
        const data = document.getElementsByName('nama_kategory')[0].value;

        fetch(route, {
          headers: {
            "Content-Type" : "application/json",
            "Accept" : "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token" : token
          },
            method: "post",
            credentials: "same-origin",
            body : JSON.stringify({
              nama : data
            })
        })
          .then( res => res.json())
          .then( json => {
            displayValidation(json);
          })
        });

        function displayValidation (json) {
          const data = document.getElementsByName('nama_kategory')[0];

          if (json.errors) {
            const error_text = json.errors.nama[0];

            input.classList.add('is-invalid');
            invalid_feedback_nama.textContent = error_text;
          } else {
            $('#add_kategory_modal').modal('hide');
            successModal(json.message);
            getDataTable();

            // reset input
            data.value = '';
            input.classList.remove('is-invalid');
            invalid_feedback_nama.textContent = '';
          }
        }

      function successModal (text) {
        Swal.fire({
          icon: 'success',
          title: `${text}`,
          timer: 3500
        });
      }

      function getDataTable () {
        const routeGetData = "{{ route('kategory.data') }}";

        fetch(routeGetData)
          .then(res => res.json())
          .then(json => {
            displayDataTableKategory(json.data);
          });

        function displayDataTableKategory (data) {
          let ell = '';
          const body_table_kategory = document.querySelector('#body_table_kategory');

          console.log(data);

          data.forEach(d => {
            ell += `
            <tr>
              <td>1</td>
              <td>${d.nama}</td>
              <td>${d.tanggal_perbaharui}</td>
              <td>${d.tanggal_buat}</td>
              <td>
                <a href="#" class="btn btn-warning btn-circle btn-sm">
                    <i class="fas fa-exclamation-triangle"></i>
                </a>
                <a href="#" onclick="deleteModal(${d.id}, '${d.nama}', '{{ route('kategory.destroy', 'id') }}')" class="btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i>
                </a>
              </td>
            </tr>
            `;
          });

          body_table_kategory.innerHTML = ell;
        }
      }

      getDataTable();

      function deleteModal (id, dataKategory, url) {
        Swal.fire({
          title: `Yakin ingin menghapus '${dataKategory}' tersebut?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            deleteDataFetch(id, url);
          }
        })
      }

      // deleteModal();

      function deleteDataFetch (id, url) {
        console.log(id);
        let new_url = url.replace('id', id);

        fetch(new_url, {
          headers: {
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token" : token
          },
          method : 'delete',
          body : {
            '_method': 'DELETE'
          }
        })
          .then( res => res.json())
          .then( json => {
            console.log(json);
              if (json.message) {
                successModal(json.message);
                getDataTable();
              }

          });
      }

    </script>
  </x-slot>
</x-layouts.dashboard >
