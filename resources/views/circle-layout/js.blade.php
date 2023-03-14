<script src="{{asset('theme/assets/plugins/jquery/jquery-3.4.1.min.js')}}"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="{{asset('theme/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{asset('theme/assets/plugins/perfectscroll/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('theme/assets/plugins/fullcalendar/main.min.js')}}"></script>
<script src="{{asset('theme/assets/js/main.min.js')}}"></script>
<script src="{{asset('theme/assets/js/pages/dashboard.js')}}"></script>

<script src="{{asset('theme/assets/plugins/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('theme/assets/js/pages/datatables.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',

            events: 'https://fullcalendar.io/demo-events.json?overload-day'
        });
        calendar.render();
    });
</script>
