@extends('layout.master')
@section('content')
    <div class="container" style="margin-left:280px">
        <h1 class="text-center" style="color: #3C8DBC">DANH MỤC ĐƠN VỊ VẬN CHUYỂN</h1>
        <form action="{{ route('dvvc-index.data') }}" id="searchForm" method="get">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <select name="dateCategory" id="dateCategory">
                                <option value="ngaytao">Ngày tạo</option>
                                <option value="ngaysua">Ngày sửa</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Từ ngày</label>
                            <input type="date" name="startDate" id="startDate">
                        </div>
                        <div class="col-md-4">
                            <label>Đến ngày</label>
                            <input type="date" name="endDate" id="endDate">
                        </div>
                    </div>
                    <div class="mt-3 catagory_search" id="catagory_search">
                        {{-- Dữ liệu lấy từ DOM JS --}}
                        {{-- <div class="row searchForCategory mt-3" id="searchForCategory" data-stt="1">
                            <div class="col-md-5">
                                <label>Danh mục tìm 1:</label>
                                <select name="categorySearch" id="categorySearch">
                                    <option value="">--Cột cần tìm--</option>
                                    <option value="name">TÊN DVVC</option>
                                    <option value="alias">TÊN VIẾT TẮT</option>
                                    <option value="address">ĐỊA CHỈ</option>
                                    <option value="note">GHI CHÚ</option>
                                    <option value="username">TÀI KHOẢN ĐĂNG NHẬP</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <span style='font-weight:bold'>Nội dung tìm:</span>
                                <input type="text" placeholder="--Nội dung tìm kiếm--" name="txtSearch1" value=""
                                    id="txtSearch1">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger btn-close" id="btn-close" data-stt="${stt}">X</button>
                            </div>
                        </div> --}}
                        {{-- End --}}
                    </div>
                </div>

                <div class="col-md-3">
                    <button type="button" class="btn btn-success" id="btnShow">+</button>
                    <button type="submit" class="btn btn-success" name="btnSearch" id="btnSearch">Tìm kiếm</button>
                    <a href="{{ route('dvvc-index') }}" class="btn btn-success" id="btnAll">Tất cả</a>
                </div>

            </div>
        </form>
        <br>
        <a class="btn btn-success mb-2 mt-2" href="{{ route('dvvc-create') }}" role="button" id="btn-add">+ Thêm mới</a>
        <table class="table" id="myTable" style="width: 1400px;">
            <thead style="background-color: #3C8DBC;color:#fff">
                <tr>
                    <th>STT</th>
                    <th>TÊN ĐẦY ĐỦ/ TÊN TK NGÂN HÀNG</th>
                    <th>TÊN VIẾT TẮT/SỐ TK NH/ TK ĐĂNG NHẬP</th>
                    <th>SỐ ĐIỆN THOẠI/MỞ TÀI KHOẢN TẠI NGÂN HÀNG/NGƯỜI DÙNG TÀI KHOẢN ĐN</th>
                    <th>MÃ SỐ THUẾ/SỐ ĐT NGƯỜI DÙNG TKĐN</th>
                    <th>QUYỀN TK ĐN</th>
                    <th>ĐỊA CHỈ/THÔNG TIN/LIÊN HỆ/GHI CHÚ</th>
                    <th>TRẠNG THÁI ĐHVC/ID NƠI TẠO/NGƯỜI TẠO-SỬA/NGÀY TẠO-SỬA</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            {{-- View này cho html nhưng không sài vì đã sài ajax --}}
            {{-- <tbody>
            @foreach ($list as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->alias }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->taxcode }}</td>
                <td></td>
                <td>{{ $item->address }}</td>
                <td>
                    {{ $item->status == 1 ? 'Còn hợp tác' : 'Ngưng hợp tác' }}
                    <br> <br>
                    {{ $item->user->username }}
                </td>
                <td>
                    <a href="{{ route('dvvc-edit', $item->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody> --}}
        </table>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function() {
       

        // Xử lí ẩn hiện tìm kiếm theo danh mục

        var stt = 0;
        $("#btnShow").click(function() {
            var itemCount = $("#catagory_search .searchForCategory").length;

            if (itemCount < 3) {
                var stt = itemCount + 1;
                $(".catagory_search").append(
                    `<div class="row searchForCategory mt-3" id="searchForCategory${stt}"  data-stt="${stt}">
                            <div class="col-md-5">
                                <label>Danh mục tìm ${stt}:</label>
                                <select name="categorySearch" id="categorySearch${stt}">
                                    <option value="">--Cột cần tìm--</option>
                                    <option value="dvvc.name">TÊN DVVC</option>
                                    <option value="alias">TÊN VIẾT TẮT</option>
                                    <option value="address">ĐỊA CHỈ</option>
                                    <option value="note">GHI CHÚ</option>
                                    <option value="username">TÀI KHOẢN ĐĂNG NHẬP</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <span style='font-weight:bold'>Nội dung tìm:</span>
                                <input type="text" placeholder="--Nội dung tìm kiếm--" name="txtSearch${stt}" id="txtSearch${stt}">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-danger btn-close" id="btn-close" data-stt="${stt}">X</button>
                            </div>
                        </div>`
                );
            }
        });


        // Xử lí xóa
        $(".catagory_search").on("click", ".btn-close", function() {
            var removedStt = parseInt($(this).data('stt'));
            $(this).closest(".searchForCategory").remove();

            // Cập nhật lại giá trị stt cho các phần tử còn lại
            $(".searchForCategory").each(function() {
                var currentStt = parseInt($(this).data('stt'));
                if (currentStt > removedStt) {
                    currentStt--;
                    $(this).data('stt', currentStt);
                    $(this).attr('id', `searchForCategory${currentStt}`);
                    $(this).find('select').attr('id', `categorySearch${currentStt}`);
                    $(this).find('label').text(`Danh mục tìm ${currentStt}:`);
                    $(this).find('.btn-close').data('stt', currentStt);
                    $(this).find('[name^="txtSearch"]').attr('name', `txtSearch${currentStt}`);
                    $(this).find('[id^="txtSearch"]').attr('id', `txtSearch${currentStt}`);
                }
            });

            stt--;
        });

        // Datatable ajax
        var table = $('#myTable').DataTable({
            searching: false,
            processing: true,
            serverSide: true,
            paging: true, // bật phân trang
            pageLength: 20, // Số bản ghi mặc định được hiển thị trên trang
            lengthMenu: [20, 40, 60, 80, 100], // Định nghĩa danh sách lựa chọn
            stateSave: true,

            ajax: {
                url: '{{ route('dvvc-index.data') }}',
                data: function(d) {
                    d.dateCategory = $("#dateCategory").val();
                    d.startDate = $("#startDate").val();
                    d.endDate = $("#endDate").val();
                    d.categorySearch1 = $("#categorySearch1").val();
                    d.categorySearch2 = $("#categorySearch2").val();
                    d.categorySearch3 = $("#categorySearch3").val();
                    d.txtSearch1 = $("#txtSearch1").val();
                    d.txtSearch2 = $("#txtSearch2").val();
                    d.txtSearch3 = $("#txtSearch3").val();
                    // console.log(d);
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
                    data: 'name',
                    name: 'name',
                    render: function(data, type, row) {
                        return data + '<br>' + '<strong>' + (row.bankaccount == null || row
                            .bankaccount ==
                            '' ? 'X' : row.bankaccount) + '</strong>';
                    }
                },
                {
                    data: 'alias',
                    name: 'alias',
                    render: function(data, type, row) {
                        return data + '<br>' + '<strong>' + (row.accountnumber == null || row
                            .accountnumber == '' ? 'X' : row.accountnumber) + '</strong>';
                    }
                },
                {
                    data: 'phone',
                    name: 'phone',
                    render: function(data, type, row) {
                        return (data == null ? 'x' : data) + '<br>' + '<strong>' + (row
                            .branch == null ? 'X' : row.branch) + '</strong>';
                    },
                },
                {
                    data: 'taxcode',
                    name: 'taxcode',
                    render: function(data, type, row) {
                        return (data == null || data == '' ? 'x' : data);
                    }
                },
                {
                    data: 'level',
                    name: 'level'
                },
                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'status_text',
                    name: 'status_text',
                    render: function(data, type, row) {
                        return data + '<br>' + '<strong>' + row.username + '</strong>' +
                            '<br>' + row.created_at;
                    },
                },
                {
                    data: 'action',
                    name: 'action'
                },

            ],

        });
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Ngăn chặn gửi biểu mẫu bằng cách mặc định
            var tableState = table.state.save(); // Lưu trạng thái của DataTables
            // Check ngày
            if ($("#startDate").val() && $("#endDate").val()) {
                if ($("#startDate").val() > $("#endDate").val()) {
                    alert('Từ ngày phải nhỏ hơn hoặc bằng đến ngày');
                    return;
                }
            }
            // Lưu trạng thái của các trường nhập liệu sau khi thực hiện tìm kiếm

            var currentState = {
                tableState: tableState,

                txtSearch1: $("#txtSearch1").val(),
                txtSearch2: $("#txtSearch2").val(),
                txtSearch3: $("#txtSearch3").val(),
                categorySearch1: $("#categorySearch1").val(),
                categorySearch2: $("#categorySearch2").val(),
                categorySearch3: $("#categorySearch3").val(),
                dateCategory: $("#dateCategory").val(),
                startDate: $("#startDate").val(),
                endDate: $("#endDate").val(),
                code: $("#catagory_search").html()

            };
            $("#btn-add").click(function() {
                // Lưu trạng thái tìm kiếm
                localStorage.setItem('previousState', JSON.stringify(currentState));
            });
            $("#myTable").on('click', '.btnEditDVVC', function() {
                // Lưu trạng thái tìm kiếm
                localStorage.setItem('previousState', JSON.stringify(currentState));
            });
            table.draw();
        });
        // Check thêm mới

        // Lưu trạng thái phân trang vào localStorage
        localStorage.setItem('currentPage', table.page.info().page);
        var currentPage = localStorage.getItem('currentPage')


        // Lấy kết quả lịch sử tìm kiếm lưu lại
        var previousState = JSON.parse(localStorage.getItem('previousState'));

        if (previousState) {
            //console.log(previousState);
            // Cập nhật DataTables để hiển thị trang hiện tại
            $("#dateCategory").val(previousState.dateCategory);
            $("#startDate").val(previousState.startDate);
            $("#endDate").val(previousState.endDate);
            $("#catagory_search").append(previousState.code);
            $("#txtSearch1").val(previousState.txtSearch1);
            $("#txtSearch2").val(previousState.txtSearch2);
            $("#txtSearch3").val(previousState.txtSearch3);
            $("#categorySearch1").val(previousState.categorySearch1);
            $("#categorySearch2").val(previousState.categorySearch2);
            $("#categorySearch3").val(previousState.categorySearch3);
            // Sử dụng state.start để khôi phục trạng thái phân trang

            table.draw(false);
            console.log(currentPage);
        }
        $("#myTable").on('click', '.btnDestroy', function(e) {
            e.preventDefault();
            var link = $(this);
            var id = link.data('id'); // Lấy dữ liệu ID từ thuộc tính data
            if (confirm('Bạn chắc xóa chứ?')) {
                $.ajax({
                    type: "GET",
                    url: "{{ route('dvvc.destroy', '') }}" + '/' + id,
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
        // Remove tất cả các localStorage
        $('#btnAll').click(function() {
            localStorage.removeItem("previousState");
        });

    });
</script>
