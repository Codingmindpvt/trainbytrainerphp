
<div class="tab-pane fade show active" id="home1" role="tabpanel" aria-labelledby="home1-tab">
    @php $details = $schedule_result['Sun'][0] ?? array(); @endphp

    @isset($details)
        @foreach ($details as $detail)
            @php
                $booking_status = $detail['booking']['status'] ?? '';

            @endphp
            <div class="row py-2">
                <aside class="col-md-3">
                    <h3><?php print_r($detail['class']['name']); ?></h3>
                    <p><?php print_r($detail['from_time']); ?> - <?php
                        print_r($detail['to_time']); ?></p>
                    <a class="text-left">@php print truncateString($detail['class']['description'] ?? '', 20, false) . "\n"; @endphp</a>
                </aside>

                <aside class="col-md-3">
                    <p style="font-weight: bold;">Seats Available</p>
                    <p class="attendee_limit_{{ $detail['id'] }}">@php print_r($detail['class']['attendees_limit']) ; @endphp</p>
                </aside>
                <aside class="col-md-3">
                    <p style="font-weight: bold;">Location</p>
                    <p> <i class="fa fa-map-marker" aria-hidden="true"></i> @php print_r($detail['class']['address']) ; @endphp
                    </p>
                </aside>
                <aside class="col-md-3">
                    <p class="error booking_error"></p>

                    @if (isset($detail['class']['attendees_limit']) && $detail['class']['attendees_limit'] > 0)
                        @if ($booking_status == 0)
                            <a class="blue-btn oswald-font my-3 text-light book_now book_value_{{ $detail['id'] }}"
                                data-id="{{ $detail['id'] }}"> Book Now </a>
                        @elseif($booking_status == 1)
                            <a class="blue-btn oswald-font my-3 text-light" data-id="{{ $detail['id'] }}">request
                                sent</a>
                        @else
                            <a class="blue-btn oswald-font my-3 text-light " data-id="{{ $detail['id'] }}"> Booked </a>
                        @endif
                    @endif



                </aside>
            </div>
        @endforeach

    @endisset


</div>
