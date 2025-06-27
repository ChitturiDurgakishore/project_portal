<?php

namespace App\Http\Controllers;

use App\Models\HomeContent;
use App\Http\Controllers\Controller;
use App\Models\Companies;
use App\Models\Company_skill;
use App\Models\Employee;
use App\Models\JobCategories;
use App\Models\Locations;
use Illuminate\Http\Request;
use App\Models\Skills;
use App\Models\JobPosts;
use App\Models\JobsApplied;
use App\Models\JobsBookMarked;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    function HeadersInfo()
    {
        $headerlinks = HomeContent::where('section', 'header')->where('section_type', 'header-links')->where('status', 'show')->get();
        $title = HomeContent::where('section', 'header')->where('section_type', 'header-text')->where('status', 'show')->first();
        $AboutUS = HomeContent::where('section', 'footer')->where('section_type', 'footer-About')->where('status', 'show')->first();
        $SocialLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-social')->where('status', 'show')->get();
        $SupportLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-support')->where('status', 'show')->get();
        $background = HomeContent::where('section', 'background')->where('section_type', 'background-image')->first();
        $backgroundColor = HomeContent::where('section', 'background')->where('section_type', 'background-color')->first();
        $skills = Skills::all();
        $locations = Locations::all();
        $featured_jobs = JobPosts::where('view_status', 'approved')->where('featured', 'yes')->where('featured_status', 'yes')->get();
        $categories = JobCategories::orderBy('count', 'desc')->where('count', '>', 0)->get();
        $companies = Companies::where('verified', 'true')->where('is_premium', 'true')->get();
        // return $skills;
        return view('welcome', [
            'links' => $headerlinks,
            'title' => $title,
            'supportlinks' => $SupportLinks,
            'sociallinks' => $SocialLinks,
            'AboutUs' => $AboutUS,
            'background' => $background,
            'backgroundColor' => $backgroundColor,
            'skills' => $skills,
            'locations' => $locations,
            'featuredjobs' => $featured_jobs,
            'categories' => $categories,
            'companies' => $companies,
        ]);
    }

    function AfterLogin()
    {
        $headerlinks = HomeContent::where('section', 'header')->where('section_type', 'header-links')->where('status', 'show')->get();
        $title = HomeContent::where('section', 'header')->where('section_type', 'header-text')->where('status', 'show')->first();
        $AboutUS = HomeContent::where('section', 'footer')->where('section_type', 'footer-About')->where('status', 'show')->first();
        $SocialLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-social')->where('status', 'show')->get();
        $SupportLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-support')->where('status', 'show')->get();
        $background = HomeContent::where('section', 'background')->where('section_type', 'background-image')->first();
        $backgroundColor = HomeContent::where('section', 'background')->where('section_type', 'background-color')->first();
        $skills = Skills::all();
        $locations = Locations::all();
        $featured_jobs = JobPosts::where('view_status', 'approved')->where('featured', 'yes')->where('featured_status', 'yes')->get();
        $categories = JobCategories::orderBy('count', 'desc')->where('count', '>', 0)->get();
        $companies = Companies::where('verified', 'true')->where('is_premium', 'true')->get();
        return view('users.UserLoggedHome', [
            'links' => $headerlinks,
            'title' => $title,
            'supportlinks' => $SupportLinks,
            'sociallinks' => $SocialLinks,
            'AboutUs' => $AboutUS,
            'background' => $background,
            'backgroundColor' => $backgroundColor,
            'skills' => $skills,
            'locations' => $locations,
            'featuredjobs' => $featured_jobs,
            'categories' => $categories,
            'companies' => $companies,
        ]);
    }

    function SearchedJobs(Request $req)
    {
        $skills = Skills::all();
        $locations = Locations::all();
        $AboutUS = HomeContent::where('section', 'footer')->where('section_type', 'footer-About')->where('status', 'show')->first();
        $SocialLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-social')->where('status', 'show')->get();
        $SupportLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-support')->where('status', 'show')->get();
        $headerlinks = HomeContent::where('section', 'header')->where('section_type', 'header-links')->where('status', 'show')->get();
        $title = HomeContent::where('section', 'header')->where('section_type', 'header-text')->where('status', 'show')->first();
        $backgroundColor = HomeContent::where('section', 'background')->where('section_type', 'background-color')->first();
        $jobIdsWithSkill = Company_skill::where('skill_name', $req->skill)
            ->pluck('job_id')
            ->unique()
            ->toArray();
        $jobs = collect();
        if (!empty($jobIdsWithSkill)) {
            $jobs = JobPosts::whereIn('job_id', $jobIdsWithSkill)->get();
        }
        return view('users.JobSearch', [
            'jobs' => $jobs,
            'backgroundColor' => $backgroundColor,
            'supportlinks' => $SupportLinks,
            'sociallinks' => $SocialLinks,
            'AboutUs' => $AboutUS,
            'skills' => $skills,
            'locations' => $locations,
            'links' => $headerlinks,
            'title' => $title,
        ]);
    }

    function UserSearchedJobDetails($id)
    {
        $AboutUS = HomeContent::where('section', 'footer')->where('section_type', 'footer-About')->where('status', 'show')->first();
        $SocialLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-social')->where('status', 'show')->get();
        $SupportLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-support')->where('status', 'show')->get();
        $headerlinks = HomeContent::where('section', 'header')->where('section_type', 'header-links')->where('status', 'show')->get();
        $title = HomeContent::where('section', 'header')->where('section_type', 'header-text')->where('status', 'show')->first();
        $backgroundColor = HomeContent::where('section', 'background')->where('section_type', 'background-color')->first();
        $details = JobPosts::where('job_id', $id)->first();
        $skills = Company_skill::where('job_id', $id)->get();
        return view('users.UserJobDetails', [
            'details' => $details,
            'backgroundColor' => $backgroundColor,
            'supportlinks' => $SupportLinks,
            'sociallinks' => $SocialLinks,
            'AboutUs' => $AboutUS,
            'links' => $headerlinks,
            'title' => $title,
            'skills' => $skills,
        ]);
    }

    //------------------------------------------
    //LOGIN REGISTRATION
    function Registered(Request $req)
    {
        if ($req->password === $req->password_confirmation) {
            $status = User::create([
                'name' => $req->name,
                'email' => $req->email,
                'phone' => $req->phone,
                'password' => $req->password,
            ]);
            $status->save();
            $newUser = Employee::create([
                    'email' => $req->email,
                    'name' => $req->name,
                ]);
                $newUser->save();
            if ($status && $newUser) {
                return redirect('/UserLogin');
            }
        } else {
            return "Password Doesnt Match";
        }
    }
    function LoggedIn(Request $req)
    {
        $email = User::where('email', $req->email)->where('password', $req->password)->first();
            $details = Employee::where('email', $req->email)->first();

            $req->session()->put('name', $details->name);
            $req->session()->put('user_id', $details->user_id);
            return redirect('/LoggedDashBoard');

    }
    function LoggedOut()
    {
        $status = session()->flush();
        return redirect('/Guest');
    }
    function Bookmarked($id)
    {
        $job_id = $id;
        $user_id = session('user_id');
        $status = JobsBookMarked::create([
            'job_id' => $job_id,
            'user_id' => $user_id,
        ]);
        if ($status->save()) {
            $user_table = Employee::where('user_id', $user_id)->increment('jobs_bookmarked');
            return redirect()->back();
        }
    }

    ///----------------------------------------------------------------------------------------------------------
    //User Dashboard Info
    function EmployeeAboutHisInfo()
    {
        $user_id = session('user_id');
        $details = Employee::where('user_id', $user_id)->first();
        $jobsapplied = JobsApplied::where('user_id', $user_id)->pluck('job_id');
        $status = JobsApplied::where('user_id', $user_id)->get();
        $jobdetails = JObPosts::whereIn('job_id', $jobsapplied)->get();
        return view('users.dashboard', [
            'details' => $details,
            'jobsapplied' => $jobsapplied,
            'jobdetails' => $jobdetails,
            'status' => $status,
        ]);
    }

    function BookmarkedInfo()
    {
        $user_id = session('user_id');
        $details = JobsBookMarked::where('user_id', $user_id)->pluck('job_id');
        $bookmarkedJobPosts = JobPosts::whereIn('job_id', $details)->get();
        return view('users.bookmarked', ['bookmarked' => $bookmarkedJobPosts]);
    }
    function RemovedBookmark($id)
    {
        $job_id = $id;
        $user_id = session('user_id');
        $status = JobsBookMarked::where('job_id', $job_id)
            ->where('user_id', $user_id)
            ->delete();
        $user = Employee::where('user_id', $user_id)->decrement('jobs_bookmarked');
        return redirect('/User/Bookmark');
    }
    function JobApplied($id)
    {
        $job_id = $id;
        $user_id = session('user_id');
        $status = JobsApplied::create([
            'job_id' => $job_id,
            'user_id' => $user_id,
        ]);
        if ($status->save()) {
            $user = Employee::where('user_id', $user_id)->increment('jobs_applied');
            return redirect('/User/AppliedJobs');
        }
    }
    function AppliedJobsInfo()
    {
        $user_id = session('user_id');
        $appliedjobs = JobsApplied::where('user_id', $user_id)->pluck('job_id')->toArray(); // ✅ corrected
        $JobsDetails = JobPosts::whereIn('job_id', $appliedjobs)->get();
        return view('users.userappliedjobs', ['details' => $JobsDetails]);
    }

    function MyProfileUser()
    {
        $user_id = session('user_id');
        $user = Employee::where('user_id', $user_id)->first();
        return view('users.userProfile', ['user' => $user]);
    }

    function ProfileUpdated(Request $request)
    {
        $user = Employee::where('user_id', $request->input('user_id'))->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Optional: Validate resume file type & size
        $request->validate([
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'profile_pic' => 'nullable|image|max:2048'
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            if ($user->profile_pic && Storage::disk('public')->exists($user->profile_pic)) {
                Storage::disk('public')->delete($user->profile_pic);
            }

            $imagePath = $request->file('profile_pic')->store('profile_pics', 'public');
            $user->profile_pic = $imagePath;
        }

        // ✅ Handle resume upload
        if ($request->hasFile('resume')) {
            if ($user->resume && Storage::disk('public')->exists($user->resume)) {
                Storage::disk('public')->delete($user->resume);
            }

            $resumePath = $request->file('resume')->store('resumes', 'public');
            $user->resume = $resumePath;
        }

        // Assign other fields
        $user->name         = $request->input('name');
        $user->title        = $request->input('title');
        $user->dob          = $request->input('dob');
        $user->gender       = $request->input('gender');
        $user->location     = $request->input('location');
        $user->contact      = $request->input('contact');
        $user->website      = $request->input('website');
        $user->experience   = $request->input('experience');
        $user->availability = $request->input('availability');
        $user->bio          = $request->input('bio');

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
