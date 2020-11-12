@extends('layouts.home.layouts.master')

@section('title', 'NewTime Hotel - Quản lí tài khoản')

@section('content')
    <div class="block-30 block-30-sm item" style="background-image: url('{{ asset('assets/home/images/bg_2.jpg') }}');"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <span class="subheading-sm">Tài khoản</span>
                    <h2 class="heading">Quản lí Tài khoản</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-4">
                                @if(session()->get('message') != null)
                                    <div
                                        class="alert alert-{{ session()->get('message')['status'] }} alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        {{ session()->get('message')['content'] }}
                                    </div>
                                @endif
                                <div class="d-flex justify-content-start">
                                    <div class="image-container">
                                        <img src="{{ asset('images/customer').'/'.$khachhang->avatar }}" id="imgProfile"
                                             style="width: 150px; height: 150px" class="img-thumbnail"/>
                                        <div class="middle">
                                            <form enctype="multipart/form-data" method="post"
                                                  action="{{ url('/account/edit') }}">
                                                @csrf
                                                <input name="avatar" type="button" class="btn btn-secondary"
                                                       id="btnChangePicture"
                                                       value="Thay đổi"/>
                                                <input type="file" style="display: none;" id="profilePicture"
                                                       name="avatar"/>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="userData ml-3">
                                        <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a
                                                href="javascript:void(0);">{{ $khachhang->hoten }}</a></h2>
                                        <h6 class="d-block">Email: <a
                                                href="javascript:void(0)">{{ $khachhang->email }}</a></h6>
                                        <h6 class="d-block mt-4"><a href="{{ url('/account/edit') }}"
                                                                    class="btn btn-primary" id="btnUpdate">Cập nhật</a>
                                        </h6>
                                    </div>
                                    <div class="ml-auto">
                                        <input type="button" class="btn btn-primary d-none" id="btnDiscard"
                                               value="Hủy"/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="profile-tab" data-toggle="tab"
                                               href="#profile" role="tab" aria-controls="profile" aria-selected="true">
                                                Thông tin cá nhân
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="booking-history-tab" data-toggle="tab"
                                               href="#booking-history" role="tab" aria-controls="booking-history"
                                               aria-selected="false">Lịch sử đặt Phòng</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content ml-1" id="myTabContent">
                                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                             aria-labelledby="profile-tab">

                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Họ và Tên</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{ $khachhang->hoten }}
                                                </div>
                                            </div>
                                            <hr/>

                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Địa chỉ Email</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{ $khachhang->email }}
                                                </div>
                                            </div>
                                            <hr/>


                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Số điện thoại</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{ $khachhang->sdt }}
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Ngày sinh</label>
                                                </div>
                                                {{ \Carbon\Carbon::parse($khachhang->ngaysinh)->format('d/m/Y') }}
                                            </div>
                                            <hr/>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 col-5">
                                                    <label style="font-weight:bold;">Địa chỉ</label>
                                                </div>
                                                <div class="col-md-8 col-6">
                                                    {{ $khachhang->diachi }} - {{ $khachhang->thanhpho['ten'] }}
                                                    - {{ $khachhang->tinh['ten'] }}
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="booking-history" role="tabpanel"
                                             aria-labelledby="booking-history-tab">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table id="booking-history-table" class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Khách hàng</th>
                                                            <th>Tên phòng</th>
                                                            <th>Ngày đặt</th>
                                                            <th>Bắt đầu</th>
                                                            <th>Kết thúc</th>
                                                            <th>Trạng thái</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                            /*
                                                            @for($i = 0; $i < count($thues); $i++)
                                                                <tr>
                                                                    <td>{{ $i + 1 }}</td>
                                                                    <td>{{ $thues[$i]->khachhang['hoten'] }}</td>
                                                                    <td>
                                                                        <a href="{{ url('/room').'/'. $thues[$i]->idphong }}"
                                                                           target="_blank">{{ $thues[$i]->phong['tenphong'] }}</a>
                                                                    </td>
                                                                    <td>{{ \Carbon\Carbon::parse($thues[$i]->created_at)->format('d/m/Y H:i:s') }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($thues[$i]->batdau) }}</td>
                                                                    <td>{{ \Carbon\Carbon::parse($thues[$i]->ketthuc) }}</td>
                                                                    <td>{{ $thues[$i]->trangthaithue['mota'] }}</td>
                                                                </tr>
                                                            @endfor
                                                                */
                                                        @endphp
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            @php
                                                /*
                                             {{ $thues->links() }}
                                             */
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            let bookingHistory = $('#booking-history-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                order: [[3, 'desc']],
                ajax: {
                    url: '{{route('customer.reservation.ajaxGetReservation')}}',
                    method: 'post',
                    headers: {
                        'X-CSRF-TOKEN': '{{csrf_token()}}',
                    },
                },
                columns: [
                    {data: null, name: '#'},
                    {data: 'khachhang.hoten', name: 'khachhang.hoten'},
                    {data: 'phong.tenphong', name: 'phong.tenphong'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'batdau', name: 'batdau'},
                    {data: 'ketthuc', name: 'ketthuc'},
                    {data: 'trangthai', name: 'trangthaithue.mota'},
                ],
                columnDefs: [
                    {targets: 0, searchable: false, orderable: false},
                ],
            });

            bookingHistory.on('draw.dt', function () {
                let info = bookingHistory.page.info();
                bookingHistory.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, index) {
                    cell.innerHTML = index + 1 + (info.page * info.length);
                });
            });

        });
    </script>
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/account.js') }}"></script>
@endsection
