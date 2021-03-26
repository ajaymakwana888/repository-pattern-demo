<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessValidRequest;
use App\Models\Business;
use App\repositories\BusinessRepositoryInterface;
use Illuminate\Http\Request;

class BusinessController extends Controller
{

    /**
     * @var BusinessRepositoryInterface
     */
    protected $businessRepo;

    /**
     * Display a listing of the resource.
     *
     * @param BusinessRepositoryInterface $businessRepository
     */
    public function __construct(BusinessRepositoryInterface $businessRepository)
    {
        $this->businessRepo = $businessRepository;
    }
    public function index()
    {
        $businesses = $this->businessRepo->all();

        return view('businesses.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('businesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BusinessValidRequest $request)
    {
        $business = $this->businessRepo->store($request->all());

        return redirect()->route('businesses.index')
            ->with('success', 'Business Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Business $business
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        $business = $this->businessRepo->read($business->id);

        return view('businesses.show', ['business' => $business]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Business $business
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        $business = $this->businessRepo->read($business->id);

        return view('businesses.edit', ['business' => $business]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Business $business
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Business $business, Request $request)
    {
       $business = $this->businessRepo->update($business->id, $request->all());

        return redirect()->route('businesses.index')
            ->with('success', 'Business Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Business $business
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Business $business)
    {
        $business = $this->businessRepo->delete($business->id);

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
