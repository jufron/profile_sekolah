<x-layouts.dashboard title="Berita">
  <x-slot:body>
    <div class="row">
      <!-- Earnings (Monthly) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Berita</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">123</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Earnings (Annual) Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Kategory</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">121</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Tasks Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                          </div>
                          <div class="row no-gutters align-items-center">
                              <div class="col-auto">
                                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                              </div>
                              <div class="col">
                                  <div class="progress progress-sm mr-2">
                                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Pending Requests Card Example -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                  <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              Pending Requests</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-comments fa-2x text-gray-300"></i>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Daftar Berita</h6>
      </div>
      <div class="card-body">
        <h1 class="h3 mb-0 text-gray-800 mb-2">Berita</h1>

        <a href="#" class="btn btn-success btn-icon-split my-3">
            <span class="text">Tambah</span>
        </a>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Banner</th>
                  <th>Judul</th>
                  <th>Text</th>
                  <th>User</th>
                  <th>Kategory</th>
                  <th>publish status</th>
                  <th>Tanggal Buat</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Banner</th>
                  <th>Judul</th>
                  <th>Text</th>
                  <th>User</th>
                  <th>Kategory</th>
                  <th>publish status</th>
                  <th>Tanggal Buat</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>System Architect</td>
                  <td>Lorem, ipsum dolor.</td>
                  <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. At ipsa perspiciatis, fugiat magnam veritatis natus ipsam quaerat voluptatem molestias quos.</td>
                  <td>Lorem, ipsum.</td>
                  <td>Lorem, ipsum dolor.</td>
                  <td>Publish</td>
                  <td>61</td>
                  <td>
                    <a href="#" class="btn btn-warning btn-circle btn-sm">
                        <i class="fas fa-exclamation-triangle"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>

  </x-slot>
</x-layouts.dashboard >
