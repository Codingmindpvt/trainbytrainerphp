<div class="tab-pane fade loop_for_data" id="Wed" role="tabpanel" aria-labelledby="home4-tab" data-type="wednesday">
    <div class="row append_wednesday_div div_scroll">
        @if (isset($schedules['wed']) && !empty($schedules['wed']) && count($schedules['wed']) > 0)
            @foreach ($schedules['wed'] as $value)
                <aside class="col-md-12 clone_wednesday_div">
                    <div class=" row borderHide">
                        <aside class="col-md-3">
                            <p class="tag-line">Class Name</p>
                            <div class="form-select">
                                <select class="form-input class_id" id="exampleFormControlSelect1">
                                    @if (isset($classes) && !empty($classes) && count($classes) > 0)
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}"   {{ $value->class_id == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}</option>
                                        @endforeach
                                    @endif

                                </select>
                            </div>
                        </aside>
                        <aside class="col-md-3 clock-box">
                            <p class="tag-line">From</p>
                            <input type="text" id="" class="form-control timepicker from_time from_time_class" value="{{ $value->from_time }}"
                                data-type="wednesday" placeholder="Select time">
                            <span class="wednesday_errors wednesday_from_time_error"></span>
                        </aside>

                        <aside class="col-md-3 clock-box ">
                            <p class="tag-line">To</p>
                            <input type="text" id="default-picker" class="form-control timepicker to_time " value="{{ $value->to_time }}"
                                data-type="wednesday" placeholder="Select time">
                            <span class="wednesday_errors wednesday_to_time_error"></span>

                        </aside>





                        <aside class="col-md-3 icons-view">
                          <i class="fa fa-check delete update "  data-sch_id = "{{ $value->id }}" style=" cursor: pointer; display:none;margin-left:-25px; color:#21ccac" data-id="{{ $value->id }}"></i>

                            <i class="fa fa-trash delete remove " style=" cursor: pointer;" data-id="{{ $value->id  }}"
                                aria-hidden="true"></i>
                                <i class="fa fa-pencil delete edit " data-val="{{ $value }}"  style=" cursor: pointer; margin-left:24px; color:#21ccac" data-id="{{ $value->id  }}"
                                    aria-hidden="true"></i>

                            <label class="switch">
                                <input type="checkbox" class="status" {{ $value->status == 1 ? 'checked' : '' }}>
                                <span class="slider round"></span>
                            </label>
                        </aside>

                    </div>
                </aside>
            @endforeach
        @else
            <aside class="col-md-12 clone_wednesday_div">
                <div class=" row">
                    <aside class="col-md-3">
                        <p class="tag-line">Class Name</p>
                        <div class="form-select">
                            <select class="form-input class_id" id="exampleFormControlSelect1">
                                @if (isset($classes) && !empty($classes) && count($classes) > 0)
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </aside>
                    <aside class="col-md-3 clock-box">
                        <p class="tag-line">From</p>
                        <input type="text" id="" class="form-control timepicker from_time from_time_class"
                            data-type="wednesday" placeholder="Select time">
                        <span class="wednesday_errors wednesday_from_time_error"></span>
                    </aside>

                    <aside class="col-md-3 clock-box ">
                        <p class="tag-line">To</p>
                        <input type="text" id="default-picker" class="form-control timepicker to_time "
                            data-type="wednesday" placeholder="Select time">
                        <span class="wednesday_errors wednesday_to_time_error"></span>

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


    <a href="" class="add-btn my-3 wednesday_add_more_button add_more_button" data-type="wednesday" style="font-size: 14px;
    display: -webkit-inline-box;"><span><i class="fa fa-plus" aria-hidden="true"></i></span>Add more</a>

</div>
