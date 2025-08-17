 @foreach ($reviews as $review)
     <div class="card mb-3 shadow-sm border-0">
         <div class="card-body d-flex" style="align-items: start;">
             <span style="display: flex; align-items: center; gap: 0.3rem;">
               
                 @if ($review->user->avatar)
                     <img src="{{ asset($review->user->avatar) }}" class="rounded-circle  me-3" alt="User"
                         style="width: 50px; height: 50px;">
                 @else
                     <img src="{{ asset('images/figure-svgrepo-com.svg') }}" class="rounded-circle  me-3" alt="User"
                         style="width: 50px; height: 50px;">
                 @endif




                 <h6 class="mb-0">{{ $review->user->firstName }}</h6>
             </span>

             <div style="display: flex; flex-direction:column; margin-left: 5rem; gap: 0.3rem;">
                 <span>
                     <small class="text-warning">★ <span style="color: black">{{ $review->rating }}</span></small>
                     <small class="text-muted ms-2">Reviewed on {{ $review->created_at }}</small>
                 </span>
                 <p class="mt-2 mb-0 text-muted">
                     {{ $review->comment }}
                 </p>
             </div>
         </div>
     </div>
 @endforeach
