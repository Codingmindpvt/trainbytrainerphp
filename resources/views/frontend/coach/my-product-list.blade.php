@extends('layouts.guest')
@section('content')
<!--start varification div area here -->

@include('frontend.nav._alertSection')

<!--end varification div area here -->

<!--start banner area here -->
<section class="common-light-header">
    <div class="container">
        <div class="popular-box text-center">
            <h1 class="oswald-font">Hi, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}!</h1>
            <span class="divide-line"></span>
            {{-- <p class="oswald-font light-text">View and Manage Product List details here</p> --}}
        </div>
    </div>
</section>
<!--end banner area here -->

<!--start my profile no date area here-->
<section class="marketplace-section">
    <div class="container">
        <div class="row">
            <aside class="col-lg-4">
                @if (Auth::check() && Auth::user()->role_type == 'C')
                <!-- start coach sidebar here -->

                @include('frontend.nav._coachSideBar')

                <!-- end coach sidebar here -->
                @else
                <!-- start sidebar here -->

                @include('frontend.nav._sidebar')

                <!-- end sidebar here -->
                @endif
            </aside>

            <aside class="col-lg-8 marketplace-main-box">
                <div class="marketplace-header">
                    <h3 class="oswald-font">My Products List</h3>
                </div>
                @if (count($coachPrograms) > 0)
                <div class=" name-date-box-area">
                    <div class="row">
                        <div class="col-md-3">
                            <form id  ="searchProductList" class="product-search" action="{{ route('searchProductList') }}" method="GET">
                                <input type="text" class="form-control" placeholder="Search By Name" name="search" required />
                                <button type="submit" class="search-btn-icn"></button>
                                <i class="fa fa-search search-icon" aria-hidden="true"></i>
                            </form>
                        </div>
                        {{-- <div class="col-md-3">
                                    <i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="From">
                                </div>
                                <div class="col-md-3">
                                    <i class="fa fa-calendar  select-angle-calender" aria-hidden="true"></i>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="To">
                                </div>
                                <div class="col-md-3">
                                    <i class="fa fa-angle-down select-angle-product" aria-hidden="true"></i>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option>All</option>
                                        <option>2</option>
                                    </select>
                                </div>  --}}
                    </div>
                </div>
                <div class="coach-product-list-table">
                    <div class="table-responsive cart-table-box">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE & PRODUCT</th>
                                    <th scope="col">TYPE</th>
                                    {{-- <th scope="col">STATUS</th>  --}}
                                    <th scope="col">Qty. Sold</th>
                                    <th scope="col">Earned</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @forelse($coachPrograms as $program)
                                <tr>
                                    <td>
                                        <div class="image-product-tb">

                                            @if (!empty(@$program['image_file']))
                                            <img src="{{ asset('public/' . @$program->image_file) }}" class="img-circle profile_image_small" />
                                            @else
                                            <img src="{{ asset('public/images/default-image-file-o.png') }}" class="img-circle profile_image_small" />
                                            @endif

                                            <div>
                                                <h3>{{ ucwords($program['program_name']) }}</h3>
                                                <p>{{ DEFAULT_CURRENCY.$program['price'] }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Program</td>
                                    {{-- <td>Enable</td>  --}}
                                    <td>-----</td>
                                    <td>-----</td>
                                    <td class="delete-cart"><a href="{{ route('program-view', $program['id']) }}"><i class="fa fa-eye edit-pencil-new" aria-hidden="true"></i></a>
                                        &nbsp
                                        <a href="{{ route('my-product-delete', $program['id']) }}"><i class="fa fa-trash" onclick="return confirm('Are you sure you want to delete this record?')" aria-hidden="true"></i></a>
                                        {{-- <a href="{{ route('edit-program', $program['id']) }}"><i class="fa fa-pencil edit-pencil-new" aria-hidden="true"></i></a> --}}
                                    </td>
                                </tr>
                                @empty
                                @endforelse

                            </tbody>

                        </table>
                    </div>
                    {{$coachPrograms->links()}}
                    <!-- <div class="pagination-count-box">
           <p>6 item(s)</p>
            <span><i class="fa fa-angle-down select-angle-product" aria-hidden="true"></i>
             <select class="form-control" id="exampleFormControlSelect1">
              <option>All</option>
              <option>2</option>
             </select>
            </span>
            <p>per page</p>
            <nav aria-label="Page navigation example">
             <ul class="pagination">
             <li class="page-item"><a class="page-link" href="#">&#60</a></li>
             <li class="page-item"><a class="page-link active" href="#">1</a></li>
             <li class="page-item"><a class="page-link" href="#">&#62</a></li>
             </ul>
            </nav>
          </div> -->
                </div>
                @else
                <p class="blank-para">No Product Here!!</p>
                @endif
            </aside>
        </div>
    </div>
</section>
@section('scripts')
<script>
    $( "#search_product_list" ).keyup(function() {
   $.ajax({
        url: "{{ route('searchProductList') }}",
        data: {keyword: search},
        type: 'GET',
        success: function(data){
			// $('#result').html(data);
            console.log(search);
		}
        // success: function(data) {
        //     SwalOverlayColor();
          
        //     thisData.parent().html(
        //         '<span class="view-save-bt add_to_wishlist"><i class="fa fa-heart-o" aria-hidden="true"></i>SAVE</span>'
        //     );

        // }
    });
  
    
});


</script>


@endsection
<!--ends my profile no date area here-->
@endsection
