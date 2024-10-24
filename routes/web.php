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

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PurchasedBookController;
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

    Route::post('/profile/uploadPhoto', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');
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
Route::get('/featured-books', [BookController::class, 'featuredBooks'])->name('books.featured');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::middleware('auth')->group(function () {
    Route::post('/book/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/library', [BookController::class, 'index'])->name('library');
Route::get('/more_detail', [BookController::class, 'showMoreDetail'])->name('more_detail');
Route::get('/book/{id}', [BookController::class, 'show'])->name('more_detail');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');

});
Route::resource('user/books', UserBooksController::class);
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


Route::middleware('auth')->group(function () {
    Route::get('/user/books', [PurchasedBookController::class, 'index'])->name('user.books.index');
    Route::post('/purchased-books/add', [PurchasedBookController::class, 'addPurchasedBooks'])->name('purchased.books.add');
});
Route::get('/saved1', function () {
    return view('saved1');
})->name('saved1');
Route::get('/payments', [CheckoutController::class, 'show'])->name('payments');


    Route::post('/book', [BookController::class, 'store'])->name('book.store');

     Route::get('/upload', [UploadBookController::class, 'create'])->name('book.upload');
     Route::post('/upload', [UploadBookController::class, 'store'])->name('book.store');
    Route::get('/saved', [SavedController::class, 'index'])->name('saved.index');
});

Route::get('/books', [BookController::class, 'index1'])->name('books.index');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::get('/books/{id}', [BookController::class, 'show1'])->name('books.show');
Route::post('/cart/add/{id}', [BookController::class, 'addToCart'])->name('cart.add');
Route::get('/payments', action: [CheckoutController::class, 'show'])->name('payments');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::get('/payments', [BookController::class, 'viewCart'])->name('payments');
Route::get('/page1/add/{id}', [BookController::class, 'addBookToPage1'])->name('page1.add');
Route::get('/page1/remove/{id}', [BookController::class, 'removeBookFromPage1'])->name('page1.remove');
 Route::get('/page1/{id}', [BookController::class, 'addBookToPage1'])->name('page1');
 Route::get('/page1', [BookController::class, 'showPage1'])->name('page1');
 Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
 Route::get('/thanks_for_your_order', [OrderController::class, 'showThanks'])->name('thanks_for_your_order');
Route::get('/checkout', [OrderController::class, 'showCheckout'])->name('checkout.show');

// Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/thanks-for-your-order', [CheckoutController::class, 'thanksForYourOrder'])->name('thanks_for_your_order');

Route::post('/book/save/{id}', [BookController::class, 'saveBook'])->name('book.save');

Route::get('/saved', [BookController::class, 'savedBooks'])->name('saved.index');

Route::get('/saved1', function () {
    return view('saved1');
})->name('saved1');

     Route::get('/upload', [UploadBookController::class, 'create'])->name('book.upload');
     Route::post('/upload', [UploadBookController::class, 'store'])->name('book.store');
    Route::get('/saved', [SavedController::class, 'index'])->name('saved.index');
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
//Create 


Route::get('/adminpanel/adminaddbook', [AdminAddBookController::class, 'create'])->name('adminaddbook.create');
Route::post('/adminpanel/adminaddbook', [AdminAddBookController::class, 'store'])->name('adminaddbook.store');
//books
Route::get('/adminpanel/adminbooks', [AdminBooksController::class, 'index'])->name('adminpanel.adminbooks');
Route::get('/adminpanel/adminmoderationbooks', [AdminModerationBooksController::class, 'index'])->name('adminpanel.adminmoderationbooks');
Route::get('/adminpanel/adminorderhistory', [AdminOrderHistoryController::class, 'index'])->name('adminpanel.adminorderhistory');


Route::get('/adminpanel/adminaddbook', [AdminAddBookController::class, 'create'])->name('adminaddbook.create');
Route::post('/adminpanel/adminaddbook', [AdminAddBookController::class, 'store'])->name('adminaddbook.store');

Route::get('/adminpanel/adminbooks', [AdminBooksController::class, 'index'])->name('adminpanel.adminbooks');
