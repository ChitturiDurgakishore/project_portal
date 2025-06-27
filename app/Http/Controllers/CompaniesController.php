<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Company_skill;
use App\Models\Employee;
use App\Models\JobCategories;
use App\Models\JobPosts;
use App\Models\JobsApplied;
use App\Models\Locations;
use Illuminate\Support\Facades\Storage;
use App\Models\EmployeeSkills;
use App\Models\Skills;
use Illuminate\Queue\Events\JobAttempted;

class CompaniesController extends Controller
{
    function Register(Request $req)
    {
        if ($req->password === $req->password_confirmation) {
            $status = Companies::create([
                'email' => $req->email,
                'password' => $req->password,
                'phone' => $req->phone,
            ]);
            return redirect('/CompanyLogin');
        }
    }

    function Login(Request $req)
    {
        $email = Companies::where('email', $req->email)->where('password', $req->password)->first();
        if ($email) {
            $req->session()->put('email', $req->email);
            $req->session()->put('company_id', $email->company_id);
            $req->session()->put('company_name', $email->company_name);
            return redirect('/CompanyDashBoard');
        }
    }
    function logout()
    {
        $status = session()->flush();
        return redirect('/CompanyLogin');
    }
    function dashboard()
    {
        $email = session('email');
        $details = Companies::where('email', $email)->first();
        $company_id = session('company_id');
        $jobs = JobPosts::where('company_id', $company_id)->get();
        return view('companies.dashboard', ['details' => $details, 'jobs' => $jobs]);
    }
    function CompanyProfile()
    {
        $email = session('email');
        $details = Companies::where('email', $email)->first();
        $categories = JobCategories::all();
        $industrytype = JobCategories::all();
        $locations = Locations::all(); //It includes city state country
        return view('companies.profile', ['details' => $details, 'categories' => $categories, 'industrytype' => $industrytype, 'locations' => $locations]);
    }

    public function updateProfile(Request $request)
    {
        $email = session('email');
        $company = Companies::where('email', $email)->first();

        if (!$company) {
            return redirect()->back()->with('error', 'Company not found.');
        }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($company->logo && Storage::exists($company->logo)) {
                Storage::delete($company->logo);
            }
            $company->logo = $request->file('logo')->store('company_logos', 'public');
        }

        // Handle banner upload
        if ($request->hasFile('banner')) {
            if ($company->banner && Storage::exists($company->banner)) {
                Storage::delete($company->banner);
            }
            $company->banner = $request->file('banner')->store('company_banners', 'public');
        }

        // Update all other fields directly from request (make sure form names match)
        $company->company_name = $request->company_name;
        $company->industry_type = $request->industry_type;
        $company->org_type = $request->org_type;
        $company->team_size = $request->team_size;
        $company->established_date = $request->established_date;
        $company->bio = $request->bio;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->website = $request->website;
        $company->country = $request->country;
        $company->state = $request->state;
        $company->city = $request->city;
        $company->address = $request->address;
        $company->map_link = $request->map_link;

        $company->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    function CompanyJobs()
    {
        $company_id = session('company_id');
        $jobs = JobPosts::where('company_id', $company_id)->get();
        return view('companies.jobs', ['jobs' => $jobs]);
    }

    function AppliedProfiles($id)
    {
        $job_id = $id;
        $applicants = JobsApplied::where('job_id', $job_id)->where('status', 'pending')->pluck('user_id');
        $userdetails = Employee::whereIn('user_id', $applicants)->get();
        return view('companies.appliedprofiles', ['candidates' => $userdetails, 'job_id' => $job_id]);
    }
    function CandidateDetails($id, $job_id)
    {
        $user_id = $id;
        $job_id = $job_id;
        $details = Employee::where('user_id', $user_id)->first();
        $skills = EmployeeSkills::where('employee_id', $user_id)->get();
        return view('companies.candidatedetails', ['details' => $details, 'skills' => $skills, 'job_id' => $job_id]);
    }
    function ShortlistedCandidate($id, $job_id)
    {
        $job_id = $job_id;
        $user_id = $id;
        $status = JobsApplied::where('user_id', $user_id)->where('job_id', $job_id)->orderByDesc('id')->first();
        if ($status) {
            $status->status = "shortlisted";
            if ($status->save()) {
                return redirect('/company/jobs');
            }
        }
    }

    function ShortlistedCondidatesInfo($id)
    {
        $job_id = $id;
        $applicants = JobsApplied::where('job_id', $job_id)->where('status', 'shortlisted')->orderByDesc('id')->pluck('user_id');
        $userdetails = Employee::whereIn('user_id', $applicants)->get();
        return view('companies.shortlisted', ['candidates' => $userdetails, 'job_id' => $job_id]);
    }

    function JobDeleted($id)
    {
        $status = JobPosts::where('job_id', $id)->delete();
        if ($status) {
            return redirect('/company/jobs');
        }
    }

    function NewJobCreating()
    {
        $city = Locations::distinct()->pluck('city');
        $state = Locations::distinct()->pluck('state');
        $country = Locations::distinct()->pluck('country');
        $categories = JobCategories::distinct()->pluck('category');
        $skills = Skills::all();
        return view('companies.newJobCreate', ['city' => $city, 'state' => $state, 'country' => $country, 'categories' => $categories, 'skills' => $skills]);
    }

    function JobCreating(Request $request)
    {
        $company_id=$request->company_id;
        $category=$request->category;
        $job = new JobPosts();
        $job->company_id       = $request->company_id;
        $job->company_name = session('company_name');
        $job->title            = $request->title;
        $job->category     = $request->category;
        $job->vacancies        = $request->vacancies;
        $job->deadline         = $request->deadline;
        $job->country          = $request->country;
        $job->state            = $request->state;
        $job->city             = $request->city;
        $job->address          = $request->address;
        $job->min_salary       = $request->min_salary;
        $job->max_salary       = $request->max_salary;
        $job->salary_type      = $request->salary_type;
        $job->experience_req   = $request->experience_req;
        $job->edu_req          = $request->edu_req;
        $job->job_type         = $request->job_type;
        $job->description      = $request->description;
        $job->tags             = $request->tags;
        $job->benefits         = $request->benefits;
        $job->featured         = $request->featured;
        $job->save();
        $job_id = JobPosts::where('company_id',  $company_id)
            ->latest('job_id')
            ->value('job_id');
        // ✅ Store skills (if any)
        $categoryincre=JobCategories::where('category',$category)->increment('count');
        if ($request->has('skills_required')) {
            foreach ($request->skills_required as $skill) {
                Company_skill::create([
                    'job_id'     => $job_id,
                    'skill_name' => $skill,
                ]);
            }
        }

        return redirect('/company/jobs')->with('success', 'Job posted successfully!');
    }

    function CandidateRejected($user_id, $job_id)
    {
        $job_id = $job_id;
        $user_id = $user_id;
        $status = JobsApplied::where('job_id', $job_id)->where('user_id', $user_id)->orderByDesc('id')->first();
        if ($status) {
            $status->status = 'rejected';
            if ($status->save()) {
                return redirect('/company/jobs/{{$job_id}}/applicants');
            }
        }
    }
}
