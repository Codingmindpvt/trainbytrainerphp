@extends('layouts.admin.inner')
@section('content')
    <!-- start content area here -->
    <div class="content_area">
        <div class="tables_area">
            <h2 class="pull-left">Program Listing</h2>
            <input type="search" class="searchBox" placeholder="Search Here">
            <div class="clear"></div>
            <div class="white_box">
                <div class="table-responsive">
                    <table width="100%" cellspacing="0" cellpadding="0" class='myDataTable'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i  = ($program->perPage() * ($program->currentPage() - 1)) + 1;
                            ?>
                            @foreach ($program as $serial_no => $programs)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if (!empty(@$programs->image_file))
                                            <img src="{{ asset('public/' . @$programs->image_file) }}"
                                                class="img-circle profile_image_small" />
                                        @else
                                            <img src="{{ asset('public/images/default-image-file-o.png') }}"
                                                class="img-circle profile_image_small" />
                                        @endif
                                    </td>
                                    <td>
                                        <h4> {!! isset($programs->program_name) ? $programs->program_name : '---' !!}</h4>
                                    </td>

                                    <td>
                                        <?php
                                        $string = $programs['description'];
                                        if (strlen($string) >= 1 && strlen($string) <= 399) {
                                            echo substr($string, 0, 399);
                                        }
                                        if (strlen($string) >= 399) {
                                            echo substr($string, 0, 399) . '<span class="read_more_class" style="color:blue;">Read More</span>' . '<span class="show_read_more_class" style="display:none;">' . substr($string, 399) . '</span>' . '<span class="show_less_class" style="color:blue; display:none;" style="color:blue;">Show Less</span>';
                                        }
                                        ?>
                                    </td>

                                    <td>{{ isset($programs->price) ? DEFAULT_CURRENCY . $programs->price : '-----' }}</td>
                                    <?php $reviewDetail = $programs->getReviewAndRatingDetail(@$programs['id']); ?>
                                    <td>
                                        <div class="review-rate mb-3">
                                            <div class="form-group col-md-2">
                                                <p class="tag-line"><?php
                                                $review = (object) ['rate' => $reviewDetail['avg_rating']];
                                                for ($i = 0; $i < 5; ++$i) {
                                                    echo '<i class="fa fa-star', $review->rate <= $i ? '-o' : '', '" aria-hidden="true"></i>';
                                                } ?></p>
                                            </div>
                                            <div class="rating">
                                                <?php $reviewDetail = $programs->getReviewAndRatingDetail(@$programs['id']); ?>
                                                @if (!empty($reviewDetail['avg_rating']))
                                                    <div class="rateyo"
                                                        data-rateyo-rating="{{ !empty(@$reviewDetail['avg_rating']) ? @$reviewDetail['avg_rating'] : 0 }}"
                                                        data-rateyo-num-stars="5"></div>
                                                @else
                                                    <div class="rateyo" data-rateyo-rating="0"
                                                        data-rateyo-num-stars="5"></div>
                                                @endif
                                           </div>
                                           {{--  ( {{ number_format($reviewDetail['avg_rating'],1)}} Reviews)  --}}
                                        </div>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    {{ $program->links() }}
                </div>
            </div>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(function() {


                $('.read_more_class').on('click', function() {
                    $(this).hide();
                    $(this).parent().find('.show_less_class').show();
                    $(this).parent().find('.show_read_more_class').toggle();
                });
                $('.show_less_class').on('click', function() {
                    $(this).parent().find('.read_more_class').show();
                    $(this).hide();
                    $(this).parent().find('.show_read_more_class').hide();
                });


            })
        </script>
        <script>
            $(function() {
                $(".rateyo").rateYo({
                    readOnly: true,
                    starWidth: "18px",
                    spacing: "2px",
                });
            });
        </script>
    @endsection
