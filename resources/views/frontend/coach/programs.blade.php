@extends('layouts.guest')
@section('content')
<!-- coaches banner area start here -->
      <section class="coaches-banner">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-md-7">
                    <h5>Best programs for your growth.</h5>
                    <h1>Find Your Fitness Programs</h1>
                  </div>
                  <div class="col-md-5 text-right">
                      <img src="{{url('/')}}/public/images/coaches.png" alt="coach" class="img-fluid">
                  </div>
              </div>
          </div>
      </section>
      <div class="filter-show-box">
          <div class="container">
            <h6>Filters</h6>
            <p data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">+ Show Filters</p>
          </div>
      </div>

      <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <section class="filerts box-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="category-filter">
                                    <div class="cat-head">
                                        <h5>Category</h5>
                                        <input type="search" id="form1" class="form-control" placeholder="search"
                                        aria-label="Search" />
                                    </div>
                                    <hr>
                                    <div class="all-filter all-filter-height-box">
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Weight Loss</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Muscle Gain</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Body Building</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Cycling</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Yoga</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Swimming</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Suppliments</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Powerlifting</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Boxing</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Strength & Conditioning</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Crossfit</label>
                                        </div>
                                        <div class="custom-control custom-checkbox checkbox-area">
                                            <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                            <label class="custom-control-label" for="customCheckBox1">Barre</label>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="category-filter">
                                <div class="cat-head categories-heading">
                                    <h5>Price</h5>
                                </div>
                                <hr>

                                <div class="all-filter">
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                        <label class="custom-control-label" for="customCheckBox1">$0.00 - $100.00</label>
                                    </div>
                                    <div class="custom-control custom-checkbox checkbox-area">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                        <label class="custom-control-label" for="customCheckBox1">$100.00 and above</label>
                                    </div>
                                </div>
                            </div>

                            <div class="category-filter mt-4">
                                <div class="cat-head">
                                    <h5>Rating</h5>
                                </div>
                                <hr>
                                <div class="rating-filter">
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">4 Star & Up</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">3 Star & Up</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">2 Star & Up</label>
                                </div>
                                <div class="custom-control custom-checkbox checkbox-area">
                                    <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                    <label class="custom-control-label" for="customCheckBox1">1 Star & Up</label>
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr class="my-4">
                    <div class="add-filter">
                        <ul>
                            <li>Weight Loss <i class="fa fa-times" aria-hidden="true"></i></li>
                            <li>$0.00 - $100.00 <i class="fa fa-times" aria-hidden="true"></i></li>
                            <li>4 Star & Up <i class="fa fa-times" aria-hidden="true"></i></li>
                            <li class="Clear-Filter">Clear Filter</i></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
      </div>

      <section class="coaches-list">
          <div class="container">
              <div class="coaches-list-heading">
                 <h6> Coaches  {{@$coach_count}} </h6>
                 <p><i class="fa fa-heart" aria-hidden="true"></i> SAVED</p>
                 <div class="select-box" data-aos="fade-down">
                    <i class="fa fa-angle-down select-down" aria-hidden="true"></i>
                    <select class="custom-select-box custom-select-md filter-select">
                        <option selected>SORT BY</option>
                        <option value="1">SORT BY</option>
                      </select>
                </div>
              </div>
          </div>
      </section>

      <div class="container">
            <div class="row">
                 @forelse ( $programs as $item)
                <div class="col-md-4">



                <div class="program-one">

                        <div class="button-section">
                        <input type="hidden" id="program_id" value="{{@$item['id']}}">
                        <input type="hidden" id="coach_id" value="{{@$item['user_id']}}">
                        <input type="hidden" id="user_id" value="{{ ((Auth::check()) && !empty(Auth::user()->id)) ? Auth::user()->id : '' }}">
                        <input type="hidden" id="type" value="{{$wishList->isTypeProgram()}}">
                        @if(Auth::check() && Auth::user()->id)
                            @if(@$coach->getProgramWishList(@$item['id']))
                                <!-- <span class="view-save-bt-red "> -->
                                <span>
                                <span class="view-save-bt-red remove_from_wishlist">

                                    <i class="fa fa-heart" aria-hidden="true"></i> SAVED</span>
                                    </span>
                                    @else
                            <span>
                            <span id="wishList" class="view-save-bt add_to_wishlist">
                                <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                                </span>
                                @endif

                        @else
                        <span>
                            <span class="view-save-bt">
                                <i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>
                        </span>
                        @endif
                    </div>
                    <a href="{{ route('program-detail',$item->id) }}">
                        <div class="barbell-image">

                                @if(!empty(@$item->image_file))
                                <img src="{{asset('public/'.@$item->image_file) }}" class="img-circle profile_image_small"/>
                         @else
                                <img src="{{asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image_small"/>
                           @endif

                        </div>
                        <div class="barberll-content">
                            <div class="doller-review">
                                <h4>${{ @$item['price'] }}</h4>
                                <p class="review-rate"><i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> (1.2k Reviews)</p>
                            </div>
                            <h3>5 {{ ucfirst(@$item['program_name'])}}</h3>
                            <p>{{ucfirst(@$item['short_description'])  }}</p>
                        </div>
                    </a>
                    </div>

                </div>

                @empty
                <div class="blank-para">No Data Found!!</div>
                @endforelse

            </div>
        </div>

      </section>

   <!-- start pagination -->


      {{-- <nav aria-label="Page navigation example">
         <ul class="pagination">
            {{ $programs->links()}}
        </ul>
        </nav> --}}
        <div class="d-flex justify-content-center">

            {{ $programs->links()}}

        </div>


<!-- coaches banner area end here -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

  $(document).on('click', '.add_to_wishlist', function() {

    var thisData = $(this);
    var program_id = $(this).closest(".button-section").find("#program_id").val();
    var coach_id = $(this).closest(".button-section").find("#coach_id").val();
    var user_id = $(this).closest(".button-section").find("#user_id").val();
    var type = $(this).closest(".button-section").find("#type").val();
    $.ajax({
      url:"{{ route('add-to-wishlist') }}",
      data:{user_id:user_id, coach_id:coach_id, type:type ,program_id:program_id},
      type:'GET',
      success:function(data) {
        SwalOverlayColor();
        swal({
          title: data.status,
          text: data.message,
        })
        thisData.parent().html('<span class="view-save-bt-red remove_from_wishlist"><i class="fa fa-heart " aria-hidden="true"></i> SAVED</span>');

        // $(thisData).closest(".button-section").find("#wishList").remove();
        // location.reload();
      }
    });
  });
// Remove coache from wishlist   6/01/2022   by tarun saini
  $(document).on('click', '.remove_from_wishlist', function() {

    var thisData = $(this);
    var program_id = $(this).closest(".button-section").find("#program_id").val();
    var coach_id = $(this).closest(".button-section").find("#coach_id").val();
    var user_id = $(this).closest(".button-section").find("#user_id").val();
    var type = $(this).closest(".button-section").find("#type").val();
    $.ajax({
    url:"{{ route('remove-to-wishlist') }}",
    data:{user_id:user_id, coach_id:coach_id, type:type,program_id:program_id},
    type:'GET',
    success:function(data) {
        SwalOverlayColor();
        swal({
        title: data.status,
        text: data.message,
        })
        thisData.parent().html('<span id="wishList" class="view-save-bt add_to_wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i> SAVE</span>');

    }
    });
});

});
</script>
@endsection
