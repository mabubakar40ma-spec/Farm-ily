<?php

use App\Http\Controllers\Frontend\AgentListingController;
use App\Http\Controllers\Frontend\AgentListingImageGalleryController;
use App\Http\Controllers\Frontend\AgentListingScheduleController;
use App\Http\Controllers\Frontend\AgentListingVideoGalleryController;
use App\Http\Controllers\Frontend\ChatController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RentEquipmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ChatController as GlobalChatController;
use App\Http\Controllers\FarmingBotController;
use Illuminate\Support\Facades\Route;

Route::get('/chat', fn() => view('frontend.dashboard.farming.chat'))->name('farming.chat');
Route::post('/chatbot/respond', [FarmingBotController::class, 'respond'])->name('chatbot.respond');
// Route::post('/chatbot/respond', [FarmingBotController::class, 'respond'])->name('chatbot.respond');
// Route::get('/farming-chat', fn() => view('frontend.dashboard.farming.chat'))->name('farming.chat');
// Route::post('/farming-chat/ask', [FarmingBotController::class, 'ask'])->name('farming.chat.ask');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/packages', [FrontendController::class, 'showPackages'])->name('packages');

Route::get('checkout/{id}', [FrontendController::class, 'checkout'])->name('checkout.index');

/**Equipment Route */
Route::get('/equipment', [FrontendController::class, 'equipment'])->name('equipment');
Route::post('/equipment-rent-booking', [FrontendController::class, 'equipmentRentBooking'])->name('equipment.rent.booking');


/**Listing Route */
Route::get('/listings', [FrontendController::class, 'listings'])->name('listings');
Route::get('listing/{slug}', [FrontendController::class, 'showListing'])->name('listing.show');

/**Blog Route */
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog.index');
Route::get('/blog/{slug}', [FrontendController::class, 'blogShow'])->name('blog.show');

/**Contact Route */
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('contact', [FrontendController::class, 'contactMessage'])->name('contact.message');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/my-profile', [FrontendProfileController::class, 'index'])->name('myProfile');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::put('/profile-password', [ProfileController::class, 'updatePassword'])->name('profile-password.update');
});


Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile-password', [ProfileController::class, 'updatePassword'])->name('profile-password.update');
    Route::get('/messages', [ChatController::class, 'index'])->name('messages');

    /** Message Routes */
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send-message');
    Route::get('/get-messages', [ChatController::class, 'getMessages'])->name('get-messages');

    /** Listing Routes */
    Route::resource('/listing', AgentListingController::class);

    /** Listing Image Gallery Routes */
    Route::resource('/listing-image-gallery', AgentListingImageGalleryController::class);
    /** Listing Video Gallery Routes */
    Route::resource('/listing-video-gallery', AgentListingVideoGalleryController::class);

    /** Listing Schedule Routes */
    Route::get('/listing-schedule/{listing_id}', [AgentListingScheduleController::class, 'index'])->name('listing-schedule.index');
    Route::get('/listing-schedule/{listing_id}/create', [AgentListingScheduleController::class, 'create'])->name('listing-schedule.create');
    Route::post('/listing-schedule/{listing_id}', [AgentListingScheduleController::class, 'store'])->name('listing-schedule.store');
    Route::get('/listing-schedule/{id}/edit', [AgentListingScheduleController::class, 'edit'])->name('listing-schedule.edit');
    Route::put('/listing-schedule/{id}', [AgentListingScheduleController::class, 'update'])->name('listing-schedule.update');
    Route::delete('/listing-schedule/{id}', [AgentListingScheduleController::class, 'destroy'])->name('listing-schedule.destroy');

    /** Rental Equipment Routes */
    Route::resource('/rent-equipment', RentEquipmentController::class);
    Route::get('/rent-equipment-booking', [RentEquipmentController::class, 'RentEquipmentBooking'])->name('rental-equipment.booking');

    /** Order Routes */
    Route::get('orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('order.show');
});
Route::group(['middleware' => 'auth'], function () {
    /** Payment Routes */
    Route::get('payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

    /** Stripe Routes */
    Route::get('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');
    Route::get('stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
    Route::get('stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');

    Route::get('/chat/with-user/{listing}', [GlobalChatController::class, 'chatWithUser'])->name('chat.withUser');
    Route::post('/chat/send', [GlobalChatController::class, 'send'])->name('chat.send');
    Route::get('/chat/messages/{userId}', [GlobalChatController::class, 'fetchMessages'])->name('chat.fetch');
    Route::get('/chat/conversations', [GlobalChatController::class, 'conversations'])->name('chat.conversations');
    Route::get('/chat/with-user-direct/{user}', [GlobalChatController::class, 'chatDirect'])->name('chat.withUser.direct');
});


require __DIR__ . '/auth.php';
