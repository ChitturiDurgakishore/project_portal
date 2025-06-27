<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeContent;
use App\Models\Admin;
use App\Models\JobCategories;
use App\Models\JobPosts;
use App\Models\Locations;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Skills;
use Illuminate\Auth\Events\Verified;
use App\Models\Companies;
use App\Models\Employee;
use App\Models\Company_skill;
class AdminController extends Controller
{
    function LoginCheck(Request $req)
    {
        $admin = Admin::where('email', $req->email)->where('password', $req->password)->first();
        if ($admin) {
            $req->session()->put('email', $req->email);
            return view('admin.dashboard');
        }
    }

    function LogOut()
    {
        session()->pull('email');
        return redirect('/AdminLogin');
    }
    //-----------------------------------------------------------------------------------------------------
    //Header section function
    //giving data to header
    function HeaderInfo()
    {
        $links = HomeContent::where('section', 'header')->where('section_type', 'header-links')->get();
        $title = HomeContent::where('section', 'header')->where('section_type', 'header-text')->first();
        return view('admin.header.dashboard', ['links' => $links, 'title' => $title]);
    }
    //links edit
    function RedirectLinkEdit($id)
    {
        $linkdetails = HomeContent::where('id', $id)->first();
        return view('admin.header.linkedit', ['linkdetails' => $linkdetails]);
    }
    //links updated
    function UpdatedLink(Request $req)
    {
        $linkdetails = HomeContent::where('id', $req->id)->first();
        $linkdetails->name = $req->name;
        $linkdetails->url = $req->url;
        $linkdetails->status = $req->status;
        if ($linkdetails->save()) {
            return redirect('/admin/header-settings');
        }
    }
    //New link added
    function NewLinkAdded(Request $req)
    {
        $result = HomeContent::create([
            'section' => $req->section,
            'name' => $req->name,
            'url' => $req->url,
            'section_type' => $req->section_type
        ]);
        if ($result) {
            return redirect('/admin/header-settings');
        }
    }

    //Delete link
    function DeletedLink($id)
    {
        $result = HomeContent::destroy('id', $id);
        if ($result) {
            return redirect('/admin/header-settings');
        }
    }
    //title edit
    function RedirectTitleEdit($id)
    {
        $titledetails = HomeContent::where('id', $id)->first();
        return view('admin.header.titleedit', ['title' => $titledetails]);
    }
    //title updated
    function UpdatedTitle(Request $req)
    {
        $title = HomeContent::where('id', $req->id)->first();
        $title->name = $req->name;
        $title->status = $req->status;
        if ($title->save()) {
            return redirect('/admin/header-settings');
        }
    }
    //-----------------------------------------------------------------------------------------------------------
    //FooterSection function
    //FooterInfo
    function FooterInfo()
    {
        $AboutUS = HomeContent::where('section', 'footer')->where('section_type', 'footer-About')->first();
        $SocialLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-social')->get();
        $SupportLinks = HomeContent::where('section', 'footer')->where('section_type', 'footer-support')->get();
        return view('admin.footer.dashboard', ['supportlinks' => $SupportLinks, 'sociallinks' => $SocialLinks, 'AboutUs' => $AboutUS]);
    }
    function RedirectAbout($id)
    {
        $AboutUs = HomeContent::where('id', $id)->first();
        return view('admin.footer.aboutedit', ['aboutUsDetails' => $AboutUs]);
    }
    function AboutUpdated(Request $req)
    {
        $AboutUs = HomeContent::where('id', $req->id)->first();
        $AboutUs->name = $req->name;
        $AboutUs->status = $req->status;
        if ($AboutUs->save()) {
            return redirect('/admin/footer-settings');
        }
    }
    function RedirectSocialLinkEdit($id)
    {
        $details = HomeContent::where('id', $id)->first();
        return view('admin.footer.sociallinkedit', ['details' => $details]);
    }
    function UpdatedSocialLink(Request $req)
    {
        $details = HomeContent::where('id', $req->id)->first();
        $details->name = $req->name;
        $details->url = $req->url;
        $details->status = $req->status;
        if ($details->save()) {
            return redirect('/admin/footer-settings');
        }
    }
    function DeletedSocialLink($id)
    {
        $result = HomeContent::destroy('id', $id);
        if ($result) {
            return redirect('/admin/footer-settings');
        }
    }
    function SocialLinkCreated(Request $req)
    {
        $sectiontype = "footer-social";
        $section = "footer";
        $SocialLink = HomeContent::create([
            'section' => $section,
            'section_type' => $sectiontype,
            'name' => $req->name,
            'url' => $req->url,
            'status' => $req->status,
        ]);
        if ($SocialLink) {
            return redirect('/admin/footer-settings');
        }
    }
    function RedirectSupportLinkEdit($id)
    {
        $details = HomeContent::where('id', $id)->first();
        if ($details) {
            return view('admin.footer.supportlinkedit', ['details' => $details]);
        }
    }

    function UpdatedSupportLink(Request $req)
    {
        $details = HomeContent::where('id', $req->id)->first();
        $details->name = $req->name;
        $details->url = $req->url;
        $details->status = $req->status;
        if ($details->save()) {
            return redirect('/admin/footer-settings');
        }
    }
    function DeletedSupportLink($id)
    {
        $result = HomeContent::destroy('id', $id);
        if ($result) {
            return redirect('/admin/footer-settings');
        }
    }

    function SupportLinkCreated(Request $req)
    {
        $sectiontype = "footer-support";
        $section = "footer";
        $SocialLink = HomeContent::create([
            'section' => $section,
            'section_type' => $sectiontype,
            'name' => $req->name,
            'url' => $req->url,
            'status' => $req->status,
        ]);
        if ($SocialLink) {
            return redirect('/admin/footer-settings');
        }
    }

    function ImageDetails()
    {
        $backgroundimage = HomeContent::where('section', 'Background')->where('section_type', 'Background-image')->first();
        $backgroundcolor = HomeContent::where('section_type', 'background-color')->first();
        return view('admin.background.backgroundimage', ['background' => $backgroundimage, 'color' => $backgroundcolor]);
    }

    public function storeImage(Request $request)
    {
        // 1. Validate the incoming request data.
        // This is crucial for security and data integrity.
        $request->validate([
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Max 2MB, common image types
            'image_name' => 'nullable|string|max:255', // Image name is optional
        ]);

        $uploadedImage = $request->file('image_file');

        // Generate a unique filename to avoid conflicts (e.g., 1678888888_randomstring.jpg)
        $fileName = time() . '_' . Str::random(10) . '.' . $uploadedImage->getClientOriginalExtension();

        // Define the folder within storage/app/public where you want to store the images
        // This will create a path like 'storage/app/public/backgrounds/your_file.jpg'
        $destinationFolder = 'backgrounds';

        // Store the file in storage/app/public/backgrounds
        // This method returns the path relative to the 'public' disk (e.g., 'backgrounds/unique_name.jpg')
        $storedRelativePath = Storage::disk('public')->putFileAs($destinationFolder, $uploadedImage, $fileName);

        // Generate the full public URL for the stored image using asset() helper.
        // This will create a URL like 'http://your-app.com/storage/backgrounds/your_file.jpg'
        $link = asset('storage/' . $storedRelativePath);

        // 2. Find the existing HomeContent record for the background.
        // This assumes you always have one such record you want to update.
        $image = HomeContent::where('section', 'background')
            ->where('section_type', 'background-image') // Add section_type for more specificity
            ->first();

        // 3. Check if a record was found. If not, you might want to create one instead.
        if (!$image) {
            // If no existing 'background' record, create a new one.
            try {
                HomeContent::create([
                    'section' => 'background',
                    'section_type' => 'background-image', // Ensure this matches your enum
                    'name' => $request->image_name ?? 'Default Background', // Use provided name or default
                    'url' => $link,
                ]);
                return redirect('/admin/background-settings')->with('success', 'New background record created and image uploaded!');
            } catch (\Exception $e) {
                // Handle creation failure
                Storage::disk('public')->delete($storedRelativePath); // Delete uploaded file if DB fails
                return redirect('/admin/background-settings')->with('error', 'Failed to create background record: ' . $e->getMessage());
            }
        }

        // 4. Update the URL of the found record.
        try {
            $image->url = $link;
            $image->name = $request->image_name ?? $image->name; // Update name too if provided, otherwise keep old
            if ($image->save()) {
                return redirect('/admin/background-settings')->with('success', 'Background image updated successfully!');
            } else {
                // This 'else' path is less common if save() fails silently without exception
                return redirect('/admin/background-settings')->with('error', 'Failed to save background image URL.');
            }
        } catch (\Exception $e) {
            // Catch any exceptions during the save operation
            return redirect('/admin/background-settings')->with('error', 'An error occurred while saving: ' . $e->getMessage());
        }
    }

    function ColorUpdated(Request $req)
    {
        $backgroundcolor = HomeContent::where('section_type', 'background-color')->first();
        $backgroundcolor->url = $req->background_color;
        if ($backgroundcolor->save()) {
            return redirect('/admin/background-settings');
        }
    }
    //-----------------------------------------------------------------------------------------------------------------------------------------
    //Skills

    function SkillsInfo()
    {
        $skills = Skills::all();
        return view('admin.skills.dashboard', ['skills' => $skills]);
    }
    function DeleteSkill($id)
    {
        $action = Skills::destroy('id', $id);
        if ($action) {
            return redirect('/admin/skills');
        }
    }
    function Categories()
    {
        $categories = Skills::select('category')->distinct()->get();
        if ($categories) {
            return view('admin.skills.newskill', ['categories' => $categories]);
        }
    }
    function SkillAdded(Request $req)
    {
        $action = Skills::create([
            'skillname' => $req->name,
            'category' => $req->category,
        ]);
        if ($action) {
            return redirect('/admin/skills');
        }
    }
    function SearchResults(Request $req)
    {
        $searchQuery = $req->input('skillname');
        $skills = Skills::query();
        if ($searchQuery) {
            $skills->where('skillname', 'like', '%' . $searchQuery . '%');
        }
        $skills = $skills->get();
        return view('admin.skills.dashboard', compact('skills'));
    }

    //Location

    function LocationInfo()
    {
        $locations = Locations::all();
        return view('admin.Locations.locations', ['locations' => $locations]);
    }

    function LocationDelete($id)
    {
        $action = Locations::destroy('id', $id);
        if ($action) {
            return redirect('/admin/locations');
        }
    }

    function LocationAdded(Request $req)
    {
        $action = Locations::create([
            'country' => $req->country,
            'state' => $req->state,
            'city' => $req->city,
        ]);
        if ($action) {
            return redirect('/admin/locations');
        }
    }

    function Searching(Request $req)
    {
        $locationsQuery = Locations::query();
        $searchTerm = $req->input('search');
        if ($searchTerm) {
            $locationsQuery->where(function ($query) use ($searchTerm) {
                $query->where('city', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('state', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('country', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        $locations = $locationsQuery->get();
        return view('admin.Locations.locations', compact('locations'));
    }

    //-----------------------------------------------------------------------------------------------------------------------------
    //Job Post
    function JobInfo(){
        $jobs=JobPosts::where('view_status','approved')->get();
        return view('admin.jobs.AllJobs',['jobs'=>$jobs]);
    }

    function PendingJobs(){
        $jobs=JobPosts::where('view_status','pending')->get();
        return view('admin.jobs.PendingJobs',['jobs'=>$jobs]);
    }
    function FeaturedPending(){
        $jobs=JobPosts::where('featured','yes')->where('featured_status','no')->get();
        return view('admin.jobs.featurepending',['jobs'=>$jobs]);
    }
    function Featured(){
        $jobs=JobPosts::where('view_status','approved')->where('featured_status','yes')->where('featured','yes')->get();
        return view('admin.jobs.featured',['jobs'=>$jobs]);
    }
    //AllJob Separate View Page
    function DetailsJob($id){
        $details=JobPosts::where('job_id',$id)->first();
        $skills=Company_skill::where('job_id',$id)->get();
        return view('admin.jobs.jobdetails',['details'=>$details,'skills'=>$skills]);
    }

    function JobStatusUpdated($id,Request $req){
        $jobdetails=JobPosts::where('job_id',$id)->first();
        $jobdetails->view_status=$req->view_status;
        $jobdetails->featured_status=$req->featured_status;
        if($jobdetails->save()){
            return redirect('/admin/job-posts');
        }
    }

    ///------------------------------------------------------------------------
    //Job Roles
    function JobRoles(){
        $roles=JobPosts::distinct('title')->pluck('title');
        return view('admin.jobroles.jobroles',['roles'=>$roles]);
    }

    //---------------------------------------------------------------------------
    //Job-Category
    function JobCategories(){
        $categories = JobCategories::orderBy('count', 'desc')->get();
        $count=count($categories);
        return view('admin.categories.category',['categories'=>$categories,'count'=>$count]);
    }

    function DeletedCategory($id){
        $status=JobCategories::destroy('id',$id);
        if($status){
            return redirect('/admin/job-categories');
        }
    }
    function CategoryAdded(Request $req){
        $status=JobCategories::create([
            'category'=>$req->category,
        ]);
        if($status){
            return redirect('/admin/job-categories');
        }
    }

    //------------------------------------------------------------------------------------
    //Companies
    function AllCompanies(){
        $companies=Companies::where('verified','true')->get();
        return view('admin.companies.AllCompanies',['companies'=>$companies]);
    }

    function PendingCompanies(){
        $companies=Companies::where('verified','false')->get();
        return view('admin.companies.PendingCompanies',['companies'=>$companies]);
    }

    function FeaturedCompanies(){
        $companies=Companies::where('verified','true')->where('is_premium','true')->get();
        return view('admin.companies.FeaturedCompanies',['companies'=>$companies]);
    }
    function FeaturedPendingCompanies(){
        $companies=Companies::where('verified','true')->where('is_premium','false')->get();
        return view('admin.companies.FeaturedPending',['companies'=>$companies]);
    }
    function CompanyDetails($id){
        $details=Companies::where('company_id',$id)->first();
        return view('admin.companies.details',['details'=>$details,'id'=>$id]);
    }
    function UpdatedCompanies(Request $req){
        $details=Companies::where('company_id',$req->company_id)->first();
        $details->verified=$req->verified;
        $details->is_premium=$req->is_premium;
        if($details->save()){
            return redirect('/admin/companies');
        }
    }

    //---------------------------------------------------------------------------
    //USERS
    function VerifiedUsers(){
        $users=Employee::where('verified','true')->get();
        return view('admin.employees.AllEmployees',['users'=>$users]);
    }

    function PendingUsers(){
        $users=Employee::where('verified','false')->get();
        return view('admin.employees.PendingEmployees',['users'=>$users]);
    }

    function UsersDetails($id){
        $details=Employee::where('user_id',$id)->first();
        return view('admin.employees.details',['details'=>$details,'user_id'=>$id]);
    }
    function UserUpdates(Request $req){
        $status=Employee::where('user_id',$req->user_id)->first();

        $status->verified=$req->verified;
        if($status->save()){
            return redirect('/admin/users');
        }
    }
}


