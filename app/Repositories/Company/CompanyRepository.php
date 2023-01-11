<?php

namespace App\Repositories\Company;

use App\Repositories\Core\Repository;
use App\Models\Company;
use App\Constant\Constant;
use Illuminate\Support\Facades\Log;
use Exception;


class CompanyRepository extends Repository
{
    /**
     * @var string
     * Return the model
     */
    public function __construct()
    {
        try{
            $this->model = config('model-variable.models.company.class');
        }catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('company.something_want_wrong_try_again'));
        }
    }

    /**
     * get company listing
     * 
     * @return array
     */
    public function getCompanyList()
    {
        try {
            return  $this->model::paginate(Constant::STATUS_THREE);
        } catch (Exception $exception) {

            Log::error($exception);

            return redirect()
                ->back()
                ->withError(__('company.something_want_wrong_try_again'));
        }
    }
}
