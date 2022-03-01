<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Confrmation</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <p>
                    Your session will be going to book. It will be billed automatically on the 25th of this month.
                </p>
            <input type="text" value="" class="actual_booking_date">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                <form action="{{ route('stripe-ideal') }}" method="post">
                    @csrf
                    <input type="hidden" value="1" name="price">
                    <input type="hidden" value="payment" name="type">
                    <input type="hidden" value="class_id" name="class_id" id="_class_id">
                    <input type="hidden" value="" name="sch_id" id="sch_id">
                    <button type="submit" class="btn btn-primary book_my_session">Book My Session</button>
                </form>
            </div>
        </div>
    </div>
</div>
