
<div class=" " id="collapseExample_show" style="display:none">
    <div class="card card-body">
        <section class="filerts box-area">
            <div class="container">
                <div class="row">
                    @include('frontend.coach_filter_tab.cards.category_filter_card')
                    <div class="col-lg-3 col-md-6">
                        @include('frontend.coach_filter_tab.cards.price_filter_card')
                        @include('frontend.coach_filter_tab.cards.gender_filter_card')
                        @include('frontend.coach_filter_tab.cards.rating_filter_card')
                    </div>

                    <div class="col-lg-3 col-md-6">
                        @include('frontend.coach_filter_tab.cards.country_filter_card')
                        @include('frontend.coach_filter_tab.cards.city_filter_card')
                    </div>


                    @include('frontend.coach_filter_tab.cards.personality_filter_card')

                </div>
                <hr class="my-4">
                @include('frontend.coach_filter_tab.cards.filter_buttons')
            </div>
        </section>
    </div>
</div>
