@extends('layouts.master')
@section('parentPageTitle', 'Korwil')
@section('title', 'Data Alumni An-Nur II')
@section('content')
@if(Session::has('success'))
<div class="alert success-alert">
    <h3>{{ Session::get('success') }}</h3>
    <a class="close">&times;</a>
</div>
@endif
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <a class="btn btn-round btn-info" data-toggle="modal" data-target=".modalInput">Tambah</a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table-custom spacing5">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Pekerjaan</th>
                                <th>Alamat</th>
                                <th>Provinsi</th>
                                <th>Kabupaten/Kota</th>
                                <th>Kecamatan</th>
                                <th>Desa/Kelurahan</th>
                                {{-- <th>RT</th>
                                <th>RW</th> --}}
                                <th>Tahun Masuk</th>
                                <th>Tahun Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>$320,800</td>
                                {{-- <td>$320,800</td>
                                <td>$320,800</td> --}}
                                <td>$320,800</td>
                                <td>$320,800</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modalInput" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Alumni</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/input">
                        @csrf
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                        <label for="">Jenis Kelamin</label>
                        <div class="fancy-radio">
                            <label><input name="gender" value="L" type="radio"
                                    required><span><i></i>Laki-laki</span></label>
                        </div>
                        <div class="fancy-radio">
                            <label><input name="gender" value="P" type="radio"
                                    required><span><i></i>Perempuan</span></label>
                        </div>
                        <label for="">Nomor Telepon/WhatsApp</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+62 (0)</span>
                            </div>
                            <input type="number" class="form-control" aria-label="Username"
                                onkeypress="return event.charCode >= 48 && event.charCode <=57" name="wa" required>
                        </div>
                        <label for="">Pekerjaan</label>
                        <select class="custom-select" name="kerja" required>
                            <option value="">---Silahkan Pilih---</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Guru">Guru</option>
                            <option value="Dosen">Dosen</option>
                            <option value="PNS">PNS</option>
                            <option value="Polisi">Polisi</option>
                            <option value="Nelayan">Nelayan</option>
                            <option value="Pedagang">Pedagang</option>
                            <option value="Petani">Petani</option>
                            <option value="Perawat">Perawat</option>
                            <option value="Dokter">Dokter</option>
                        </select>
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                        <label for="">Provinsi</label>
                        <select class="custom-select prov" name="prov_id" required>
                            <option value="">---Silahkan Pilih---</option>
                            @foreach ($prov as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        <label for="">Kabupaten/Kota</label>
                        <select class="custom-select kab" name="kab_id" required>
                            <option value="">---Silahkan Pilih---</option>
                        </select>
                        <label for="">Kecamatan</label>
                        <select class="custom-select kec" name="kec_id" required>
                            <option value="">---Silahkan Pilih---</option>
                        </select>
                        <label for="">Desa/Kelurahan</label>
                        <select class="custom-select kel" name="kel_id" required>
                            <option value="">---Silahkan Pilih---</option>
                        </select>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="">RT</label>
                                <input type="number" class="form-control" name="rt"
                                    onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                            </div>
                            <div class="col-md-6">
                                <label for="">RW</label>
                                <input type="number" class="form-control" name="rw"
                                    onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <label for="">Tahun Masuk</label>
                                <select class="custom-select" name="masuk" required>
                                    <option value="">---Silahkan Pilih---</option>
                                    @foreach($tahun as $t)
                                    <option value="{{ $t }}">{{ $t }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Tahun Keluar</label>
                                <select class="custom-select" name="keluar" required>
                                    <option value="">---Silahkan Pilih---</option>
                                    @foreach($tahun as $t)
                                    <option value="{{ $t }}">{{ $t }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-round btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-round btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}" />
<style>
    td.details-control {
        background: url('../assets/images/details_open.png') no-repeat center center;
        cursor: pointer;
    }

    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>
@stop
@section('page-script')
<script src="{{ asset('assets/bundles/datatablescripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
{{-- <script src="{{ asset('js/ajax.js') }}"></script> --}}
@stop