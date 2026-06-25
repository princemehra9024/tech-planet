<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminQuizController;
use App\Http\Controllers\Admin\AdminQuestionController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuestPageController;

/*
|--------------------------------------------------------------------------
| Public Routes (no login required)
|--------------------------------------------------------------------------
*/
Route::get('/', [GuestPageController::class, 'home'])->name('home');
Route::get('/about', [GuestPageController::class, 'about'])->name('about');
Route::get('/events', [GuestPageController::class, 'events'])->name('public.events'); // informational events page
Route::get('/gallery', [GuestPageController::class, 'gallery'])->name('gallery');
Route::get('/contact', [GuestPageController::class, 'contact'])->name('contact');

Route::view('/login', 'auth.login')->name('login');
Route::view('/signup', 'auth.signup')->name('signup');

// Auth actions (must be POST for actual login/register)
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/event/suggest', [EventController::class, 'storeSuggestion'])->name('events.suggest');
Route::get('/portfolio/{slug}', [ProfileController::class, 'publicPortfolio'])->name('portfolio.show');

/*
|--------------------------------------------------------------------------
| Student Portal (Authenticated, full-stack features)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('student')->name('student.')->group(function () {
    // Dashboard & feed
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/post', [DashboardController::class, 'createPost'])->name('post.create');
    Route::post('/like/{postId}', [DashboardController::class, 'likePost'])->name('post.like');
    Route::post('/comment/{postId}', [DashboardController::class, 'addComment'])->name('post.comment');
    Route::post('/event/create', [DashboardController::class, 'createEvent'])->name('event.create');
    Route::post('/event/suggest/{suggestionId}/vote', [DashboardController::class, 'voteSuggestion'])->name('events.vote');

    // Events (registration)
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::post('/event/register/{eventId}', [EventController::class, 'register'])->name('event.register');

    // Coding Arena (quizzes)
    Route::get('/coding-arena', [QuizController::class, 'index'])->name('coding-arena');
    Route::get('/quiz/{quizId}', [QuizController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{quizId}/submit', [QuizController::class, 'submit'])->name('quiz.submit');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Leaderboard & Notifications
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/push-subscription', [NotificationController::class, 'storePushSubscription'])->name('push-subscription');
    Route::get('/certificates', [\App\Http\Controllers\StudentCertificateController::class, 'index'])->name('certificates');

    // Impersonation control
    Route::post('/stop-impersonating', [AdminUserController::class, 'stopImpersonating'])->name('stop-impersonating');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/users/bulk-semester-update', [AdminController::class, 'bulkStartSemester'])->name('users.bulk-semester-update');
    Route::get('/suggestions', [AdminController::class, 'suggestionsIndex'])->name('suggestions.index');
    Route::post('/suggestions/{suggestion}/status', [AdminController::class, 'updateSuggestionStatus'])->name('suggestions.update-status');
    Route::get('/suggestions/{suggestion}/publish', [AdminController::class, 'publishSuggestionForm'])->name('suggestions.publish');
    Route::post('/suggestions/{suggestion}/publish', [AdminController::class, 'publishSuggestion'])->name('suggestions.publish.store');
    Route::delete('/suggestions/{suggestion}', [AdminController::class, 'destroySuggestion'])->name('suggestions.destroy');

    Route::get('/events', [AdminEventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [AdminEventController::class, 'create'])->name('events.create');
    Route::post('/events', [AdminEventController::class, 'store'])->name('events.store');
    Route::delete('/events/{event}', [AdminEventController::class, 'destroy'])->name('events.destroy');

    Route::get('/posts', [AdminPostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [AdminPostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [AdminPostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/quizzes', [AdminQuizController::class, 'index'])->name('quizzes.index');
    Route::get('/quizzes/create', [AdminQuizController::class, 'create'])->name('quizzes.create');
    Route::post('/quizzes', [AdminQuizController::class, 'store'])->name('quizzes.store');
    Route::get('/quizzes/{quiz}/edit', [AdminQuizController::class, 'edit'])->name('quizzes.edit');
    Route::put('/quizzes/{quiz}', [AdminQuizController::class, 'update'])->name('quizzes.update');
    Route::delete('/quizzes/{quiz}', [AdminQuizController::class, 'destroy'])->name('quizzes.destroy');

    Route::get('/quizzes/{quiz}/questions', [AdminQuestionController::class, 'index'])->name('quizzes.questions.index');
    Route::get('/quizzes/{quiz}/questions/create', [AdminQuestionController::class, 'create'])->name('quizzes.questions.create');
    Route::post('/quizzes/{quiz}/questions', [AdminQuestionController::class, 'store'])->name('quizzes.questions.store');
    Route::get('/questions/{question}/edit', [AdminQuestionController::class, 'edit'])->name('questions.edit');
    Route::put('/questions/{question}', [AdminQuestionController::class, 'update'])->name('questions.update');
    Route::delete('/questions/{question}', [AdminQuestionController::class, 'destroy'])->name('questions.destroy');

    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/impersonate', [AdminUserController::class, 'impersonate'])->name('users.impersonate');

    // Certificates Management
    Route::get('/certificates', [\App\Http\Controllers\Admin\AdminCertificateController::class, 'index'])->name('certificates.index');
    Route::get('/certificates/create', [\App\Http\Controllers\Admin\AdminCertificateController::class, 'create'])->name('certificates.create');
    Route::post('/certificates', [\App\Http\Controllers\Admin\AdminCertificateController::class, 'store'])->name('certificates.store');
    Route::delete('/certificates/{certificate}', [\App\Http\Controllers\Admin\AdminCertificateController::class, 'destroy'])->name('certificates.destroy');

    // Gallery Management (Authorized via EnsureUserCanManageGallery middleware)
    Route::middleware([\App\Http\Middleware\EnsureUserCanManageGallery::class])->group(function () {
        Route::resource('gallery', \App\Http\Controllers\Admin\AdminGalleryController::class);
        Route::resource('gallery-categories', \App\Http\Controllers\Admin\AdminGalleryCategoryController::class);
    });
});