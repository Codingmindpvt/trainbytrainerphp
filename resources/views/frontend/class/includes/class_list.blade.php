 <div class="view-box my-3">
     <div class="row view-area ">

         @if (isset($classes) && !empty($classes) && count($classes) > 0)
             @foreach ($classes as $class)
                 <aside class="col-md-1 view-box-area m-0 p-0">
                     @if (isset($class->image))
                         <img src="{{ asset('public/class/' . $class->image) }} " class="circuler">
                     @else
                         <img src="{{ asset('public/images/default.jpeg') }}" class="circuler">
                     @endif

                 </aside>
                 <aside class="col-md-3 view-box-area">
                     <p class="tag-line">Class Categories</p>
                     <input class="form-input" type="text" name="" value="{{ $class->category->title }}" disabled>
                 </aside>
                 <aside class="col-md-3 view-box-area">
                     <p class="tag-line">Class name</span></p>
                     <input class="form-input" type="text" name="" value="{{ $class->name }}" disabled>
                 </aside>
                 <aside class="col-md-2 view-box-area">
                     <p class="tag-line">Price<i class="fa fa-info-circle" data-toggle="tooltip" title="{{ isset($commission->commission_percent) ? $commission->commission_percent.'%' : ''}} Admin comission will
                                                                      be charged on this amount"></i></p>
                     <input class="form-input" type="text" name="text" value="{{ DEFAULT_CURRENCY.$class->price }}" disabled>
                 </aside>
                 <aside class="col-md-2 view-box-area">
                     <p class="tag-line">Action</p>
                     <input class="form-input" type="text" name=""
                         value="{{ $class->status == 1 ? 'Enable' : 'Disable' }}" disabled>
                 </aside>
                 <aside class="col-md-1 icons-view">
                     <button data-toggle="modal" data-target="#edit-data">
                         <i style="color:#002395;" data-class="{{ $class }}" class="fa fa-edit edit-icn edit_class" aria-hidden="true"></i>
                     </button>

                 </aside>
             @endforeach


         @endif



     </div>
 </div>
