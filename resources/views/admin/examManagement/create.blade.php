@extends('layouts.master.admin')
@section('css')
    <!-- datatables css -->
    <link href="{{ URL::asset('assets/libs/year-calendar/jquery.bootstrap.year.calendar.css') }}" rel="stylesheet"
        type="text/css" />
    <style>
        table,
        td,
        th {
            vertical-align: middle !important;
        }

        table th {
            font-weight: bold;
        }

        .loading-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
        }

        .loading {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endsection
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="row justify-content-center">
        <h2>Create Exam day</h2>
    </div>
    <div class="loading-container">
        <div class="loading"></div>
    </div>
    <div class="container">
        <div class="your-calendar-element"></div>
    </div>

    <!-- Bootstrap Modal Form -->
    <div class="modal fade" id="examdayModal" tabindex="-1" role="dialog" aria-labelledby="examdayModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="examdayModalLabel">Create Exam Day</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="examdayForm" method="post" action="">
                    <div class="modal-body">
                        <input type="hidden" id="selectedDate" name="date" value="">

                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input type="text" class="form-control" id="notes" name="notes" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-right">
                            {!! Form::label('exam_name', 'Exam Name') !!}
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                {!! Form::select('exam_name', $exam_names, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('exam_name', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-right">
                            {!! Form::label('batchId', 'Batch Name') !!}
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                {!! Form::select('batchId', $batch, isset($item->batchId) ? $item->batchId : null, ['class' => 'form-control']) !!}

                                {!! $errors->first('batchId', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="saveExamdayBtn" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('assets/libs/year-calendar/jquery.bootstrap.year.calendar.js') }}"></script>
    <script>
        var is_response = false;
        var dbexamday = [];
        var csrfToken = "{{ csrf_token() }}";

        function makeApiRequest() {
            console.log('makeApiRequest called');
            $.ajax({
                method: 'GET',
                url: '/api/v1/getExamdays',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                    dbexamday = data.data;
                    is_response = true;
                    console.log('Exam Day Response:', data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error making API request:', textStatus, errorThrown);
                }
            });
        }

        function jqycGetMonthHTMLStringWithData(firstDay, month, year, days = 31) {

            // const holidays = [
            //     "2023-01-01",
            //     "2023-07-04",
            //     "2023-12-25"
            //   ];
            const examdays = dbexamday;
            data = dbexamday.map(({
                date
            }) => date)
            console.log("examdays count:", data);

            function isExamday(date) {
                const currentDate = new Date(date);
                const isExamDate = data.some(examday => {
                    const examdayDate = new Date(examday);
                    return examdayDate.getFullYear() === currentDate.getFullYear() &&
                        examdayDate.getMonth() === currentDate.getMonth() &&
                        examdayDate.getDate() === currentDate.getDate();
                });
                return isExamDate;
            }
            if (firstDay == 0) {
                firstDay = 7;
            }
            var monthHTMLString = "";
            var d = 1;
            var i = 1;

            while (d <= days) {
                if (i % 7 == 1) {
                    monthHTMLString += '<tr class="jqyc-tr jqyc-tbody-tr">';
                }
                var isWeekend = i % 7 === 5 || i % 7 === 6;
                var currentDate = new Date(year, month - 1, d);
                var isExamDate = isExamday(currentDate);
                if (i < firstDay) {
                    d--;
                    monthHTMLString += '<td class="jqyc-empty-td jqyc-td"></td>';
                } else {
                    var additionalClasses = isWeekend ? "jqyc-weekend" : (isExamDate ? "jqyc-examday" : "");

                    monthHTMLString +=
                        '<td class="jqyc-not-empty-td jqyc-td jqyc-day-' +
                        d +
                        " jqyc-day-of-" +
                        month +
                        "-month " +
                        additionalClasses +
                        '" data-month="' +
                        month +
                        '" data-day-of-month="' +
                        d +
                        '" data-year="' +
                        year +
                        '">' +
                        d +
                        " </td>";
                }

                if (i % 7 == 0) {
                    monthHTMLString += "</tr>";
                }
                i++;
                d++;
            }
            return {
                monthHTMLString: monthHTMLString,
                firstDayOfPreviousMonth: i % 7,
            };
        }

        function handleDateClick(element) {
            // alert('hell0')
            var dayOfMonth = element.getAttribute('data-day-of-month');
            var month = element.getAttribute('data-month');
            var year = element.getAttribute('data-year');

            var formattedDay = dayOfMonth.toString().padStart(2, '0');
            var formattedMonth = month.toString().padStart(2, '0');

            var fullDate = year + '-' + formattedMonth + '-' + formattedDay;

            $('#selectedDate').val(fullDate);

            $('#examdayModal').find('.modal-title').text('Add Exam day on ' + fullDate);
            $('#examdayModal').modal('show');

            $('#saveExamdayBtn').on('click', function() {
                var notes = $('#notes').val();
                var fullDate = $('#selectedDate').val();
                var exam_name = $('#exam_name').val();
                var batchId = $('#batchId').val();
                var url = "{{ route('examday_management.store') }}";
                var csrfToken = "{{ csrf_token() }}";
                // alert(csrfToken);
                $.ajax({
                    method: 'POST',
                    url: url,
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        date: fullDate,
                        notes: notes,
                        exam_name: exam_name,
                        batchId: batchId,
                    },
                    success: function(response) {
                        alert(response.message);
                        window.location.reload();
                        $('#examdayModal').modal('hide');
                    },
                    error: function(error) {
                        if (error.responseJSON && error.responseJSON.errors && error.responseJSON.errors
                            .date) {
                            var dateError = error.responseJSON.errors.date;
                            alert(dateError);
                            window.location.reload();
                        } else {
                            alert('Error occurred while saving the Exam Day.');
                        }
                        $('#examdayModal').modal('hide');
                    }
                });
            });
        }
        $(window).on("load", function() {
            $('.your-calendar-element').calendar();
            $('.loading').show();
            setTimeout(() => {
                $('.loading').hide();
                $('.your-calendar-element').calendar();
            }, 5000);

            $('.your-calendar-element').on('click', '.jqyc-not-empty-td', function() {
                handleDateClick(this);
            });
            makeApiRequest();
        });
    </script>
@endsection
