<div class="modal fade" id="invalidModal" tabindex="-1" role="dialog" aria-labelledby="invalidModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invalidModalLabel"></h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <p>There is no billing account linked with this account. To Book, kindly add your bank account first.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                <form action="{{ route('stripe-ideal') }}" method="post">
                    @csrf
                    <input type="hidden" value="1" name="price">
                    <input type="hidden" value="payment" name="type">
                    <input type="hidden" value="class_id" name="class_id" id="_class_id">
                    <button type="submit" class="btn btn-primary add_my_account">Add my Account</button>
                </form>
            </div>
        </div>
    </div>
</div>
