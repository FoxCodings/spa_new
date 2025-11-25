@extends('app')
@section('css')
    <!-- slick css -->
    <link rel="stylesheet" href="{{asset('assets/vendor/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/slick/slick-theme.css')}}">
@endsection
@section('content')
<div class="container-fluid">

    <div class="row m-1 calendar app-fullcalender">
        <!-- Draggable Events start -->
        <div class="col-xxl-4">
            <div class="row">
                <!-- <div class="col-md-6 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Draggable Events</h5>
                        </div>
                        <div class="card-body ">
                            <div id='events-list'>
                                <div class='list-event event-primary' data-class="event-primary"><i
                                        class="ti ti-briefcase"></i> Meeting Time</div>

                                <div class='list-event event-success' data-class="event-success"><i class="ti ti-photo"></i>
                                    Holiday</div>

                                <div class='list-event event-warning' data-class="event-warning"><i class="ti ti-plane"></i>
                                    Tour Event Planning</div>

                                <div class='list-event event-info' data-class="event-info"><i class="ti ti-cake"></i> Birthday
                                    Event</div>

                                <div class='list-event event-secondary' data-class="event-secondary"><i
                                        class="ti ti-glass-full"></i> Lunch Breck</div>

                                <div class="form-check calendar-remove-check ps-0">
                                    <input class="form-check-input mg-2" type="checkbox" id='drop-remove'>
                                    <label class="form-check-label" for="drop-remove">
                                        Remove After Drop
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="col-md-6 col-xxl-12">
                  <div id='events-list'></div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Lista de Citas del Mes</h5>
                        </div>
                        <div class="card-body">
                            <div class="event-container slider">
                                <div class="event-box">
                                    <h6 class="mb-0">International Women's Day</h6>
                                    <p class="mb-0 text-secondary f-s-13">
                                        Celebrated to recognize the social and political achievements of women.
                                    </p>

                                    <p class="f-s-13 text-end mb-0">
                                        <i class="ti ti-calendar-event me-1"></i>08 Mar 2024
                                    </p>
                                </div>

                                <div class="event-box">
                                    <h6 class="mb-0">World Book Day</h6>
                                    <p class="mb-0 text-secondary f-s-13">
                                        Celebrated to promote reading, publishing, and copyright, although in the US
                                    </p>
                                    <p class="f-s-13 text-end mb-0">
                                        <i class="ti ti-calendar-event me-1"></i>23 apr 2024
                                    </p>
                                </div>

                                <div class="event-box">
                                    <h6 class="mb-0">World Refugee Day</h6>
                                    <p class="mb-0 text-secondary f-s-13">
                                        Observed to honor the courage and resilience of refugees.
                                    </p>
                                    <p class="f-s-13 text-end mb-0">
                                        <i class="ti ti-calendar-event me-1"></i>20 Jun 2024
                                    </p>
                                </div>

                                <div class="event-box">
                                    <h6 class="mb-0">World Humanitarian Day</h6>
                                    <p class="mb-0 text-secondary f-s-13">
                                        A day to recognize humanitarian personnel and those who have lost their lives working
                                    </p>
                                    <p class="f-s-13 text-end mb-0">
                                        <i class="ti ti-calendar-event me-1"></i>19 Aug 2024
                                    </p>
                                </div>

                                <div class="event-box">
                                    <h6 class="mb-0">International Day of Peace</h6>
                                    <p class="mb-0 text-secondary f-s-13">
                                        World Braille Day is an international day on 4 January.!
                                    </p>
                                    <p class="f-s-13 text-end mb-0">
                                        <i class="ti ti-calendar-event me-1"></i>21 sep 2024
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Draggable Events end -->
        <div class="col-xxl-8">
            <div class="card">
                <div class="card-body" id="mydraggable">
                    <div id='calendar' class="app-calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog app_modal_sm">
        <div class="modal-content">
            <div class="modal-header bg-primary-800">
                <h1 class="modal-title fs-5 text-white" id="exampleModal2">Agregar Cita</h1>
                <button type="button" class="fs-5 border-0 bg-none  text-white" data-bs-dismiss="modal"
                        aria-label="Close"><i class="fa-solid fa-xmark fs-3"></i></button>
            </div>
            <div class="modal-body text-center">
              <form class="row g-3 app-form" id="form-validation">
                  <div class="col-md-6">
                      <label for="userName" class="form-label">User Name</label>
                      <input type="text" class="form-control" id="userName" name="userName">
                      <div class="mt-1">
                          <span id="userNameError" class="text-danger"></span>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <label for="email" class="form-label">Dia</label>
                      <input type="email" class="form-control" id="email">
                      <div class="mt-1">
                          <span id="emailError" class="text-danger"></span>
                      </div>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary"
                        data-bs-dismiss="modal">Cerrar</button>
                <button type="button" onclick="GuardarCita()" class="btn btn-light-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <!--customizer-->
    <div id="customizer"></div>

    <!-- slick-file -->
    <script src="{{asset('assets/vendor/slick/slick.min.js')}}"></script>

    <!-- fullcalendar js -->
    <script src="{{asset('assets/vendor/fullcalendar/global.js')}}"></script>

    <!-- calendar js -->


    <script type="text/javascript">
    //  **------calender **

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');


        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          navLinks: true,
          editable: true,
          dayMaxEvents: true,
          locale: 'es',
          headerToolbar: {
            left: 'addEventButton',
            center: 'title',
            //right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek',
          },
          customButtons: {
            addEventButton: {
              text: 'Agregar Cita',
              click: function() {
                $('#exampleModal').modal('show');
                // var dateStr = prompt('poner la fecha in YYYY-MM-DD format');
                // var date = new Date(dateStr + 'T00:00:00');
                //
                // if (!isNaN(date.valueOf())) {
                //   calendar.addEvent({
                //     title: 'dynamic event',
                //     start: date,
                //     allDay: true
                //   });
                //   alert('Great. Now, update your database...');
                // } else {
                //   alert('Invalid date.');
                // }
              }
            }
          },
          events: [
            {
              title: 'Holiday',
              start: '2025-11-01',
              end: '2025-11-02',
              color:'#26C450',
              className: "event-success",
            },
            {
              title: 'Meeting',
              start: '2025-11-09',
              className: "event-primary",
            },
            {
              title: 'Meeting',
              start: '2025-11-15',
              className: "event-primary",
            },
            {
              title: 'Tour',
              start: '2025-11-18',
              end: '2025-11-21',
              className: "event-warning",
            },
            {
              title: 'Lunch',
              start: '2025-11-30',
              end: '2025-11-31',
              color:' #F09E3C',
              className: "event-secondary",
            },
            {
              title: 'Meeting',
              start: '2025-11-12T10:30:00',
              end: '2025-11-12T12:30:00'
            },
            {
              title: 'Lunch',
              start: '2025-11-12T12:00:00'
            },
            {
              title: 'Meeting',
              start: '2025-11-12T14:30:00'
            },
            {
              title: 'Happy Hour',
              start: '2025-11-12T17:30:00'
            },
            {
              title: 'Dinner',
              start: '2025-11-12T20:00:00'
            },
            {
              groupId: 'availableForMeeting',
              start: '2025-11-11T10:00:00',
              end: '2025-11-11T16:00:00',
              display: 'background',
            },
            {
              groupId: 'availableForMeeting',
              start: '2025-11-13T10:00:00',
              end: '2025-11-13T16:00:00',
              display: 'background'
            },
          ],
          eventClick:function(){
            $('#exampleModal').modal('show');
          },
          selectable: true,
          selectMirror: true,
          select: function (arg) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.addEvent({
                title: title,
                start: arg.start,
                end: arg.end,
                allDay: arg.allDay
              })
            }
            calendar.unselect()
          },

          droppable: true,
          drop: function (arg) {
            if (document.getElementById('drop-remove').checked) {

              arg.draggedEl.parentNode.removeChild(arg.draggedEl);
            }
          }
        })

        var containerEl = document.getElementById('events-list');
        new FullCalendar.Draggable(containerEl, {
          itemSelector: '.list-event',
          eventData: function (eventEl) {
            return {
              title: eventEl.innerText.trim(),
              start: new Date,
              className: eventEl.getAttribute("data-class")
            }
          }
        });


        calendar.render();
      });

    // **------ slider js**

    $('.slider').slick({
      dots: false,
      speed: 1000,
      slidesToShow: 3,
      centerMode: true,
      arrows: false,
     vertical: true,
     verticalSwiping: true,
     focusOnSelect: true,
     autoplay: true,
     autoplaySpeed: 1000,
    });

    // $('.moreless-button').click(function() {
    //   $('.moretext').slideToggle();
    //   if ($('.moreless-button').text() == "Read more") {
    //     $(this).text("Read less")
    //   } else {
    //     $(this).text("Read more")
    //   }
    // });
    </script>

@endsection
