@include('ServiceProviderPages.partials.header')


<main>
    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-dark mt-4 mx-4">Calendar of Appointments</h3>
        </div>
    </div>
    <hr class="bg-dark mx-3"/>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center mb-3">
            <div class="col-md-12 col-xl-10">
                <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div id="calendar">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        var appointment = @json($events);
        $('#calendar').fullCalendar({
            header: {
                right: 'prev, next today',
                center: 'title',
                left: 'none',
            },
            events: appointment,
            selectable: true,
            selectAllow: function (selectInfo) {
                var currentDate = new Date(); // Get the current date
                currentDate.setHours(0, 0, 0, 0); // Set hours, minutes, seconds, and milliseconds to 0 for accurate date comparison
                //currentDate.setDate(currentDate.getDate() + 1); // Set the current date to the day after the current date
                var selectedDate = selectInfo.start;
            
                return selectedDate >= currentDate;
            },
            selectHelper: true,
            defaultView: 'month',
            select: function(start, end, allDays, info){
                $('#appointmentModal').modal('toggle');

                $('#saveBtn').click(function(){
                    var start_date = moment(start).format('YYYY-MM-DD');
                    var end_date = moment(end).format('YYYY-MM-DD');
                    $('#start_date').val(start_date);
                    $('#end_date').val(end_date);

                    $('#form').submit();
                    
                });
            },
        });

        $('.fc-body tr td').css('cursor','pointer');
        $('.fc-content-skeleton table tbody').css('overflow-y','scroll');
        $('.fc-event').css('text-align','center');
        $('.fc-event').css('height','20px');
        $('.fc-title').css('white-space','nowrap');
        $('.fc-content').css('align-items','center');
        $('.fc-time').css('display','none');
        $('.fc-content').css('padding','0px 3px');
        $('.fc-content').css('text-align','left');
   
    </script>
</main



@include('ServiceProviderPages.partials.footer')