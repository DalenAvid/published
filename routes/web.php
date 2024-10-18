<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\SocialiteController; 
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UploadBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserBooksController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\AdminpanelController;
use App\Http\Controllers\PurchaseCompletedController;
use App\Http\Controllers\ThanksForOrderController;
use App\Http\Controllers\QuestionSentController;
use App\Http\Controllers\NotToPublishBookController;
use App\Http\Controllers\AskAQuestionController;
use App\Http\Controllers\ModerationOfTheBookController;
use App\Http\Controllers\PublishBookController;
use App\Http\Controllers\ReviewPublishedController;
use App\Http\Controllers\AdminAddBookController;
use App\Http\Controllers\AdminBooksController;
use App\Http\Controllers\AdminModerationBooksController;
use App\Http\Controllers\AdminOrderHistoryController;






Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Auth::routes();   


Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('auth/{provider}/redirect', [SocialiteController::class, 'loginSocial'])->name('socialite.auth');
    Route::get('auth/{provider}/callback', [SocialiteController::class, 'callbackSocial'])->name('socialite.callback');
});

Route::get('login/{provider}', [LoginController::class, 'redirectToProvider'])->name('login.provider');
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('login.provider.callback');

Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::resource('books', BooksController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.modify');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/questionsAnsw', [ProfileController::class, 'questionsAnswers'])->name('profile.questions_answers');

    Route::post('/profile/upload', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');
    Route::get('/index', [IndexController::class, 'index'])->name('index');
    // Route::get('/library', [LibraryController::class, 'library'])->name('library');
    // Route::get('/library/index', [LibraryController::class, 'index'])->name('library.index');
    // Route::get('/upload', [UploadBookController::class, 'create'])->name('book.upload');
    // Route::get('/library', [UploadBookController::class, 'showLibrary'])->name('library');
    // Route::put('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::post('/profile/uploadPhoto', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');

// Route::post('/upload', [UploadBookController::class, 'store'])->name('book.store');
// Route::post('/upload-book', [UploadBookController::class, 'store'])->name('book.store');
Route::post('/books', [BooksController::class, 'store'])->name('books.store');
Route::middleware('auth')->group(function () {
    Route::get('/library', [LibraryController::class, 'index'])->name('library');
    Route::get('/library', [LibraryController::class, 'library'])->name('library');
    Route::get('/library/index', [LibraryController::class, 'index'])->name('library.index');
    Route::get('/book/preview', [LibraryController::class, 'preview'])->name('book.preview');
    
});
Route::middleware('auth')->group(function () {
    Route::get('/upload', [UploadBookController::class, 'create'])->name('book.upload');
    Route::post('/upload-book', [UploadBookController::class, 'store'])->name('book.store');
    Route::get('/book/preview', [UploadBookController::class, 'showPreviewPage'])->name('book.preview');
    Route::post('/upload/preview', [UploadBookController::class, 'preview'])->name('book.preview');
    Route::get('/book/preview/new', [UploadBookController::class, 'showPreviewPage'])->name('preview.new');
    Route::post('/book/store', [UploadBookController::class, 'store'])->name('book.store');
    Route::post('/upload-book', [UploadBookController::class, 'store'])->name('book.store');
   
});
Route::middleware('auth')->group(function () {
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/library', [BookController::class, 'index'])->name('library');
    //Route::get('/library', [BookController::class, 'index']); 
//Route::post('/library/store', [BookController::class, 'store'])->name('library.store'); 
});
Route::resource('user/books', UserBooksController::class)->middleware('auth');
Route::get('/user/books', [UserBooksController::class, 'index'])->name('user.books.index');
Route::get('/saved', function () {
    return view('saved');
})->name('saved');

Route::get('/saved1', function () {
    return view('saved1');
})->name('saved1');
// Route::post('/upload/preview', [UploadBookController::class, 'preview'])->name('book.preview');
// Route::get('/book/preview/new', [UploadBookController::class, 'showPreviewPage'])->name('preview.new');
// Route::get('/library', [UploadBookController::class, 'showLibrary'])->name('library');
// Route::put('/preview', [UploadBookController::class, 'preview'])->name('book.preview');
// Route::get('/preview', [LibraryController::class, 'preview'])->name('book.preview');
// Route::get('/library', [LibraryController::class, 'library'])->name('library');
// Route::post('/book/store', [UploadBookController::class, 'store'])->name('book.store');
// Route::get('/book/preview', [LibraryController::class, 'preview'])->name('book.preview');
    // Route::post('/book/preview', [UploadBookController::class, 'preview'])->name('book.preview');
    // Route::get('/book/preview', [UploadBookController::class, 'showPreviewPage'])->name('preview.new');
    // Route::post('/books/store', [LibraryController::class, 'store'])->name('book.store');

    // Route::post('/book/preview', [UploadBookController::class, 'preview'])->name('book.preview');

    // Route::post('/book/preview', [UploadBookController::class, 'showPreview'])->name('preview.page');
    // Route::get('/book/preview', [UploadBookController::class, 'showPreview'])->name('preview.page');
// Route::get('/book/preview-new', function () {
//     return view('preview');
// })->name('preview.new');
    // Route::get('/book/preview-new', [UploadBookController::class, 'previewPage'])->name('preview.new');
    // Route::post('/book/download', [UploadBookController::class, 'download'])->name('book.download');
    // Route::post('/library', [UploadBookController::class, 'libr'])->name('library.store'); 
    
     Route::get('/upload', [UploadBookController::class, 'create'])->name('book.upload');
     Route::post('/upload', [UploadBookController::class, 'store'])->name('book.store');
    // Route::get('/book/preview', [UploadBookController::class, 'showPreviewPage'])->name('book.preview.page');
    // Route::get('/library', [LibraryController::class, 'index'])->name('library');

    // Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/saved', [SavedController::class, 'index'])->name('saved.index');
    // Route::post('/book/download', [UploadBookController::class, 'download'])->name('book.download');
});
// Route::get('/library', [LibraryController::class, 'index'])->name('library');

// Route::get('/library', function () {
//     return view('library'); 
// });
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.modify');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('login/facebook', [AuthController::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [AuthController::class, 'handleFacebookCallback']);
Route::get('login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);


Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login/google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login/facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);



Route::get('set-language/{lang}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->back();
});


Route::redirect('/', '/en');
Route::group(['prefix' => '{language}'], function () {
    Route::get('/', function ($language) {
        App::setLocale($language);
        return view('welcome');
    });
});

Route::get('/adminpanel/adminpanel', [AdminpanelController::class, 'index'])->name('adminpanel');
Route::get('/reports/purchase-completed', [PurchaseCompletedController::class, 'index'])->name('reports.purchase_completed');
Route::get('/reports/thanks-for-your-order', [ThanksForOrderController::class, 'index'])->name('reports.thanks_for_your_order');
Route::get('/reports/question-sent', [QuestionSentController::class, 'index'])->name('reports.question_sent');
Route::get('/reports/not-to-publish-book', [NotToPublishBookController::class, 'index'])->name('reports.not_to_publish_book');
Route::get('/reports/ask-a-question', [AskAQuestionController::class, 'index'])->name('reports.ask_a_question');
Route::get('/reports/moderation-of-the-book', [ModerationOfTheBookController::class, 'index'])->name('reports.moderation_of_the_book');
Route::get('/reports/publish-book', [PublishBookController::class, 'index'])->name('reports.publish_book');
Route::get('/reports/review-published', [ReviewPublishedController::class, 'index'])->name('reports.review_published');


Route::get('/adminpanel/adminaddbooks', [AdminAddBookController::class, 'index'])->name('adminpanel.adminaddbooks');
Route::get('/adminpanel/adminbooks', [AdminBooksController::class, 'index'])->name('adminpanel.adminbooks');
Route::get('/adminpanel/adminmoderationbooks', [AdminModerationBooksController::class, 'index'])->name('adminpanel.adminmoderationbooks');
Route::get('/adminpanel/adminorderhistory', [AdminOrderHistoryController::class, 'index'])->name('adminpanel.adminorderhistory');


Route::get('/adminpanel/adminaddbook', [AdminAddBookController::class, 'create'])->name('adminaddbook.create');
Route::post('/adminpanel/adminaddbook', [AdminAddBookController::class, 'store'])->name('adminaddbook.store');

Route::get('/adminpanel/adminbooks', [AdminBooksController::class, 'index'])->name('adminpanel.adminbooks');