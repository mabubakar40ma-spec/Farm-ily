<?php

namespace App\Http\Controllers\Frontend;

use App\Events\CreateOrder;
use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Listing;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ListingSchedule;
use App\Models\Package;
use App\Models\RentEquipment;
use App\Models\RentEquipmentBooking;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class FrontendController extends Controller
{
    //
    public function index(): View
    {
        $blogs = Blog::with(['author', 'category'])
            ->where('status', 1)
            ->whereHas('author')     // Ensure only blogs with authors
            ->whereHas('category')   // Ensure only blogs with categories
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        // $blogs = Blog::with(['author', 'category'])  // Load both author and category
        //     ->where('status', 1)
        //     ->orderBy('id', 'Desc')
        //     ->take(3)
        //     ->get();
        $categories = Category::where('status', 1)->get();
        $locations = Location::where('status', 1)->get();
        $packages = Package::where('status', 1)->where('show_at_home', 1)->take(3)->get();
        $blogs = Blog::with('author')->where('status', 1)->orderBy('id', 'Desc')->take(3)->get();
        $equipments = RentEquipment::where('status', 1)->orderBy('id', 'Desc')->take(3)->get();
        $listings = Listing::with(['category', 'location'])
            ->where(['status' => 1, 'is_approved' => 1])
            ->orderBy('id', 'Desc')
            ->take(3)
            ->get();

        // If you still need all categories for another section
        $blogCategories = BlogCategory::all();  // Get all categories if needed elsewhere

        return view('frontend.home.index', compact('blogs', 'listings', 'blogCategories', 'equipments', 'categories', 'locations', 'packages'));
    }


    public function about(): View
    {
        return view('frontend.pages.about');
    }
    public function contact(): View
    {
        return view('frontend.pages.contact');
    }
    function showPackages(): View
    {
        $packages = Package::where('status', 1)->get();
        return view('frontend.pages.packages', compact('packages'));
    }
    public function equipment(): View
    {
        $equipments = RentEquipment::with(['location'])->where(['status' => 1, 'is_approved' => 1])->orderBy('id', 'Desc')->get();
        $locations = Location::where('status', 1)->get();
        return view('frontend.pages.equipment', compact('equipments', 'locations'));
    }

    function listings(Request $request): View
    {

        $listings = Listing::with(['category', 'location'])->where(['status' => 1, 'is_approved' => 1]);

        $listings->when($request->has('category') && $request->filled('category'), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });

        $listings->when($request->has('search') && $request->filled('search'), function ($query) use ($request) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        });

        $listings->when($request->has('location') && $request->filled('location'), function ($query) use ($request) {
            $query->whereHas('location', function ($subQuery) use ($request) {
                $subQuery->where('slug', $request->location);
            });
        });

        $listings->when($request->has('amenity') && is_array($request->amenity), function ($query) use ($request) {

            $amenityIds = Amenity::whereIn('slug', $request->amenity)->pluck('id');

            $query->whereHas('amenities', function ($subQuery) use ($amenityIds) {
                $subQuery->whereIn('amenity_id', $amenityIds);
            });
        });

        $listings = $listings->paginate(12);

        $categories = Category::where('status', 1)->get();
        $locations = Location::where('status', 1)->get();
        $amenities = Amenity::where('status', 1)->get();

        return view('frontend.pages.listing', compact('listings', 'categories', 'locations', 'amenities'));
    }

    function showListing(string $slug): View
    {

        $listing = Listing::with('category', 'amenities.amenity')->where(['status' => 1])->where('slug', $slug)->firstOrFail();

        $listing->increment('views');
        $openStatus = $this->listingScheduleStatus($listing);
        // $reviews = Review::with('user')->where(['listing_id' => $listing->id, 'is_approved' => 1])->paginate(10);

        $smellerListings = Listing::where('category_id', $listing->category_id)
            ->where('id', '!=', $listing->id)->orderBy('id', 'DESC')->take(4)->get();

        return view('frontend.pages.listing-view', compact('listing', 'smellerListings', 'openStatus'));
    }

    function listingScheduleStatus(Listing $listing): ?string
    {
        $openStatus = '';
        $day = ListingSchedule::where('listing_id', $listing->id)->where('day', Str::lower(date('l')))->first();
        if ($day) {
            $startTime = strtotime($day->start_time);
            $endTime = strtotime($day->end_time);
            if (time() >= $startTime && time() <= $endTime) {
                $openStatus = 'open';
            } else {
                $openStatus = 'close';
            }
        }
        return $openStatus;
    }
    public function dashboard(): View
    {
        return view('frontend.dashboard.index');
    }


    function checkout(string $id): View | RedirectResponse
    {

        $package = Package::findOrFail($id);
        /** store package id in session */
        Session::put('selected_package_id', $package->id);
        /** if package is free then direct place order */
        if ($package->type === 'free' || $package->price == 0) {
            $paymentInfo = [
                'transaction_id' => uniqid(),
                'payment_method' => 'free',
                'paid_amount' => 0,
                'paid_currency' => config('settings.site_default_currency'),
                'payment_status' => 'completed'
            ];

            CreateOrder::dispatch($paymentInfo);
            toastr()->success('Package subscribed successfully');
            return redirect()->route('user.dashboard');
        }

        return view('frontend.pages.checkout', compact('package'));
    }


    function blog(Request $request): View
    {
        $blogs = Blog::where('status', 1)->orderBy('id', 'Desc')
            ->when($request->has('search') && $request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('description', 'LIKE', '%' . $request->search . '%');
            })
            ->when($request->has('category') && $request->filled('category'), function ($query) use ($request) {
                $category = BlogCategory::select('id', 'slug')->where('slug', $request->category)->first();
                $query->where('blog_category_id', $category->id);
            })
            ->paginate(9);
        $categories = BlogCategory::where('status', 1)->get();
        return view('frontend.pages.blog', compact('blogs', 'categories'));
    }
    function blogShow(string $slug): View
    {
        $blog = Blog::with(['category'])->where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $popularBlogs = Blog::select(['id', 'title', 'slug', 'created_at', 'image'])->where('id', '!=', $blog->id)
            ->where('is_popular', 1)->orderBy('id', 'DESC')->take(5)->get();
        $categories = BlogCategory::withCount(['blogs' => function ($query) {
            $query->where('status', 1);
        }])->where('status', 1)->get();

        return view('frontend.pages.blog-show', compact('blog', 'categories', 'popularBlogs'));
    }

    function contactMessage(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:50'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'max:2000']
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        // Mail::to(config('settings.site_email'))->send(new ContactMail($request->name, $request->subject, $request->message));

        toastr()->success('Message Send Successfully!');

        return redirect()->back();
    }

    public function equipmentRentBooking(Request $request): RedirectResponse
    {

        if (!Auth::check()) {
            toastr()->error('Please login to book equipment!');
            return redirect()->back();
        }


        $request->validate([
            'customer_name' => ['required', 'string', 'max:200'],
            'customer_email' => ['required', 'email', 'max:50'],
            'customer_phone' => ['nullable', 'string', 'max:20'],
            'customer_message' => ['nullable', 'string', 'max:500'],
            'location' => ['required', 'string'],
        ]);

        $booking = new RentEquipmentBooking();
        $booking->customer_user_id = Auth::user()->id;
        $booking->equipment_id = $request->equipment_id;
        $booking->customer_name = $request->customer_name;
        $booking->customer_email = $request->customer_email;
        $booking->location = $request->location;
        $booking->customer_phone = $request->customer_phone;
        $booking->customer_message = $request->customer_message;
        $booking->save();

        toastr()->success('Equipment booking request sent successfully!');

        return redirect()->back();
    }
}
