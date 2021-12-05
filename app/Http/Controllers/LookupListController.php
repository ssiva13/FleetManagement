<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLookupListRequest;
use App\LookupList;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class LookupListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
	    return view("lookup-list.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
	    $lookupList = new LookupList();
	    return view("lookup-list.create",[
		    'lookuplist' => $lookupList
	    ]);
    }
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreLookupListRequest $request
	 * @return RedirectResponse
	 */
    public function store(StoreLookupListRequest $request): RedirectResponse
    {
	    try{
		    DB::beginTransaction();
		    $lookupList = new LookupList();
		    $fillable = $request->only($lookupList->getFillable());
		    $lookupList->fill($fillable);
		    $lookupList->save();
		    DB::commit();
		    return redirect()->route ('lookup-lists.index');
		
	    }catch ( Exception $exception){
		    DB::rollBack();
		    return redirect()->route('lookup-listss.index')->with('error', $exception->getMessage());
	    }
    }
	
	/**
	 * Display the specified resource.
	 *
	 * @param Request $request
	 * @param LookupList $lookuplist
	 * @return string
	 */
    public function show(Request $request, LookupList $lookuplist): string
    {
	    if($request->ajax()){
		    $read =  true;
		    return view('lookup-list._form', compact(['lookuplist', 'read']))->render();
	    }
	    return view("lookup-list.view",compact(['lookuplist']));
    }
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Request $request
	 * @param LookupList $lookuplist
	 * @return string
	 */
    public function edit(Request $request, LookupList $lookuplist): string
    {
	    if($request->ajax()){
		    $read =  false;
		    return view('lookup-list._form', compact(['lookuplist', 'read']))->render();
	    }
	    return view("lookup-list.update",compact(['lookuplist']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreLookupListRequest $request
     * @param LookupList $lookuplist
     * @return RedirectResponse
     */
    public function update(StoreLookupListRequest $request, LookupList $lookuplist): RedirectResponse
    {
	    try{
		    DB::beginTransaction();
		    $fillable = $request->only($lookuplist->getFillable());
		    $lookuplist->fill($fillable);
		    $lookuplist->save();
		    DB::commit();
		    return redirect()->route('lookup-lists.index')->with('success', 'Record Saved Successfully');
		
	    }catch (Exception $exception){
		    DB::rollBack();
		    return redirect()->route('lookup-lists.index')->with('error', $exception->getMessage());
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LookupList $lookupList
     * @return RedirectResponse
     */
    public function destroy(LookupList $lookupList): RedirectResponse
    {
	    $lookupList->delete();
	    return redirect()->route('lookup-lists.index');
    }
	
	/**
	 * Return the specified resource json data.
	 *
	 * @param LookupList $lookupList
	 * @return JsonResponse
	 */
	public function view(LookupList $lookupList): JsonResponse
	{
		return response()->json([
			'data' => $lookupList
		]);
	}
	/**
	 * Return paginated data of the resource.
	 *
	 * @return LengthAwarePaginator
	 */
	public function list(): LengthAwarePaginator
	{
		return LookupList::latest()->with('fkLookupValue')->paginate(25);
	}
}
