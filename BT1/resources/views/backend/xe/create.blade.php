@extends('layout.master')
@section('content')
    <div class="container" style="margin-left:280px">
        <h1 class="text-center">THÊM THÔNG TIN XE</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h5 class="mb-5 mt-5"><a href="{{route('cars.index')}}">
                << Quay lại</a>
        </h5>
        <form action="{{ route('cars.store') }}" method="post" id="add_car">
            @csrf
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Số xe(*)</label><span class="text-danger" id="error_number_car"></span>
                    <input class="form-control" type="text" name="number_car" id="number_car" placeholder="Nhập số xe">
                </div>
                <div class="form-group col-md-2">
                    <label>Loại xe(*)</label><span class="text-danger" id="error_typecar"></span>
                    <select name="typecar" id="typecar" class="form-control">
                        <option value="">Chọn loại xe</option>
                        @foreach ($type_car as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Nhãn hiệu xe</label>
                    <select name="labelcar" id="labelcar" class="form-control">
                        <option value="">Chọn nhãn hiệu xe</option>
                        @foreach ($label_car as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Số loại xe</label>
                    <select name="number_type_car" id="number_type_car" class="form-control">
                        <option value="">Chọn số loại xe</option>
                        @foreach ($number_type_car as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label class="text-danger">Đơn vị vận chuyển</label><span class="text-danger" id="error_dvvc"></span>
                    <select name="dvvc" id="dvvc" class="form-control">
                        @foreach ($dvvc as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Gợi ý số rơ móoc</label><span class="text-danger" id="error_romooc"></span>
                    <select name="romooc" id="romooc" class="form-control">
                        <option value="">Chọn rơ mooc</option>
                        @foreach ($romooc as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Gợi ý tài xế</label><span class="text-danger" id="error_driver"></span>
                    <select name="driver" id="driver" class="form-control">
                        <option value="">Chọn tài xế</option>
                        @foreach ($driver as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Gợi ý phụ xe</label><span class="text-danger" id="error_subdriver"></span>
                    <select name="subdriver" id="subdriver" class="form-control">
                        <option value="">Chọn phụ xe</option>
                        @foreach ($sub_driver as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Gợi ý loại bảng kê</label><span class="text-danger" id="error_list"></span>
                    <select name="type_list" id="type_list" class="form-control">
                        <option value="">Chọn gợi ý loại bảng kê</option>
                        @foreach ($type_list as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Xe có bơm</label><span class="text-danger" id="error_car_pump"></span>
                    <select name="car_pump" id="car_pump" class="form-control">
                        <option value="">Chọn loại</option>
                        <option value="có">có</option>
                        <option value="không">không</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Chọn cấu trúc bánh(*)</label><span class="text-danger" id="error_wheel_structure"></span>
                    <select name="wheel_structure" id="wheel_structure" class="form-control">
                        <option value="">Chọn cấu trúc bánh</option>
                        @foreach ($wheel_structure as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Loại nhiên liệu(*)</label><span class="text-danger" id="error_fuel"></span>
                    <select name="fuel" id="fuel" class="form-control">
                        <option value="">Chọn loại nhiên liệu</option>
                        @foreach ($fuel as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Năm sản xuất</label><span class="text-danger" id="error_year_of_manufacture"></span>
                    <input class="form-control" type="text" name="year_of_manufacture" id="year_of_manufacture" placeholder="Nhập năm sản xuất">
                </div>
                <div class="form-group col-md-2">
                    <label>Định mức NL(lít/100km)</label><span class="text-danger" id="error_fuel_norms"></span>
                    <input class="form-control" type="text" name="fuel_norms" id="fuel_norms" value="0">
                </div>
                <div class="form-group col-md-2">
                    <label>Ngày bắt đầu sử dụng</label><span class="text-danger" id="error_start_date"></span>
                    <input class="form-control" type="date" name="start_date" id="start_date">
                </div>
                <div class="form-group col-md-2">
                    <label>Trạng thái(*)</label><span class="text-danger" id="error_status"></span>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Đang sử dụng</option>
                        <option value="0">Ngưng sử dụng</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Ngày ngừng sử dụng</label><span class="text-danger" id="error_end_date"></span>
                    <input class="form-control" type="date" name="end_date" id="end_date" disabled>
                </div>
                <div class="form-group col-md-2">
                    <label>Dùng vỏ sơ cua(*)</label>
                    <select name="spare_tire" id="spare_tire" class="form-control">
                        <option value="không dùng">không dùng</option>
                        <option value="dùng">dùng</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Thông tin xe</label>
                    <textarea name="info_car" id="info_car" cols="30" rows="5" class="form-control" placeholder="Thông tin xe"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Ghi chú</label>
                    <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="Nhập ghi chú"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Ghi chú thống kê tồn</label>
                    <textarea name="inventory" id="inventory" cols="30" rows="5" class="form-control" placeholder="Nhập ghi chú thống kê tồn"></textarea>
                </div>
                <div class="mb-5">
                    <a class="btn btn-warning" href="{{ route('cars.index') }}" role="button">Quay lại</a>
                    <button type="submit" class="btn btn-success" id="save_button">Lưu</button>
                </div>
            </div>
        </form>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        $("#typecar,#labelcar,#number_type_car,#dvvc,#romooc,#driver,#subdriver,#type_list,#wheel_structure,#fuel")
            .select2();
        // Xử lí trạng thái đang xử dụng và ngung sử dụng
        $("#status").change(function() {
            if ($(this).val() == "0") {
                $("#end_date").removeAttr('disabled');
            } else {
                $("#end_date").attr('disabled', true);
            }
        });
        // Chức năng lưu xe
        $("#add_car").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('cars.store') }}",
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.mess,
                        timer: 5000,
                        showConfirmButton: true,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('cars.index') }}";
                        }
                    });
                    // Tự động chuyển trang sau 5 giây nếu người dùng không nhấn nút OK
                    setTimeout(() => {
                        window.location.href = "{{ route('dvvc-index') }}";
                    }, 5000);
                },
                error: function(xhr) {
                    $("#error_number_car").text('');
                    $("#error_typecar").text('');
                    $("#error_wheel_structure").text('');
                    $("#error_fuel").text('');
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = [];

                        // Trích xuất thông báo lỗi từ JSON
                        for (var field in errors) {
                            errorMessages.push(errors[field][0]);
                        }

                        // Hiển thị thông báo lỗi
                        Swal.fire({
                            icon: 'error',
                            title: '<span style="color:red">Lỗi nhập dữ liệu</span>',
                            html: '<span style="color:red">' + errorMessages.join(
                                '. ') + '</span>',
                        });
                    }

                    // Xử lí lỗi ngay bên title của item
                    $("#error_number_car").text(xhr.responseJSON.errors.number_car);
                    $("#error_typecar").text(xhr.responseJSON.errors.typecar);
                    $("#error_wheel_structure").text(xhr.responseJSON.errors.wheel_structure);
                    $("#error_fuel").text(xhr.responseJSON.errors.fuel);


                },
            });

        });

    });
</script>
