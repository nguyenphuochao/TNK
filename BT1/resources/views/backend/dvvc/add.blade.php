@extends('layout.master')
@section('content')
    <div class="container" style="margin-left:280px">
        <h1 class="text-center">THÊM THÔNG TIN ĐƠN VỊ VẬN CHUYỂN</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h4>THÔNG TIN ĐƠN VỊ VẬN CHUYỂN</h4>
        <form method="post" id="add_dvvc">
            @csrf
            <div class="row">
                <div class="form-group col-md-2">
                    <label>Tên DVVC(*)</label><span class="text-danger" id="errorname"></span>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="form-group col-md-2">
                    <label>Tên viết tắt(*)</label><span class="text-danger" id="erroralias"></span>
                    <input class="form-control" type="text" name="alias" id="alias">
                </div>
                <div class="form-group col-md-2">
                    <label>Số điện thoại</label><span class="text-danger" id="errorphone"></span>
                    <input class="form-control" type="text" name="phone" id="phone">
                </div>
                <div class="form-group col-md-2">
                    <label>Mã số thuế</label><span class="text-danger" id="errortaxcode"></span>
                    <input class="form-control" type="text" name="taxcode" id="taxcode">
                </div>
                <div class="form-group col-md-2">
                    <label>Trạng thái DVVC</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Còn hợp tác</option>
                        <option value="0">Ngưng hợp tác</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Ngày ngừng hợp tác</label>
                    <input class="form-control" type="date" name="stopdate" id="stopdate" disabled required>
                </div>
                <div class="form-group col-md-4">
                    <label>Tên tài khoản ngân hàng</label>
                    <input class="form-control" type="text" name="bankaccount" id="bankaccount">
                </div>
                <div class="form-group col-md-4">
                    <label>Số tài khoản</label>
                    <input class="form-control" type="text" name="accountnumber" id="accountnumber">
                </div>
                <div class="form-group col-md-4">
                    <label>Mở tại ngân hàng</label>
                    <input class="form-control" type="text" name="branch" id="branch">
                </div>
                <div class="form-group col-md-4">
                    <label>Địa chỉ</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="4"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Thông tin liên hệ</label>
                    <textarea class="form-control" name="contact" id="contact" cols="30" rows="4"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Ghi chú</label>
                    <textarea class="form-control" name="note" id="note" cols="30" rows="4"></textarea>
                </div>
                <div class="mb-5">
                    <a class="btn btn-warning" href="{{ route('dvvc-index') }}" role="button">Quay lại</a>
                    <button type="submit" class="btn btn-success" id="save_button">Lưu</button>
                </div>


            </div>
        </form>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        // Xử lí status = ngưng hợp tác
        $("#status").change(function() {
            if ($(this).val() == '1') {
                $("#stopdate").attr('disabled', 'disabled');
            } else {
                $("#stopdate").removeAttr('disabled', false)
            }
            // alert($("#status").val())


        });
        // Thêm mới DVVC
        $("#add_dvvc").submit(function(event) {
            event.preventDefault();
            // Block nút lưu lại khi save
            $("#save_button").prop('disabled', true);
            // Resset Error
            $("#errorname").text('');
            $("#erroralias").text('');
            $("#errorphone").text('');
            $("#errortaxcode").text('');
            $.ajax({
                type: "POST",
                url: "{{ route('dvvc-store') }}",
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
                            window.location.href = "{{ route('dvvc-index') }}";
                        }
                    });
                    // Tự động chuyển trang sau 5 giây nếu người dùng không nhấn nút OK
                    setTimeout(() => {
                        window.location.href = "{{ route('dvvc-index') }}";
                    }, 5000);
                    // reset input
                    $("#name").val("");
                    $("#alias").val("");
                    $("#phone").val("");
                    $("#taxcode").val("");
                    $("#stopdate").val("");
                    $("#bankaccount").val("");
                    $("#accountnumber").val("");
                    $("#branch").val("");
                    $("#address").val("");
                    $("#contact").val("");
                    $("#note").val("");
                },
                error: function(xhr) {
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
                    $("#errorname").text(xhr.responseJSON.errors.name);
                    $("#erroralias").text(xhr.responseJSON.errors.alias);
                    $("#errorphone").text(xhr.responseJSON.errors.phone);
                    $("#errortaxcode").text(xhr.responseJSON.errors.taxcode);
                    console.log(xhr.responseJSON && xhr.responseJSON.errors);
                    // Mở khóa lock button save
                    $("#save_button").prop('disabled', false);
                },
                // error: function(error){
                //     console.log(error);
                // }
            });
        })
    });
</script>
