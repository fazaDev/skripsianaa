@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-12">

        <div class="card-box">
            <h4 class="mt-0 mb-7">
                Data Siswa
            </h4>
            <table class="table table-sm table-bordered">
                <thead class="bg-dark text-center text-white">
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>182737183</td>
                        <td>Tiara Dinda</td>
                        <td>Mersam</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
