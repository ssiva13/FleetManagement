<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\StoreCarRequest;
use App\LookupList;
use App\LookupValue;
use App\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
	    return view("cars.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
		$car = new Car();
	    $owners = mapObjectToArray(User::where('user_type', User::OWNER)->get(), 'id', 'first_name', 'last_name');
	    return view("cars.create",[
			'car' => $car,
			'owners' => $owners,
	    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCarRequest $request
     * @return JsonResponse
     */
    public function store(StoreCarRequest $request): JsonResponse
    {
	    try{
		    DB::beginTransaction();
		    $car = new Car();
		    $fillable = $request->only($car->getFillable());
		    $car->fill($fillable);
		    $car->save();
		    DB::commit();
		
		    Session::flash('success', get_class($car).' Saved Successfully!');
		    return response()->json([
			    'data' => $car,
			    'code' => 200,
		    ]);
	    }catch ( Exception $exception){
		    DB::rollBack();
		    return response()->json([
			    'data' => $exception->getMessage(),
			    'code' => 200,
		    ]);
	    }
    }
	
	/**
	 * Display the specified resource.
	 *
	 * @param Request $request
	 * @param Car $car
	 * @return Application|Factory|View|string
	 */
    public function show(Request $request, Car $car)
    {
	    if($request->ajax()){
		    $read =  true;
		    return view('cars._form', compact(['car', 'read']))->render();
	    }
	    return view("cars.view",compact(['car']));
    }
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Request $request
	 * @param Car $car
	 * @return Application|Factory|string|View
	 */
    public function edit(Request $request, Car $car)
    {
	    $owners = mapObjectToArray(User::where('user_type', User::OWNER)->get(), 'id', 'first_name', 'last_name');
	    if($request->ajax()){
		    return view("cars._form",[
			    'car' => $car,
			    'owners' => $owners,
		    ])->render();
	    }
	    return view("cars.update",[
		    'car' => $car,
		    'owners' => $owners,
	    ]);
    }
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param StoreCarRequest $request
	 * @param Car $car
	 * @return JsonResponse
	 */
    public function update(StoreCarRequest $request, Car $car)
    {
		try{
		    DB::beginTransaction();
		    $fillable = $request->only($car->getFillable());
		    $car->fill($fillable);
		    $car->save();
		    DB::commit();
			return response()->json([
				'data' => $car,
				'code' => 200,
			]);
	    }catch ( Exception $exception){
		    DB::rollBack();
			return response()->json([
				'data' => $exception->getMessage(),
				'code' => 200,
			]);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return RedirectResponse
     */
    public function destroy(Car $car): RedirectResponse
    {
        $car->delete();
		return redirect()->back();
    }
	
	/**
	 * Return the specified resource json data.
	 *
	 * @param Car $car
	 * @return JsonResponse
	 */
	public function view(Car $car): JsonResponse
	{
		return response()->json([
			'data' => $car
		]);
	}
	/**
	 * Return paginated data of the resource.
	 *
	 * @return LengthAwarePaginator
	 */
	public function list(): LengthAwarePaginator
	{
		return Car::latest()->with('fkCarOwner')->paginate(25);
	}
	
}
