<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Models\HomeContent;
use App\Models\User;

Route::get('/',[HomeController::class,'HeadersInfo']);
Route::get('/Guest',[HomeController::class,'HeadersInfo']);






//ADMIN CONTROLS ROUUTES
Route::view('AdminLogin','admin.login');
Route::post('/Logging',[AdminController::class,'LoginCheck']);
Route::get('/admin/logout',[AdminController::class,'LogOut']);
//HeaderSectionControl
Route::get('/admin/header-settings',[AdminController::class,'HeaderInfo']);
Route::get('/admin/header-links/{id}/edit',[AdminController::class,'RedirectLinkEdit']);
Route::put('/admin/updatelink',[AdminController::class,'UpdatedLink']);
Route::get('/admin/header-title/{id}/edit',[AdminController::class,'RedirectTitleEdit']);
Route::put('/admin/header-title/{id}',[AdminController::class,'UpdatedTitle']);
Route::view('/admin/header-links/create','admin.header.createlink');
Route::post('/admin/header-links/new',[AdminController::class,'NewLinkAdded']);
Route::delete('/admin/header-links/{id}',[AdminController::class,'DeletedLink']);

//-----------------------------------------------------------------------------------
//FooterSectionControl
Route::get('/admin/footer-settings',[AdminController::class,'FooterInfo']);
Route::get('/admin/footer-about/{id}/edit',[AdminController::class,'RedirectAbout']);
Route::put('/admin/footer-about/{id}',[AdminController::class,'AboutUpdated']);
//SocilLink
Route::get('/admin/footer-social/{id}/edit',[AdminController::class,'RedirectSocialLinkEdit']);
Route::put('/admin/social-media-links/update',[AdminController::class,'UpdatedSocialLink']);
Route::delete('/admin/footer-social/{id}',[AdminController::class,'DeletedSocialLink']);
Route::view('/admin/footer-social/create','admin.footer.createsociallink');
Route::post('/admin/social-media-links/create',[AdminController::class,'SocialLinkCreated']);
//SupportLink
Route::get('/admin/footer-support/{id}/edit',[AdminController::class,'RedirectSupportLinkEdit']);
Route::put('/admin/support-links/update',[AdminController::class,'UpdatedSupportLink']);
Route::delete('/admin/footer-support/{id}',[AdminController::class,'DeletedSupportLink']);
Route::view('/admin/footer-support/create','admin.footer.createsupportlink');
Route::post('/admin/support-links/create',[AdminController::class,'SupportLinkCreated']);

//--------------------------------------------------------------------------------------------
//BackGround Images Section
Route::get('/admin/background-settings',[AdminController::class,'ImageDetails']);
Route::post('/admin/images',[AdminController::class,'storeImage']);
Route::put('/admin/background-color/update',[AdminController::class,'ColorUpdated']);
//-----------------------------------------------------------------------------------------------

//Skills
Route::get('/admin/skills',[AdminController::class,'SkillsInfo']);
Route::delete('/admin/skills/{id}',[AdminController::class,'DeleteSkill']);
Route::get('/admin/skills/create',[AdminController::class,'Categories']);
Route::post('/admin.skills.store',[AdminController::class,'SkillAdded']);
Route::get('/admin.skills.search',[AdminController::class,'SearchResults']);

//Locations
Route::get('/admin/locations',[AdminController::class,'LocationInfo']);
Route::delete('/locations/delete/{id}',[AdminController::class,'LocationDelete']);
Route::view('/locations/create','admin.Locations.CreateLocation');
Route::post('/locations/store',[AdminController::class,'LocationAdded']);
Route::get('/admin.locations.search',[AdminController::class,'Searching']);

//Job Posts
Route::get('/admin/job-posts',[AdminController::class,'JobInfo']);
Route::get('/admin/jobs/pendingjobs',[AdminController::class,'PendingJobs']);
Route::get('/admin/jobs/featuredpending',[AdminController::class,'FeaturedPending']);
Route::get('/admin/jobs/featured',[AdminController::class,'Featured']);
Route::get('/admin/job-posts/{id}',[AdminController::class,'DetailsJob']);
Route::put('/admin/jobs/{id}/update',[AdminController::class,'JobStatusUpdated']);


//Job-Roles
//Roles r being taken from job posts
Route::get('/admin/job-roles',[AdminController::class,'JobRoles']);


//Job-Categroies
Route::get('/admin/job-categories',[AdminController::class,'JobCategories']);
Route::delete('/admin/job-categories/delete/{id}',[AdminController::class,'DeletedCategory']);
Route::view('/admin/categories/create','admin.categories.newcategory');
Route::post('/admin/categories/added',[AdminController::class,'CategoryAdded']);

//Companies
Route::get('/admin/companies',[AdminController::class,'AllCompanies']);
Route::get('/admin/pendingcompanies',[AdminController::class,'PendingCompanies']);
Route::get('/admin/companies/featured',[AdminController::class,'FeaturedCompanies']);
Route::get('/admin/featuredpendingcompanies',[AdminController::class,'FeaturedPendingCompanies']);
Route::get('/admin/companies/featuredpending',[AdminController::class,'FeaturedPendingCompanies']);
Route::get('/admin/companies/{id}',[AdminController::class,'CompanyDetails']);
Route::put('/admin/companies/update',[AdminController::class,'UpdatedCompanies']);


//USers
Route::get('/admin/users',[AdminController::class,'VerifiedUsers']);
Route::get('/admin/users/pending',[AdminController::class,'PendingUsers']);
Route::get('/admin/users/{id}',[AdminController::class,'UsersDetails']);
Route::put('/admin/users/update',[AdminController::class,'UserUpdates']);




//-----------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------
//HomePage Interactions
Route::get('/JobSearch',[HomeController::class,'SearchedJobs']);
Route::get('/jobs/{id}',[HomeController::class,'UserSearchedJobDetails']);




Route::view('/UserLogin','users.UserLogin');
Route::view('/User/Register','users.UserRegistration');
Route::post('/User/Registering',[HomeController::class,'Registered']);
Route::get('/LoggingIn',[HomeController::class,'LoggedIn']);

Route::get('/LoggedDashBoard',[HomeController::class,'AfterLogin']);
Route::get('/UserLogOut',[HomeController::class,'LoggedOut']);


//--------------------------------------------------------------------
//After LogIn User
//User Bookmarking
Route::POST('/SaveJob/{id}',[HomeController::class,'Bookmarked']);
Route::get('/User/UserInfoDashBoard',[HomeController::class,'EmployeeAboutHisInfo']);
Route::get('/User/Bookmark',[HomeController::class,'BookmarkedInfo']);
Route::delete('/RemoveBookmark/{id}',[HomeController::class,'RemovedBookmark']);
Route::get('/User/Job-Apply/{id}',[HomeController::class,'JobApplied']);
Route::get('/User/AppliedJobs',[HomeController::class,'AppliedJobsInfo']);
Route::get('/MyProfile',[HomeController::class,'MyProfileUser']);

Route::post('/User/UpdateProfile',[HomeController::class,'ProfileUpdated']);


//-------------------------------------------------------------------------------
//--------------------------------------------------------------------------------
//-Companies

//Login
Route::view('/CompanyLogin','companies.login');
Route::view('/CompanyRegister','companies.register');
Route::post('/CompanyLogin',[CompaniesController::class,'Login']);
Route::post('/CompanyRegister',[CompaniesController::class,'Register']);
Route::get('/CompanyLogout', [CompaniesController::class, 'logout']);
Route::get('/CompanyDashBoard', [CompaniesController::class, 'dashboard']);
Route::get('/company/profile',[CompaniesController::class,'CompanyProfile']);
Route::post('/Company/updateProfile',[CompaniesController::class,'updateProfile']);
Route::get('/company/jobs',[CompaniesController::class,'CompanyJobs']);
Route::get('/company/jobs/{id}/applicants',[CompaniesController::class,'AppliedProfiles']);

Route::get('/company/candidate/{id}/{job_id}',[CompaniesController::class,'CandidateDetails']);
Route::post('/company/candidate/{id}/shortlist/{job_id}',[CompaniesController::class,'ShortlistedCandidate']);

Route::get('/company/jobs/{id}/shortlisted',[CompaniesController::class,'ShortlistedCondidatesInfo']);
Route::delete('/company/jobs/{id}/delete',[CompaniesController::class,'JobDeleted']);
Route::get('/company/jobs/create',[CompaniesController::class,'NewJobCreating']);
Route::post('/NewJobCreateCompany',[CompaniesController::class,'JobCreating']);
Route::post('/company/candidate/{user_id}/reject/{job_id}',[CompaniesController::class,'CandidateRejected']);




