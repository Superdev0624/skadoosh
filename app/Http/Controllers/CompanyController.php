<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use App\Services\Job\JobService;
use App\Services\Company\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    protected $companyService;
    protected $jobService;

    /**
     * Contruct function to initialize 
     *  @return void
     */
    public function __construct(CompanyService $companyService, JobService $jobService){
        
        $this->companyService = $companyService;
        $this->jobService = $jobService;
    }

    public function showAllCompanies()
    {   $companies = [];
        return view('company.listing', [
            'companies' => $this->companyService->findAllPaginate()
        ]);
    }

    public function showCompany(Company $company) {
      $jobs = $company->jobs;
      return view('company.jobs', ['company' => $company, 'jobs' => $jobs]);
    }
}
