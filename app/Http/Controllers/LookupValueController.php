<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLookupValueRequest;
use App\LookupList;
use App\LookupValue;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class LookupValueController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Application|Factory|View
	 */
	public function index()
	{
		return view("lookup-value.index");
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @param LookupList $lookuplist
	 * @return string
	 */
	public function create(LookupList $lookuplist): string
	{
		$lookupvalue = new LookupValue();
		$lookupvalue->fk_lookup_list = $lookuplist->id;
		return view('lookup-value._form', compact('lookupvalue'))->render();
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreLookupValueRequest $request
	 * @return RedirectResponse
	 */
	public function store(StoreLookupValueRequest $request): RedirectResponse
	{
		try{
			DB::beginTransaction();
			$lookupvalue = new LookupValue();
			$fillable = $request->only($lookupvalue->getFillable());
			$lookupvalue->fill($fillable);
			$lookupvalue->save();
			DB::commit();
			return redirect()->back();
		}catch (Exception $exception){
			DB::rollBack();
			return redirect()->back()->with('error', $exception->getMessage());
		}
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param Request $request
	 * @param LookupValue $lookupvalue
	 * @return string
	 */
	public function show(Request $request, LookupValue $lookupvalue): string
	{
		if($request->ajax()){
			$read =  true;
			return view('lookup-value._form', compact(['lookupvalue', 'read']))->render();
		}
		return view("lookup-value.view",compact(['lookupvalue']));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Request $request
	 * @param LookupValue $lookupvalue
	 * @return string
	 */
	public function edit(Request $request, LookupValue $lookupvalue): string
	{
		if($request->ajax()){
			$read =  true;
			return view('lookup-value._form', compact(['lookupvalue', 'read']))->render();
		}
		return view("lookup-value.update",compact(['lookupvalue']));
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param StoreLookupValueRequest $request
	 * @param LookupValue $lookupvalue
	 * @return RedirectResponse
	 */
	public function update(StoreLookupValueRequest $request, LookupValue $lookupvalue): RedirectResponse
	{
		try{
			DB::beginTransaction();
			$fillable = $request->only($lookupvalue->getFillable());
			$lookupvalue->fill($fillable);
			$lookupvalue->save();
			DB::commit();
			return redirect()->back();
			
		}catch (Exception $exception){
			DB::rollBack();
			return redirect()->back()->with('error', $exception->getMessage());
		}
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param LookupValue $lookupvalue
	 * @return RedirectResponse
	 */
	public function destroy(LookupValue $lookupvalue): RedirectResponse
	{
		$lookupvalue->delete();
		return redirect()->back();
	}
	
	/**
	 * Return the specified resource json data.
	 *
	 * @param LookupValue $lookupvalue
	 * @return JsonResponse
	 */
	public function view(LookupValue $lookupvalue): JsonResponse
	{
		return response()->json([
			'data' => $lookupvalue
		]);
	}
	
	/**
	 * Return paginated data of the resource.
	 *
	 * @param LookupList $lookuplist
	 * @return LookupValue|LengthAwarePaginator
	 */
	public function list(LookupList $lookuplist)
	{
		if($lookuplist->id){
			return $lookuplist->fkLookupValue;
		}
		return LookupValue::latest()->with('fkLookupList')->paginate(25);
	}
	
//	/**
//	 * Return paginated data of the resource.
//	 *
//	 * @param Request $request
//	 */
	public function listOptions(Request $request)
	{
		$childOptions = [];
		$childLookUpValues = LookupValue::where('fk_parent_value',$request->fk_parent_value)
			->whereNotNull('fk_parent_value')->where('status', LookupValue::ACTIVE)->get();
		if($childLookUpValues){
			$childOptions = mapObjectToArray($childLookUpValues, 'option_key', 'option_value', 'id');
		}
		return $childOptions;
	}
	
}
