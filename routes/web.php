<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\EmailManagementController;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main page routes
Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/services', function () {
    return view('frontend.services');
});

Route::get('/portfolio', function () {
    return view('frontend.portfolio');
});

Route::get('/pricing', function () {
    return view('frontend.pricing');
});

Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/faq', function () {
    return view('frontend.faqs');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});

// Contact us form route
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');

// Newsletter subscription route
Route::post('/subscribe-to-newsletter', [NewsletterController::class, 'store'])->name('newsletter.subscribe');

// Portfolio page routes
Route::get('/portfolio', [PortfolioController::class, 'publicIndex'])->name('portfolio.public.index');



// VERIFIED USER ROUTES 
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    
    //Profile page routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Project page routes
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::get('/projects/{project}/payment', [ProjectController::class, 'payment'])->name('projects.payment');
    Route::get('/my-payments', [PaymentController::class, 'userEarnings'])->name('my-payments');

    //Paypal payment routes
    Route::post('/paypal-transaction-complete', [PaymentController::class, 'paypalTransactionComplete'])->name('paypal.transaction-complete');
    Route::get('/payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    //Messaging routes
    Route::post('/project-details/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/projects/{project}/complete', [ProjectController::class, 'complete'])->name('projects.complete');
    
});

// PROJECT OWNER AND ADMIN ROUTES
Route::middleware(['auth', 'project.owner.admin'])->group(function () {
    
    Route::get('/project-details/projectID-{project}', [ProjectController::class, 'details'])->name('project.details')->middleware('project.owner.admin');
    
    
});

// ADMIN ROUTES
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [ProfileController::class, 'adminDashboard'])->name('admin');
    Route::get('/admin/dashboard',[ProfileController::class, 'adminDashboard'])->name('admin.dashboard');
    
    //Project management routes
    Route::get('/admin/manage/allprojects', [ProjectController::class, 'allProjects'])->name('admin.projects.all');
    Route::get('/admin/manage/allprojects/search', [ProjectController::class, 'search'])->name('admin.project.search');
    Route::get('/admin/projects/{project}', [ProjectController::class, 'adminDetails'])->name('admin.project.details');
    Route::delete('/admin/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    //Portfolio management routes
    Route::get('admin/manage/portfolios', [PortfolioController::class, 'index'])->name('admin.portfolio.index');
    Route::get('admin/manage/portfolios/search', [PortfolioController::class, 'search'])->name('admin.portfolio.search');
    Route::post('/admin/manage/portfolio/store', [PortfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::delete('/admin/manage/portfolio/{portfolio}', [PortfolioController::class, 'destroy'])->name('admin.portfolio.destroy');

    //User management routes
    Route::get('/admin/manage/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/manage/users/search', [UserController::class, 'search'])->name('admin.users.search');
    Route::patch('/admin/manage/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/manage/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::patch('/admin/manage/users/{user}/change-role', [UserController::class, 'changeRole'])->name('admin.users.changeRole');

    //Payment management routes
    Route::get('/admin/manage/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/admin/manage/payments/search', [PaymentController::class, 'search'])->name('admin.payments.search');

    //Email management routes
    Route::get('/admin/manage/emails', [EmailManagementController::class, 'showEmailManagement'])->name('admin.emails.index');
    Route::post('/admin/manage/emails/{id}/reply', [EmailManagementController::class, 'sendReply'])->name('contact-messages.reply');
    Route::delete('/admin/manage/emails/{id}/delete', [EmailManagementController::class, 'destroy'])->name('contact-messages.delete');



});


require __DIR__.'/auth.php';