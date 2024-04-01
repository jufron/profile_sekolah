<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class="container-fluid">
      <h1 class="text-center mt-5" id="judul">Laporan Daftar Guru</h1>
      <p class="mb-5 text-center">Daftar seluruh guru pada SMK Uyelindo Kupang</p>

      <p id="tanggal">Tanggal : </p>
      <p id="jam">Jam : </p>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              {{-- <th scope="col">Foto</th> --}}
              <th scope="col">Nama Lengkap</th>
              <th scope="col">NIP</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Agama</th>
              <th scope="col">Alamat</th>
              <th scope="col">Telp</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Mata Pelajaran</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($allGuru as $guru)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              {{-- <td>
                <img class="img-responsive img-thumbnail img-rounded" width="60" src="{{ asset("storage/$guru->avatar") }}" alt="foto_profil_guru">
              </td> --}}
              <td>{{ $guru->gelar_depan ? "$guru->gelar_depan," : '' }} {{ "$guru->nama_lengkap," }} {{ $guru->gelar_belakang }}</td>
              <td>{{ $guru->nip ?? '-' }}</td>
              <td>{{ $guru->jenis_kelamin }}</td>
              <td>{{ $guru->agama }}</td>
              <td>{{ $guru->alamat }}</td>
              <td>{{ $guru->nomor_telepon }}</td>
              <td>
                @foreach ($guru->mataPelajaran as $mapel)
                <li>{{ $mapel->nama }}</li>
                @endforeach
              </td>
              <td>
                @foreach ($guru->jurusan as $jur)
                <li>{{ $jur->nama }}</li>
                @endforeach
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>

      const d = new Date();
      const day = d.getUTCDate();
      const month = d.toLocaleString('default', { month: 'long' })
      const year = d.getFullYear();

      const curr_hour = d.getHours();
      const curr_min = d.getMinutes();
      const curr_sec = d.getSeconds();

      document.querySelector('#judul').textContent += ` ${year}`;
      document.querySelector('#tanggal').textContent += ` ${day} ${month} ${year}`;
      document.querySelector('#jam').textContent += ` ${curr_hour}:${curr_min}:${curr_sec}`;

    </script>
  </body>
</html>
