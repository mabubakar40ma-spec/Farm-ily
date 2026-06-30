 <section class="equipment-section">
     <div class="container-fluid">
         <div class="text-center mb-5">
             <img src="{{ asset('frontend/images/icons/heading-icon.svg') }}" alt="Logo" class="section-logo mb-2">
             <h2 class="fw-bold">Equipment On Rent</h2>
             <p class="text-muted">Affordable Solutions for Your Farming Needs</p>
         </div>

         <div class="row">
             <!-- Equipment 1: Heavy-Duty Tractor -->
             @foreach ($equipments as $equipment)
                 <!-- Equipment Card -->
                 <div class="col-xxl-3 col-md-6 col-xl-6 mb-4">
                     <div class="card equipment-card shadow-sm">
                         @if ($equipment->is_available == 1)
                             <div class="status-tag available">● Available</div>
                         @else
                             <div class="status-tag booked">● Not Available </div>
                         @endif
                         <img src="{{ asset($equipment->image) }}" alt="Heavy-Duty Tractor" class="card-img-top">
                         <div class="card-body">
                             <h5 class="card-title">{{ truncate($equipment->title) }}</h5>
                             <p class="card-text text-muted">
                                 <img src="{{ asset('frontend/images/icons/location-icon.svg') }}" alt="location">
                                 {{ $equipment->location->name }}
                             </p>
                             <h5 class="card-feat-title">By - {{ $equipment->user->name }}</h5>
                             <p class="card-text">{{ $equipment->description }}</p>
                             <h5 class="card-feat-title">Features :</h5>
                             <ul class="features-list">
                                 {!! $equipment->feature !!}
                             </ul>
                             <p class="price">Price: <strong>${{ $equipment->price_per_day }}/day</strong> |
                                 <strong>${{ $equipment->price_per_day }}/week</strong>
                             </p>
                             <a href="{{ route('equipment') }}" class="btn rent-btn" data-bs-toggle="modal"
                                 data-bs-target="#rentModal{{ $equipment->id }}">Rent Now</a>
                         </div>
                     </div>
                 </div>
             @endforeach
             {{-- <div class="col-xxl-3 col-md-6 col-xl-6 mb-4">
                 <div class="card equipment-card shadow-sm">
                     <div class="status-tag available">● Available</div>
                     <img src="{{ asset('frontend/images/equip-01.webp') }}" alt="Heavy-Duty Tractor"
                         class="card-img-top">
                     <div class="card-body">
                         <h5 class="card-title">Heavy-Duty Tractor</h5>
                         <p class="card-text">Perfect for large-scale farming, ensuring efficiency and power for
                             all your plowing and tilling needs.</p>
                         <h5 class="card-feat-title">Features :</h5>
                         <ul class="features-list">
                             <li>120 HP engine.</li>
                             <li>GPS-enabled for precision farming.</li>
                             <li>Fuel-efficient and eco-friendly.</li>
                         </ul>
                         <p class="price">Price: <strong>$150/day</strong> | <strong>$1000/week</strong></p>
                         <p class="default-note"><span class="note">* Free </span> delivery within 50 miles.
                         </p>
                         <a href="#" class="btn rent-btn">Rent Now</a>
                     </div>
                 </div>
             </div> --}}

             {{-- <!-- Equipment 2: Combine Harvester -->
             <div class="col-xxl-3 col-md-6 col-xl-6 mb-4">
                 <div class="card equipment-card shadow-sm">
                     <div class="status-tag booked">● Booked Until Oct 15</div>
                     <img src="{{ asset('frontend/images/equip-02.webp') }}" alt="Combine Harvester"
                         class="card-img-top">
                     <div class="card-body">
                         <h5 class="card-title">Combine Harvester</h5>
                         <p class="card-text">Designed for quick and efficient harvesting of wheat, rice, and
                             other crops.</p>
                         <h5 class="card-feat-title">Features :</h5>
                         <ul class="features-list">
                             <li>Cuts, threshes, and cleans in one go.</li>
                             <li>Adjustable settings for different crops.</li>
                             <li>Low maintenance and high durability.</li>
                         </ul>
                         <p class="price"><strong>Price:</strong> $300/day | $2000/week</p>
                         <p class="default-note">* Includes operator training.</p>
                         <a href="#" class="btn rent-btn">Rent Now</a>
                     </div>
                 </div>
             </div>

             <!-- Equipment 3: Irrigation System -->
             <div class="col-xxl-3 col-md-6 col-xl-6 mb-4">
                 <div class="card equipment-card shadow-sm">
                     <div class="status-tag available">● Available</div>
                     <img src="{{ asset('frontend/images/equip-03.webp') }}" alt="Irrigation System"
                         class="card-img-top">
                     <div class="card-body">
                         <h5 class="card-title">Irrigation System</h5>
                         <p class="card-text">Automate your watering process with this state-of-the-art
                             irrigation system.</p>
                         <h5 class="card-feat-title">Features :</h5>
                         <ul class="features-list">
                             <li>Covers up to 5 acres.</li>
                             <li>Saves water with smart sensors.</li>
                             <li>Easy to install and operate.</li>
                         </ul>
                         <p class="price"><strong>Price:</strong> $50/day | $300/week</p>
                         <p class="default-note"><span class="note">* Free </span> setup assistance.</p>
                         <a href="#" class="btn rent-btn">Rent Now</a>
                     </div>
                 </div>
             </div>

             <!-- Equipment 4: Seed Drill Machine -->
             <div class="col-xxl-3 col-md-6 col-xl-6 mb-4">
                 <div class="card equipment-card shadow-sm">
                     <div class="status-tag available">● Available</div>
                     <img src="{{ asset('frontend/images/equip-04.webp') }}" alt="Seed Drill Machine"
                         class="card-img-top">
                     <div class="card-body">
                         <h5 class="card-title">Seed Drill Machine</h5>
                         <p class="card-text">Ensure precise seed placement and optimal crop growth with this
                             advanced seed drill.</p>

                         <h5 class="card-feat-title">Features :</h5>
                         <ul class="features-list">
                             <li>Suitable for wheat, maize, and soybeans.</li>
                             <li>Adjustable seed rate and depth.</li>
                             <li>Durable and easy to maintain.</li>
                         </ul>
                         <p class="price"><strong>Price:</strong> $80/day | $500/week</p>
                         <p class="default-note">* Includes free maintenance.</p>
                         <a href="#" class="btn rent-btn">Rent Now</a>
                     </div>
                 </div>
             </div> --}}
         </div>

         <!-- View All Button -->
         <div class="text-center mt-4">
             <a href="{{ route('equipment') }}" class="btn custom-btn-color btn-lg mt-3">View All</a>
         </div>
     </div>
 </section>
