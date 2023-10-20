<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.xe.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_car = DB::table('type_car')->get();
        $label_car = DB::table('label_car')->get();
        $number_type_car = DB::table('number_type_car')->get();
        $dvvc = DB::table('dvvc')->get();
        $romooc = DB::table('romooc')->get();
        $driver = DB::table('driver')->get();
        $sub_driver = DB::table('sub_driver')->get();
        $type_list = DB::table('type_list')->get();
        $wheel_structure = DB::table('wheel_structure')->get();
        $fuel = DB::table('fuel')->get();
        return view('backend.xe.create', [
            'type_car' => $type_car,
            'label_car' => $label_car,
            'number_type_car' => $number_type_car,
            'dvvc' => $dvvc,
            'romooc' => $romooc,
            'driver' => $driver,
            'sub_driver' => $sub_driver,
            'type_list' => $type_list,
            'wheel_structure' => $wheel_structure,
            'fuel' => $fuel
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'number_car' => 'required|unique:cars',
                'typecar' => 'required',
                'wheel_structure' => 'required',
                'fuel' => 'required'
            ],
            [
                'number_car.required' => 'Vui lòng nhập số xe',
                'number_car.unique' => 'Số xe không được trùng',
                'typecar.required' => 'Vui lòng chọn loại xe',
                'wheel_structure.required' => 'Vui lòng chọn cấu trúc bánh',
                'fuel.required' => 'Vui lòng chọn loại nhiên liệu'
            ]
        );
        $car = new Car();
        $car->number_car = $request->number_car;
        $car->type_car_id = $request->typecar;
        $car->label_car_id = $request->labelcar;
        $car->number_type_car_id = $request->number_type_car;
        $car->dvvc_id = $request->dvvc;
        $car->romooc_id = $request->romooc;
        $car->driver_id = $request->driver;
        $car->sub_driver_id = $request->subdriver;
        $car->type_list_id = $request->type_list;
        $car->wheel_structure_id = $request->wheel_structure;
        $car->fuel_id = $request->fuel;
        $car->car_pump = $request->car_pump;
        $car->year_of_manufacture = $request->year_of_manufacture;
        $car->fuel_norms = $request->fuel_norms;
        $car->status = $request->status;
        $car->start_date = $request->start_date;
        $car->end_date = $request->end_date;
        $car->spare_tire = $request->spare_tire;
        $car->info_car = $request->info_car;
        $car->note = $request->note;
        $car->inventory = $request->inventory;
        $car->updated_at = null;
        $car->save();
        return response()->json(['mess' => 'Lưu thành công']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $type_car = DB::table('type_car')->get();
        $label_car = DB::table('label_car')->get();
        $number_type_car = DB::table('number_type_car')->get();
        $dvvc = DB::table('dvvc')->get();
        $romooc = DB::table('romooc')->get();
        $driver = DB::table('driver')->get();
        $sub_driver = DB::table('sub_driver')->get();
        $type_list = DB::table('type_list')->get();
        $wheel_structure = DB::table('wheel_structure')->get();
        $fuel = DB::table('fuel')->get();
        return view('backend.xe.edit', [
            'car' => $car,
            'type_car' => $type_car,
            'label_car' => $label_car,
            'number_type_car' => $number_type_car,
            'dvvc' => $dvvc,
            'romooc' => $romooc,
            'driver' => $driver,
            'sub_driver' => $sub_driver,
            'type_list' => $type_list,
            'wheel_structure' => $wheel_structure,
            'fuel' => $fuel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'number_car' => 'required|unique:cars,number_car,' . $id,
                'typecar' => 'required',
                'wheel_structure' => 'required',
                'fuel' => 'required'
            ],
            [
                'number_car.required' => 'Vui lòng nhập số xe',
                'number_car.unique' => 'Số xe bị trùng với mã số xe đang có',
                'typecar.required' => 'Vui lòng chọn loại xe',
                'wheel_structure.required' => 'Vui lòng chọn cấu trúc bánh',
                'fuel.required' => 'Vui lòng chọn loại nhiên liệu'
            ]
        );
        $car = Car::find($id);
        $car->number_car = $request->number_car;
        $car->type_car_id = $request->typecar;
        $car->label_car_id = $request->labelcar;
        $car->number_type_car_id = $request->number_type_car;
        $car->dvvc_id = $request->dvvc;
        $car->romooc_id = $request->romooc;
        $car->driver_id = $request->driver;
        $car->sub_driver_id = $request->subdriver;
        $car->type_list_id = $request->type_list;
        $car->wheel_structure_id = $request->wheel_structure;
        $car->fuel_id = $request->fuel;
        $car->car_pump = $request->car_pump;
        $car->year_of_manufacture = $request->year_of_manufacture;
        $car->fuel_norms = $request->fuel_norms;
        $car->status = $request->status;
        $car->start_date = $request->start_date;
        $car->end_date = $request->end_date;
        $car->spare_tire = $request->spare_tire;
        $car->info_car = $request->info_car;
        $car->note = $request->note;
        $car->inventory = $request->inventory;
        $car->updated_at = Carbon::now()->startOfDay();
        $car->save();
        return response()->json(['mess' => 'Cập nhật thành công xe']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return response()->json(['mess' => 'Xóa thành công xe']);
    }
    // DataTable
    public function anyData(Request $request)
    {
        $dateCategory = $request->dateCategory;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $categorySearch1 = $request->categorySearch1;
        $categorySearch2 = $request->categorySearch2;
        $categorySearch3 = $request->categorySearch3;
        $txtSearch1 = $request->txtSearch1;
        $txtSearch2 = $request->txtSearch2;
        $txtSearch3 = $request->txtSearch3;
        $query = DB::table('cars')
            ->leftJoin('type_car', 'cars.type_car_id', '=', 'type_car.id')
            ->leftJoin('label_car', 'label_car.id', '=', 'cars.label_car_id')
            ->leftJoin('number_type_car', 'cars.number_type_car_id', '=', 'number_type_car.id')
            ->leftJoin('dvvc', 'cars.dvvc_id', '=', 'dvvc.id')
            ->leftJoin('romooc', 'cars.romooc_id', '=', 'romooc.id')
            ->leftJoin('driver', 'cars.driver_id', '=', 'driver.id')
            ->leftJoin('sub_driver', 'cars.sub_driver_id', '=', 'sub_driver.id')
            ->leftJoin('type_list', 'cars.type_list_id', '=', 'type_list.id')
            ->leftJoin('wheel_structure', 'cars.wheel_structure_id', '=', 'wheel_structure.id')
            ->leftJoin('fuel', 'cars.fuel_id', '=', 'fuel.id')
            ->select(
                'cars.id',
                'cars.number_car',
                'type_car.name as type_car_name',
                'label_car.name as label_car_name',
                'number_type_car.name as number_type_car_name',
                'dvvc.name as dvvc_name',
                'romooc.name as romooc_name',
                'driver.name as driver_name',
                'sub_driver.name as sub_driver_name',
                'type_list.name as type_list_name',
                'wheel_structure.name as wheet_structure_name',
                'fuel.name as fuel_name',
                'cars.car_pump',
                'cars.year_of_manufacture',
                'cars.fuel_norms',
                'cars.spare_tire',
                'cars.status'

            );
        switch ($dateCategory) {
            case 'ngaytao':
                if ($startDate && $endDate) {
                    $query->whereBetween('cars.created_at', [$startDate, $endDate]);
                }
                if ($startDate) {
                    $query->where('cars.created_at', '>=', $startDate);
                }
                if ($endDate) {
                    $query->where('cars.created_at', '<=', $endDate);
                }
                break;
            case 'ngaysua':
                if ($startDate && $endDate) {
                    $query->whereBetween('cars.updated_at', [$startDate, $endDate]);
                }
                if ($startDate) {
                    $query->where('cars.updated_at', '>=', $startDate);
                }
                if ($endDate) {
                    $query->where('cars.updated_at', '<=', $endDate);
                }
                break;
        }
        if ($categorySearch1 || $categorySearch2 || $categorySearch3) {
            $query->where(function ($query) use ($categorySearch1, $categorySearch2, $categorySearch3, $txtSearch1, $txtSearch2, $txtSearch3) {
                if ($categorySearch1 == 'number_car' || $categorySearch2 == 'number_car' || $categorySearch3 == 'number_car') {
                    if ($categorySearch1 && $txtSearch1) {
                        $query->orWhere('cars.number_car', 'like', '%' . $txtSearch1 . '%');
                    }
                    if ($categorySearch2 && $txtSearch2) {
                        $query->orWhere('cars.number_car', 'like', '%' . $txtSearch2 . '%');
                    }
                    if ($categorySearch3 && $txtSearch3) {
                        $query->orWhere('cars.number_car', 'like', '%' . $txtSearch3 . '%');
                    }
                }
                if ($categorySearch1 == 'dvvc_id' || $categorySearch2 == 'dvvc_id' || $categorySearch3 == 'dvvc_id') {
                    if ($categorySearch1 && $txtSearch1) {
                        $query->orWhere('dvvc.name', 'like', '%' . $txtSearch1 . '%');
                    }
                    if ($categorySearch2 && $txtSearch2) {
                        $query->orWhere('dvvc.name', 'like', '%' . $txtSearch2 . '%');
                    }
                    if ($categorySearch3 && $txtSearch3) {
                        $query->orWhere('dvvc.name', 'like', '%' . $txtSearch3 . '%');
                    }
                }
            });
        }
        // dd($query);
        // die();
        $data = datatables()->of($query)->addColumn('action', function ($row) {
            return '<a href="' . route('cars.edit', $row->id) . '" class="btnEditCar"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="javascript:void(0)" data-id="' . $row->id . '" class="btnDestroy"><i class="fa-solid fa-trash"></i></a>
            ';
        });
        return $data->toJson();
    }
}
