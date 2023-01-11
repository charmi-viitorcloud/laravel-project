<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Company;
use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function __construct(
        private CompanyRepository $companyRepository
    ) {
    }
    /**  
     * Display a listing of the company.
     *
     * @return View|redirectResponse
     */
    public function index(): View|RedirectResponse
    {
        try {
            $companies = $this->companyRepository->getCompanyList();
            return view('pages.companylist', compact('companies'));
        } catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('companies.something_want_wrong_try_again'));
        }
    }

    /**
     * Show the form for creating a new company.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('pages.companycreate');
    }

    /**
     * Store a newly created company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request): RedirectResponse
    {
        try {
            // $companies = new Company;
            // if($request->file('file')){
            //     $file=$request->file('file');
            //     $filename=date('YmdHi').$file->getClientOriginalName();
            //     $file->move(public_path('images'),$filename);
            //     $companies->image=$filename;
            // }
            $companies = $this->companyRepository->create($request->all());
            return redirect()
                ->route('companies.index')
                ->withSuccess(__('company.company_created_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('company.something_want_wrong_try_again'));
        }
    }

    /**
     * Display the specified company.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View|RedirectResponse
    {
        try {
            $company = $this->companyRepository->findById($id);

            return view('pages.companyedit', compact('company'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('company.something_want_wrong_try_again'));
        }
    }

    /**
     * Update the specified company in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, int $id): RedirectResponse
    {
        try {
            $this->companyRepository->update($id, $request->all());
            return redirect()
                ->route('companies.index')
                ->withSuccess(__('company.company_updated_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('company.something_want_wrong_try_again'));
        }
    }
    /**
     * Remove the specified company from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): View|RedirectResponse
    {
        try {
            $company = $this->companyRepository->delete($id);

            return redirect()
                ->back()
                ->withSuccess(__('company.company_deleted_successfully'));
        } catch (Exception $exception) {
            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('company.something_want_wrong_try_again'));
        }
    }
}
