@extends('layout.master')
@section('content')
    <div class="container" style="margin-left:280px">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="text-center">SỬA THÔNG TIN ĐƠN VỊ VẬN CHUYỂN</h2>
        <form method="post" id="add_dvvc">
            @csrf
            <div class="row">
                <input type="hidden" name="id" id="id" value="{{ $dvvc->id }}">
                <div class="form-group col-md-2">
                    <label>Tên DVVC(*)</label><span class="text-danger" id="errorname"></span>
                    <input class="form-control" type="text" name="name" value="{{ $dvvc->name }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Tên viết tắt(*)</label><span class="text-danger" id="erroralias"></span>
                    <input class="form-control" type="text" name="alias" value="{{ $dvvc->alias }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Số điện thoại</label><span class="text-danger" id="errorphone"></span>
                    <input class="form-control" type="text" name="phone" value="{{ $dvvc->phone }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Mã số thuế</label><span class="text-danger" id="errortaxcode"></span>
                    <input class="form-control" type="text" name="taxcode" value="{{ $dvvc->taxcode }}">
                </div>
                <div class="form-group col-md-2">
                    <label>Trạng thái DVVC</label>
                    <select name="status" id="status" class="form-control">
                        <option value="1" @if ($dvvc->status == 1) {{ 'selected' }} @endif>Còn hợp tác
                        </option>
                        <option value="0" @if ($dvvc->status == 0) {{ 'selected' }} @endif>Ngưng hợp tác
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Ngày ngừng hợp tác</label>
                    <input class="form-control" type="date" name="stopdate" id="stopdate" value="{{ $dvvc->stopdate }}"
                        @if ($dvvc->status == 1) {{ 'disabled' }} @endif>
                </div>
                <div class="form-group col-md-4">
                    <label>Tên tài khoản ngân hàng</label>
                    <input class="form-control" type="text" name="bankaccount" value="{{ $dvvc->bankaccount }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Số tài khoản</label>
                    <input class="form-control" type="text" name="accountnumber" value="{{ $dvvc->accountnumber }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Mở tại ngân hàng</label>
                    <input class="form-control" type="text" name="branch" value="{{ $dvvc->branch }}">
                </div>
                <div class="form-group col-md-4">
                    <label>Địa chỉ</label>
                    <textarea class="form-control" name="address" cols="30" rows="4">{{ $dvvc->address }}</textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Thông tin liên hệ</label>
                    <textarea class="form-control" name="contact" cols="30" rows="4">{{ $dvvc->contact }}</textarea>
                </div>
                <div class="form-group col-md-4">
                    <label>Ghi chú</label>
                    <textarea class="form-control" name="note" cols="30" rows="4">{{ $dvvc->note }}</textarea>
                </div>
                <div>
                    <input type="hidden" name="version" value="{{ $dvvc->version }}">
                </div>
                <div class="mb-5">
                    <a class="btn btn-warning" href="{{ route('dvvc-index') }}" role="button">Quay lại</a>
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </div>
        </form>
        <h2>THÔNG TIN ĐĂNG NHẬP</h2>
        <!-- Modal add-->
        <button type="button" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#exampleModalCenter">Thêm
            người dùng</button>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Người dùng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('dvvc.add_user') }}" method="POST" id="add_user">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-danger">*</span></label><span
                                            class="text-danger" id="email_error"></span>
                                        <input type="text" class="form-control" name="email" id="email"
                                            placeholder="Nhập email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Tên đăng nhập<span class="text-danger">*</span></label><span
                                            class="text-danger" id="username_error"></span>
                                        <input type="text" class="form-control" name="username" id="username"
                                            placeholder="Nhập tên đăng nhập">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Mật khẩu<span class="text-danger">*</span></label><span
                                            class="text-danger" id="password_error"></span>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Nhập lại khẩu<span class="text-danger">*</span></label><span
                                            class="text-danger" id="repassword_error"></span>
                                        <input type="password" class="form-control" name="repassword" id="repassword"
                                            placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Người dùng<span class="text-danger">*</span></label><span
                                            class="text-danger" id="name_error"></span>
                                        <input type="text" class="form-control" name="name" id="name2"
                                            placeholder="Nhập tên người dùng">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Quyền sử dụng</label>
                                        <select name="level" id="" class="form-control">
                                            <option value="1">Chính</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Số điện thoại</label><span class="text-danger"
                                            id="phone_error"></span>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Ngày tạo-sửa</label>
                                        <input type="text" class="form-control" value="{{ $dvvc->created_at }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Người tạo-sửa</label>
                                        <input type="text" class="form-control" value="{{ $dvvc->user->username }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" id="parent_id" name="parent_id" value="{{ $dvvc->user->id }}">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">Lưu người dùng</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-----Modal edit------>
        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Sửa người dùng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('dvvc.update_user') }}" method="POST" id="edit_user">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email<span class="text-danger">*</span></label><span
                                            class="text-danger" id="email_error_edit"></span>
                                        <input type="text" class="form-control" name="email_edit" id="email_edit"
                                            placeholder="Nhập email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Tên đăng nhập<span class="text-danger">*</span></label><span
                                            class="text-danger" id="username_error_edit"></span>
                                        <input type="text" class="form-control" name="username_edit"
                                            id="username_edit" placeholder="Nhập tên đăng nhập">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Mật khẩu<span class="text-danger"></span></label><span
                                            class="text-danger" id="password_error_edit"></span>
                                        <input type="password" class="form-control" name="password_edit"
                                            id="password_edit" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Nhập lại khẩu<span class="text-danger"></span></label><span
                                            class="text-danger" id="repassword_error_edit"></span>
                                        <input type="password" class="form-control" name="repassword_edit"
                                            id="repassword_edit" placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Người dùng<span class="text-danger">*</span></label><span
                                            class="text-danger" id="name_error_edit"></span>
                                        <input type="text" class="form-control" name="name_edit" id="name_edit"
                                            placeholder="Nhập tên người dùng">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Quyền sử dụng</label>
                                        <select name="level_edit" id="level_edit" class="form-control">
                                          
                                            <option value="1">Chính</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Số điện thoại</label><span class="text-danger"
                                            id="phone_error_edit"></span>
                                        <input type="text" class="form-control" name="phone_edit" id="phone_edit"
                                            placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Ngày tạo-sửa</label>
                                        <input type="text" class="form-control" value="{{ $dvvc->created_at }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Người tạo-sửa</label>
                                        <input type="text" class="form-control" value="{{ $dvvc->user->username }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="hidden" name="id_edit" id="id_edit">
                                <input type="hidden" id="parent_id_edit" name="parent_id_edit"
                                    value="{{ $dvvc->user->id }}">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">Sửa người dùng</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- DataTable --}}
        <table class="table" id="myTable">
            <thead style="background-color: #1b5679;color:white">
                <tr>
                    <th>STT</th>
                    <th>EMAIL</th>
                    <th>TÊN ĐĂNG NHẬP</th>
                    <th>NGƯỜI DÙNG</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>QUYỀN SỬ DỤNG</th>
                    <th>NGÀY TẠO-SỬA/NGƯỜI TẠO-SỬA</th>
                    <th>CHỨC NĂNG</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
        // List người dùng
        var table = $("#myTable").DataTable({
            searching: false,
            processing: true,
            serverSide: true,
            paging: true, // bật phân trang
            pageLength: 20, // Số bản ghi mặc định được hiển thị trên trang
            lengthMenu: [20, 40, 60, 80, 100], // Định nghĩa danh sách lựa chọn
            stateSave: true,

            ajax: {
                url: '{{ route('dvvc.danhsach_user') }}',
                data: function(d) {
                    d.parent_id = $("#parent_id").val()
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    render: function(data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'level_name',
                    name: 'level_name'
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        const date = new Date(data);
                        const year = date.getFullYear(); // Năm
                        const month = (date.getMonth() + 1).toString().padStart(2,
                            "0"); // Tháng
                        const day = date.getDate().toString().padStart(2, "0"); // Ngày
                        const hours = date.getHours().toString().padStart(2, "0"); // Giờ
                        const minutes = date.getMinutes().toString().padStart(2, "0"); // Phút
                        const seconds = date.getSeconds().toString().padStart(2, "0"); // Giây
                        const formattedDateTime =
                            `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
                        return formattedDateTime
                    }
                },

                {
                    data: 'action',
                    name: 'action'
                },

            ],
        });
        // Xử lí add người dùng
        $("#add_user").submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('dvvc.add_user') }}",
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.mess,
                        showConfirmButton: true,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#exampleModalCenter').modal('hide');
                            table.draw(false);
                        }
                    });
                    // Tự động chuyển trang sau 5 giây nếu người dùng không nhấn nút OK
                    setTimeout(() => {
                        $('#exampleModalCenter').modal('hide');
                        table.draw(false);
                    }, 5000);
                    // reset error
                    $("#email").val('');
                    $("#username").val('');
                    $("#password").val('');
                    $("#repassword").val('');
                    $("#name2").val('');
                    $("#phone").val('');
                    // reset error
                    $("#email_error").text('');
                    $("#username_error").text('');
                    $("#password_error").text('');
                    $("#repassword_error").text('');
                    $("#name_error").text('');
                    $("#phone_error").text('');
                },
                error: function(xhr) {
                    // reset error
                    $("#email_error").text('');
                    $("#username_error").text('');
                    $("#password_error").text('');
                    $("#repassword_error").text('');
                    $("#name_error").text('');
                    $("#phone_error").text('');
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
                        // Xử lí lỗi ngay bên title của item
                        $("#email_error").text(xhr.responseJSON.errors.email);
                        $("#username_error").text(xhr.responseJSON.errors.username);
                        $("#password_error").text(xhr.responseJSON.errors.password);
                        $("#repassword_error").text(xhr.responseJSON.errors.repassword);
                        $("#name_error").text(xhr.responseJSON.errors.name);
                        $("#phone_error").text(xhr.responseJSON.errors.phone);
                        console.log(xhr.responseJSON && xhr.responseJSON.errors);
                    }
                },
            });
        });
        // Xóa người dùng
        $("#myTable").on('click', '.btnDestroy', function(e) {
            e.preventDefault();
            var link = $(this);
            var id = link.data('id'); // Lấy dữ liệu ID từ thuộc tính data
            if (confirm('Bạn chắc xóa chứ?')) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('dvvc.destroy_user', '') }}" + '/' + id,
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: response.mess,
                        });
                        table.draw();
                    }
                });
            }

        });
        // Sửa người dùng
        $("#myTable").on('click', '.btnEdit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            //alert(id);
            $("#editUser").modal('show');
            $.ajax({
                type: "GET",
                url: "{{ route('dvvc.edit_user', '') }}" + '/' + id,
                success: function(response) {
                    $("#id_edit").val(response.user.id);
                    $("#email_edit").val(response.user.email);
                    $("#username_edit").val(response.user.username);
                    $("#password_edit").val('');
                    $("#repassword_edit").val('');
                    $("#name_edit").val(response.user.name);
                    $("#phone_edit").val(response.user.phone);
                    console.log(response);
                }
            });
        });
        // Update user
        $("#edit_user").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{ route('dvvc.update_user') }}",
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.mess,
                        showConfirmButton: true,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#editUser').modal('hide');
                            table.draw(false);
                        }
                    });
                    // Tự động chuyển trang sau 5 giây nếu người dùng không nhấn nút OK
                    setTimeout(() => {
                        $('#editUser').modal('hide');
                        table.draw(false);
                    }, 5000);
                    // reset error
                    $("#email_error_edit").text('');
                    $("#username_error_edit").text('');
                    $("#password_error_edit").text('');
                    $("#repassword_error_edit").text('');
                    $("#name_error_edit").text('');
                    $("#phone_error_edit").text('');
                },
                error: function(xhr) {
                    // reset error
                    $("#email_error_edit").text('');
                    $("#username_error_edit").text('');
                    $("#password_error_edit").text('');
                    $("#repassword_error_edit").text('');
                    $("#name_error_edit").text('');
                    $("#phone_error_edit").text('');
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
                        // Xử lí lỗi ngay bên title của item
                        $("#email_error_edit").text(xhr.responseJSON.errors.email_edit);
                        $("#username_error_edit").text(xhr.responseJSON.errors
                            .username_edit);
                        $("#password_error_edit").text(xhr.responseJSON.errors
                            .password_edit);
                        $("#repassword_error_edit").text(xhr.responseJSON.errors
                            .repassword_edit);
                        $("#name_error_edit").text(xhr.responseJSON.errors.name_edit);
                        $("#phone_error_edit").text(xhr.responseJSON.errors.phone_edit);
                        console.log(xhr);
                    }
                }
            });
        });
        // ===========================================DVVC======================================================
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
            var id = $("#id").val();
            // Resset Error
            $("#errorname").text('');
            $("#erroralias").text('');
            $("#errorphone").text('');
            $("#errortaxcode").text('');
            $.ajax({
                type: "POST",
                url: "{{ route('dvvc-update', '') }}" + '/' + id,
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
                    // $("#name").val("");
                    // $("#alias").val("");
                    // $("#phone").val("");
                    // $("#taxcode").val("");
                    // $("#stopdate").val("");
                    // $("#bankaccount").val("");
                    // $("#accountnumber").val("");
                    // $("#branch").val("");
                    // $("#address").val("");
                    // $("#contact").val("");
                    // $("#note").val("");
                },
                error: function(xhr) {
                    if (xhr.status === 409) {
                        Swal.fire({
                            icon: 'error',
                            title: xhr.responseJSON.mess
                        });
                    }
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = [];

                        // Trích xuất thông báo lỗi từ JSON
                        for (var field in errors) {
                            errorMessages.push(errors[field][0]);
                        }

                        // Hiển thị thông báo lỗi
                        //alert(errorMessages.join('<br/>'));
                        Swal.fire({
                            icon: 'error',
                            title: '<span style="color:red">Lỗi nhập dữ liệu</span>',
                            html: '<span style="color:red">' + errorMessages.join(
                                    '. ') +
                                '</span>',
                        });
                        $("#errorname").text(xhr.responseJSON.errors.name);
                        $("#erroralias").text(xhr.responseJSON.errors.alias);
                        $("#errorphone").text(xhr.responseJSON.errors.phone);
                        $("#errortaxcode").text(xhr.responseJSON.errors.taxcode);
                        console.log(xhr.responseJSON && xhr.responseJSON.errors);

                    }
                }

            });
        })
    });
</script>
