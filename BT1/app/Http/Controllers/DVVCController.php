<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\DVVC;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DVVCController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }
    public function post_login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('dvvc-index');
        } else {
            return back()->with(['type' => 'danger', 'mess' => 'Thông tin tài khoản hoặc mật khẩu không đúng']);
        }
    }
    public function create()
    {
        return view('backend.dvvc.add');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:dvvc',
                'alias' => 'required|unique:dvvc',
                'phone' => [
                    'nullable',
                    'regex:/^([0-9\s\-\+\(\)]*)$/',
                    'min:10'
                ],
                'taxcode' => 'nullable|regex:/^[0-9A-Z]{10}$/',
            ],
            [
                'name.required' => 'Vui lòng nhập tên DVVC',
                'name.unique' => 'Tên DVVC không được trùng',
                'alias.required' => 'Vui lòng nhập tên viết tắt DVVC',
                'alias.unique' => 'Tên viết tắt DVVC không được trùng',
                'phone.regex' => 'Vui lòng nhập đúng định dạng điện thoại',
                'phone.min' => 'Dữ liệu nhập này phải dài ít nhất 10 ký tự',
                'taxcode.regex' => 'Vui lòng nhập đúng định dạng mã số thuế'
            ]
        );
        // Thêm mới
        $dvvc = new DVVC();
        $dvvc->user_id = Auth::user()->id;
        $dvvc->name = $request->name;
        $dvvc->alias = $request->alias;
        $dvvc->phone = $request->phone;
        $dvvc->taxcode = $request->taxcode;
        $dvvc->status = $request->status;
        $dvvc->stopdate = $request->stopdate;
        $dvvc->bankaccount = $request->bankaccount;
        $dvvc->accountnumber = $request->accountnumber;
        $dvvc->branch = $request->branch;
        $dvvc->address = $request->address;
        $dvvc->contact = $request->contact;
        $dvvc->note = $request->note;
        $dvvc->updated_at = null;
        $dvvc->save();
        return response()->json(['mess' => 'Thành công']);
    }
    // Lấy danh sách DVVC
    public function index()
    {

        return view('backend.dvvc.list');
    }
    // Lấy danh sách DVVC bằng datatable
    public function anyData(Request $request)
    {
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $dateCategory = $request->dateCategory;
        $categorySearch1 = $request->categorySearch1;
        $categorySearch2 = $request->categorySearch2;
        $categorySearch3 = $request->categorySearch3;
        $txtSearch1 = $request->txtSearch1;
        $txtSearch2 = $request->txtSearch2;
        $txtSearch3 = $request->txtSearch3;
        //echo $dateCategory;
        $query = DB::table('dvvc')->join('users', 'dvvc.user_id', '=', 'users.id')->select('dvvc.*', 'users.username', 'users.level')->orderBy('dvvc.name', 'ASC');
        // Xử lí lọc theo ngày tạo,ngày sửa
        switch ($dateCategory) {
            case 'ngaytao':
                if ($startDate && $endDate) {
                    $query->whereBetween('dvvc.created_at', [$startDate, $endDate]);
                }
                if ($startDate) {
                    $query->where('dvvc.created_at', '>=', $startDate);
                }
                if ($endDate) {
                    $query->where('dvvc.created_at', '<=', $endDate);
                }
                break;
            case 'ngaysua':
                if ($startDate && $endDate) {
                    $query->whereBetween('dvvc.updated_at', [$startDate, $endDate]);
                }
                if ($startDate) {
                    $query->where('dvvc.updated_at', '>=', $startDate);
                }
                if ($endDate) {
                    $query->where('dvvc.updated_at', '<=', $endDate);
                }
                break;
        }

        // Lọc tìm kiếm theo danh mục
        if ($categorySearch1 || $categorySearch2 || $categorySearch3) {
            $query->where(function ($query) use ($categorySearch1, $categorySearch2, $categorySearch3, $txtSearch1, $txtSearch2, $txtSearch3) {
                if ($categorySearch1 && $txtSearch1) {
                    $query->orWhere($categorySearch1, 'like', '%' . $txtSearch1 . '%');
                }
                if ($categorySearch2 && $txtSearch2) {
                    $query->orWhere($categorySearch2, 'like', '%' . $txtSearch2 . '%');
                }
                if ($categorySearch3 && $txtSearch3) {
                    $query->orWhere($categorySearch3, 'like', '%' . $txtSearch3 . '%');
                }
            });
        }
        // if (!$categorySearch1 ) {
        //     $query->orWhere($categorySearch1, 'like', '');
        // }

        // Response về json
        $data = datatables()->of($query)->addColumn('action', function ($row) {
            return '<a href="' . route('dvvc-edit', $row->id) . '" class="btnEditDVVC" id="btnEditDVVC"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="javascript:void(0)" data-id="' . $row->id . '" class="btnDestroy"><i class="fa-solid fa-trash"></i></a>
            ';
        })->addColumn('status_text', function ($row) {
            return $row->status == 1 ? 'Còn hợp tác' : 'Ngưng hợp tác';
        });
        return $data->toJson();
    }
    public function edit(Request $request, $id)
    {
        $dvvc = DVVC::find($id);
        //dd(session('research_result'));
        return view('backend.dvvc.edit', compact(['dvvc']));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|unique:dvvc,name,' . $id,
                'alias' => 'required|unique:dvvc,alias,' . $id,
                'phone' => [
                    'nullable',
                    'regex:/^([0-9\s\-\+\(\)]*)$/',
                    'min:10'
                ],
                'taxcode' => 'nullable|regex:/^[0-9A-Z]{10}$/',
            ],
            [
                'name.required' => 'Vui lòng nhập tên DVVC',
                'name.unique' => 'Tên DVVC bị trùng với tên khác đang có',
                'alias.required' => 'Vui lòng nhập tên viết tắt DVVC',
                'alias.unique' => 'Tên viết tắt bị trùng với tên khác đang có',
                'phone.regex' => 'Vui lòng nhập đúng định dạng điện thoại',
                'phone.min' => 'Dữ liệu nhập này phải dài ít nhất 10 ký tự',
                'taxcode.regex' => 'Vui lòng nhập đúng định dạng mã số thuế'
            ]
        );
        $dvvc = DVVC::find($id);
        // Kiểm tra version check 2 user update
        if ($request->version != $dvvc->version) {
            return response()->json(['mess' => 'Data này đã bị sửa bởi người khác trước đó, xin vui lòng ấn F5 hoặc refesh để lấy lại data mới'], 409);
        }
        $dvvc->user_id = Auth::user()->id;
        $dvvc->name = $request->name;
        $dvvc->alias = $request->alias;
        $dvvc->phone = $request->phone;
        $dvvc->taxcode = $request->taxcode;
        $dvvc->status = $request->status;
        $dvvc->stopdate = $request->stopdate;
        $dvvc->bankaccount = $request->bankaccount;
        $dvvc->accountnumber = $request->accountnumber;
        $dvvc->branch = $request->branch;
        $dvvc->address = $request->address;
        $dvvc->contact = $request->contact;
        $dvvc->note = $request->note;
        $dvvc->version += 1;
        $dvvc->updated_at = Carbon::now()->startOfDay();
        $dvvc->save();
        return response()->json(['mess' => 'Cập nhật thành công']);
    }
    public function destroy(Request $request, $id)
    {
        $dvvc = DVVC::find($id);
        $dvvc->delete();
        return response()->json(['mess' => 'Xóa thành công']);
    }
    // add user
    public function add_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'repassword' => 'required|same:password',
            'name' => 'required',
            'phone' => [
                'nullable',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10'
            ],
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Tên email có người sử dụng',
            'email.email' => 'Tên email phải đúng định dạng',
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'username.unique' => 'Tên đăng nhập có người sử dụng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'repassword.required' => 'Vui lòng nhập lại mật khẩu',
            'repassword.same' => 'Nhập lại mật khẩu chưa khớp',
            'name.required' => 'Vui lòng nhập tên người dùng',
            'phone.regex' => 'Vui lòng nhập đúng định dạng điện thoại',
            'phone.min' => 'Điện thoại phải nhập ít nhất 10 số'
        ]);
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->parent_id = $request->parent_id;
        $user->save();
        return response()->json(['mess' => 'Lưu thành công']);
    }
    // Danh sách user
    public function anyDataUser(Request $request)
    {
        $user = User::where('parent_id', $request->parent_id)->get();
        return datatables()->of($user)->addColumn('action', function ($row) {
            return '<a href="javascript:void(0)" data-id="' . $row->id . '" class="btnEdit" id="btnEdit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="javascript:void(0)" data-id="' . $row->id . '" class="btnDestroy"><i class="fa-solid fa-trash"></i></a>
            ';
        })->addColumn('level_name', function ($row) {
            return $row->level == 1 ? 'Chính' : '';
        })->toJson();
    }
    // Xóa user
    public function destroyUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['mess' => 'Xóa người dùng thành công']);
    }
    // Sửa user
    public function edit_user($id)
    {
        $user = User::find($id);
        return response()->json(
            [
                'status' => 200,
                'user' => $user
            ]
        );
    }
    // Update user
    public function update_user(Request $request)
    {
        $id = $request->id_edit;
        $request->validate([
            'email_edit' => 'required|email|unique:users,email,' . $id,
            'username_edit' => 'required|unique:users,username,' . $id,
            'repassword_edit' => 'same:password_edit',
            'name_edit' => 'required',
            'phone_edit' => [
                'nullable',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10'
            ],
        ], [
            'email_edit.required' => 'Vui lòng nhập email',
            'email_edit.unique' => 'Tên email trùng với người khác',
            'email_edit.email' => 'Email phải đúng định dạng',
            'username_edit.required' => 'Vui lòng nhập tên đăng nhập',
            'username_edit.unique' => 'Tên đăng nhập trùng với tên đăng nhập đang có',
            'repassword_edit.same' => 'Nhập lại mật khẩu chưa khớp',
            'name_edit.required' => 'Vui lòng nhập tên người dùng',
            'phone_edit.regex' => 'Vui lòng nhập đúng định dạng điện thoại',
            'phone_edit.min' => 'Điện thoại phải nhập ít nhất 10 số'
        ]);
        $user = User::find($id);
        $user->username = $request->username_edit;
        $user->name = $request->name_edit;
        $user->email = $request->email_edit;
        $user->phone = $request->phone_edit;
        if ($request->password) {
            $user->password = bcrypt($request->password_edit);
        }
        $user->level = $request->level_edit;
        $user->parent_id = $request->parent_id_edit;
        $user->save();
        return response()->json(['mess' => 'Cập nhật thành công']);
    }
}
