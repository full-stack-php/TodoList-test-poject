@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row vh-100">
            <div  id="mainContent" class="col-12 col-md-12 col-lg-12 p-16 full-width">
                <h4 class="mb-12">Today</h4>
                <h6 class="text-muted mb-32">{{ $date }}</h6>

                <div class="task-item mb-8 p-12 bg-white shadow-sm rounded">
                    <div class="d-flex justify-content-start align-items-start">
                        <div class="form-check me-12">
                            <input class="form-check-input" type="checkbox">
                        </div>
                        <div class="d-flex flex-wrap flex-column justify-content-start">
                            <h6 class="form-check-label text-teal m-0">Meeting with Disha mam</h6>
                            <p class="text-gray">I have to join a meeting today at 7:00 PM to brainstorm</p>
                            <small class="text-muted"><i class="fa fa-clock me-4"></i>07:00 PM | <i class="fa fa-calendar me-4"></i>15 Nov ● Work ● Important</small>
                        </div>
                    </div>
                </div>

                <!-- Completed -->
                <h5 class="mt-5">Completed</h5>

                <div class="task-item mb-8 p-12 bg-white shadow-sm rounded">
                    <div class="d-flex justify-content-start align-items-start">
                        <div class="form-check me-12">
                            <input class="form-check-input" type="checkbox" checked disabled>
                        </div>
                        <div class="d-flex flex-wrap flex-column justify-content-start">
                            <h6 class="form-check-label m-0 text-muted">Meeting with Disha mam</h6>
                            <p class="text-muted">I have to join a meeting today at 7:00 PM to brainstorm</p>
                            <small class="text-muted"><i class="fa fa-clock me-4"></i>07:00 PM | <i class="fa fa-calendar me-4"></i>15 Nov ● Work ● Important</small>
                        </div>
                    </div>
                </div>


                <!-- Add Task Button -->
                <div class="fixed_btn_wrap text-center p-16">
                    <button class="btn btn-outline-main w-full" id="addTaskButton">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>

            </div>


            <div id="taskDetailsSidebar" class="d-flex flex-wrap flex-row p-4 bg-light right-sidebar right-sidebar--hidden">

                <form class="task_form d-flex flex-column justify-center p-12 h-auto w-full">
                    <h3 class="w-full mt-80">Edit Task</h3>
                    <div class="mb-3">
                        <label class="form-label mb-8 h6">Work</label>
                        <select class="form-control form-select h6 mb-0">
                            @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-8 h6">Priority</label>
                        <select class="form-control form-select h6 mb-0">
                            @foreach($flags as $flag)
                                <option value="{{ $flag['id'] }}">{{ $flag['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-8 h6">Title</label>
                        <input type="text" class="form-control" value="" placeholder="Design a to-do list app">
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-8 h6">Description</label>
                        <textarea class="form-control" rows="3" placeholder="I have to join a meeting today at 7:00 PM to brainstorm"></textarea>
                    </div>



                    <div class="mb-3 mt-32">
                        <div class="input-group d-flex align-items-center justify-content-between border_btm" id="date-picker" data-target-input="nearest">
                            <div class="d-flex align-items-center text-light-gray font-15 flex-grow-1 flex-shrink-1 flex-basis-auto">
                                <i class="fa fa-calendar me-4"></i>
                                <label data-target="#date-picker" data-toggle="datetimepicker" class="form-label m-0">Due Date</label>
                            </div>

                            <input type="text" class="form-control datetimepicker-input text-right border-0" data-target="#date-picker" placeholder="12/12/2024">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group d-flex align-items-center justify-content-between border_btm" id="time-picker" data-target-input="nearest">
                            <div class="d-flex align-items-center text-light-gray font-15 flex-grow-1 flex-shrink-1 flex-basis-auto">
                                <i class="fa fa-clock me-4"></i>
                                <label data-target="#time-picker" data-toggle="time-picker" class="form-label m-0">Due Time</label>
                            </div>

                            <input type="text" class="form-control datetimepicker-input text-right border-0" data-target="#time-picker" placeholder="12:00">
                        </div>
                    </div>
                    <div class="d-flex flex-row flex-wrap btn_wrap">
                        <button class="btn btn-success w-100 mb-12">Save</button>
                        <button class="btn btn-success w-100 btn-outline-main">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

@push('scripts')

@endpush