<div class="tab-pane fade show active loop_for_data" id="Sun" role="tabpanel" aria-labelledby="home1-tab"
    data-type="sunday">

    <style>
        .btn-disabled,
        .btn-disabled[disabled] {
            opacity: .4;
            cursor: default !important;
            pointer-events: none;
        }

    </style>
    <div class="row append_sunday_div div_scroll">


        @if (isset($schedules['sun']) && !empty($schedules['sun']) && count($schedules['sun']) > 0)

            @foreach ($schedules['sun'] as $value)

                <aside class="col-md-12 clone_sunday_div">
                    <div class="row borderHide" >
                        <aside class="col-md-3">
                            <p class="tag-line">Class Name</p>
                            <div class="form-select">
                                <select class="form-input class_id" id="exampleFormControlSelect1" name="class_id">
                                    @if (isset($classes) && !empty($classes) && count($classes) > 0)
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}"
                                                {{ $value->class_id == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </aside>

                        <aside class="col-md-3 clock-box">
                            <p class="tag-line">From</p>
                            <input type="text" id="" class="form-control timepicker from_time from_time_class"
                                data-type="sunday" placeholder="Select time" name="from_time"
                                value="{{ $value->from_time }}">
                            <span class="sunday_errors sunday_from_time_error"></span>
                        </aside>


                        <aside class="col-md-3 clock-box ">
                            <p class="tag-line">To</p>
                            <input type="text" id="default-picker" class="form-control timepicker to_time "
                                placeholder="Select time" data-type="sunday" name="to_time"
                                value="{{ $value->to_time }}">
                            <span class="sunday_errors sunday_to_time_error"></span>

                        </aside>




                        <aside class="col-md-3 icons-view">
                          <i class="fa fa-check delete update "  data-sch_id = "{{ $value->id }}" style=" cursor: pointer; display:none;margin-left:-25px; color:#21ccac" data-id="{{ $value->id }}"></i>
                            <i class="fa fa-trash delete remove " style=" cursor: pointer;"
                                data-id="{{ $value->id }}" aria-hidden="true"></i>
                            <i class="fa fa-pencil delete edit " data-val="{{ $value }}"
                                style=" cursor: pointer; margin-left:24px; color:#21ccac" data-id="{{ $value->id }}"
                                aria-hidden="true"></i>
                            <label class="switch">
                                <input type="checkbox"  class="status" {{ $value->status == 1 ? 'checked' : '' }} >
                                <span class="slider round"></span>
                            </label>



                        </aside>

                    </div>
                </aside>

            @endforeach
        @else
            <aside class="col-md-12 clone_sunday_div">
                <div class="row">
                    <aside class="col-md-3">
                        <p class="tag-line">Class Name</p>
                        <div class="form-select">
                            <select class="form-input class_id" id="exampleFormControlSelect1" name="class_id">
                                @if (isset($classes) && !empty($classes) && count($classes) > 0)
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">
                                            {{ $class->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </aside>

                    <aside class="col-md-3 clock-box">
                        <p class="tag-line">From</p>
                        <input type="text" id="" class="form-control timepicker from_time from_time_class"
                            data-type="sunday" placeholder="Select time" name="from_time"
                            value="">
                        <span class="sunday_errors sunday_from_time_error"></span>
                    </aside>


                    <aside class="col-md-3 clock-box ">
                        <p class="tag-line">To</p>
                        <input type="text" id="default-picker" class="form-control timepicker to_time "
                            placeholder="Select time" data-type="sunday" name="to_time" value="">
                        <span class="sunday_errors sunday_to_time_error"></span>

                    </aside>




                    <aside class="col-md-3 icons-view">
                        <i class="fa fa-trash delete remove " style="display: none; cursor: pointer;"
                            aria-hidden="true"></i>

                        <label class="switch">
                            <input type="checkbox" checked="" class="status">
                            <span class="slider round"></span>
                        </label>
                    </aside>

                </div>
            </aside>
        @endif


    </div>


    <a href="" class="add-btn my-3  sunday_add_more_button add_more_button" data-type="sunday" style="font-size: 14px;
    display: -webkit-inline-box;"><span><i class="fa fa-plus" aria-hidden="true"></i></span>Add more</a>
</div>