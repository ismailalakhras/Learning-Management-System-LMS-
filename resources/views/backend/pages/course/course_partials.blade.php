  @foreach ($courses as $course)
      <div data-id="{{$course->id}}" class="backend-course-card" style="cursor: pointer">
          <div class="chips">
              <div class="chip-text">Free</div>
          </div>
          <div class="frame-7">
              <div class="text-wrapper-2">{{ $course->title }}</div>
              <img class="line" src="https://c.animaapp.com/meilzjuc7hm2I8/img/line-54.svg" />
              <div class="frame-8">
                  <div class="frame-9">
                      <div class="frame-10">
                          <div class="text-wrapper-2">${{ $course->price }}</div>
                          <div class="text-wrapper-3">Price</div>
                      </div>
                      <div class="frame-10">
                          <div class="text-wrapper-2">---</div>
                          <div class="text-wrapper-3">Certificates</div>
                      </div>
                  </div>
                  <div class="frame-9">
                      <div class="frame-10">
                          <div class="text-wrapper-4">{{ $course->lessons->count() }}</div>
                          <div class="text-wrapper-5">Chapters</div>
                      </div>
                      <div class="frame-10">
                          <div class="text-wrapper-2">{{ $course->reviews->count() }}</div>
                          <div class="text-wrapper-3">Reviews</div>
                      </div>
                  </div>
                  <div class="frame-9">
                      <div class="frame-10">
                          <div class="text-wrapper-4">---</div>
                          <div class="text-wrapper-5">Orders</div>
                      </div>
                      <div class="frame-10">
                          <div class="text-wrapper-2">---</div>
                          <div class="text-wrapper-6">Added to Shelf</div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endforeach


                <div class="pagination-category d-flex justify-content-center mt-4" id="pagination-links">
                    {{ $courses->links('pagination::bootstrap-5') }}
                </div>
  
