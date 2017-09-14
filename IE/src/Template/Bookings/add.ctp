<html>
<head>
    <?= $this->Html->script('/fullcalendar-3.1.0/lib/jquery.min.js') ?>
    <?= $this->Html->script('/fullcalendar-3.1.0/lib/moment.min.js') ?>
    <?= $this->Html->script('/fullcalendar-3.1.0/fullcalendar.js') ?>
    <?= $this->Html->script('/fullcalendar-3.1.0/gcal.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->css('/fullcalendar-3.1.0/fullcalendar.css') ?>
    <?= $this->Html->css('/fullcalendar-3.1.0/fullcalendar.print.css',['media'=>'print']) ?>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="work-title wow fadeIn">
                <h2>Book an appointment</h2>
                <h5>Please follow the following instructions in order</h5>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            Step 1: Fill in your information
                        </h3>
                        <?= $this->Form->create($booking,['novalidate'=>true]) ?>
                        <fieldset>
                            <p>
                                <?= $this->Form->input('name', ['required' => true]) ?>
                            </p>
                            <p>
                                <?= $this->Form->input('email', ['required' => true]) ?>
                            </p>
                            <p>
                                <?= $this->Form->input('confirm_email', ['required' => true]) ?>
                            </p>
                            <p>
                                <?= $this->Form->input('phone', ['required' => true]) ?>
                            </p>
                                <p>

                                    <label>Visa Type</label>
                                    <?= $this->Form->select(
                                        'visatype',$categories); ?>
                                </p>

                            <?= $this->Form->input('start', ['type'=>'hidden', 'id' => 'startTime','required' => true]) ?>
                            <?= $this->Form->input('end', ['type'=>'hidden', 'id' => 'endTime','required' => true]) ?>
                            <?= $this->Form->input('status', ['type'=>'hidden','default' => 'upcoming']) ?>
                            <?= $this->Form->input('reason',['type' => 'textarea','label'=>'Reason for appointment','style'=>'width:300px;']) ?>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <div class="work wow fadeInUp" style="margin:-15px auto;">
                        <h3 style="background-color:#337ab7; color:white;">
                            Step 2: Select Consultant
                        </h3>
                        <p>
                            <label>Consultant</label>
                            <?= $this->Form->select(
                                'consultant',$longName
                                ,['id' => 'selectedAdmin']
                            ); ?>
                        </p>
                     </div>
                </div>
            </div>
            <div class="col-md-7" align="center">
                <div class="work wow fadeInUp" style="width: 100%; height: 100%">
                    <h3 style="background-color:#337ab7; color:white;"><i class="fa fa-map-marker"></i>
                        Step 3: Select the time
                    </h3>
                    <div id='calendar' style="width: 500px"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline btn-primary','style'=>'width:130px','id'=>'submitBtn']) ?>
        <?= $this->Form->end() ?>
    </div>
</body>
<style>
    label{
        display: inline-block;
        width: 100px;
        text-align: right;
    }

    input {
        display: inline-block;
        width: 250px;
    }

    select{
        display: inline-block;
        width: 230px;
    }

    body {
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

    .fc-unthemed td.fc-today {
        background: #ffff1a;
        border-color: #ffff1a;
    }

    .fc-past{
        background: #b30000;
        border-color: #b30000;
    }

    .fc-month-view .fc-event-container{
        display: none;
    }

    /*.fc-content{*/
        /*background: #b30000;*/
        /*border-color: #b30000;*/
    /*}*/

    .fc-scroller {
        overflow-y: hidden !important;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        var submitBtn = document.getElementById("submitBtn");
        $('#selectedAdmin').change(function(e){
            var e = document.getElementById("selectedAdmin");
            var value = e.options[e.selectedIndex].value;
            var selectedAdmin = e.options[e.selectedIndex].text;
            var calendarAPI;
            var calendarID;
            var calendar = <?php echo json_encode($calendar); ?>;
            for (var index = 0; index < calendar.length; ++index) {
                if (calendar[index]['longName']=== selectedAdmin){
                    calendarAPI=calendar[index]['calendarAPI'];
                    calendarID=calendar[index]['calendarID'];
                };
            }
            generateCalendar(calendarAPI, calendarID);
        }).change();
    });

    function generateCalendar(calendarKey, calendarID) {
        var currentDate = new Date();
        $('#calendar').fullCalendar('destroy');
        $('#calendar').fullCalendar({
            googleCalendarApiKey: calendarKey,
            events: {
                googleCalendarId: calendarID,
            },
            weekends: false,
            editable: false,
            selectable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaDay'
            },
            minTime:"10:00:00",
            maxTime:"16:00:00",
            eventColor:'#b30000',
            allDaySlot: false,
            disableDragging : true,
//            navLinks: true,
            selectHelper: true,
            defaultView: 'month',
            dayClick: function( date, jsEvent, view) {
                if (view.name === "month") {
                    if(date < moment()){
                        //do nothing (so cannot be selected)
                    }
                    else{
                        $('#calendar').fullCalendar('changeView', 'agendaDay');
                        $('#calendar').fullCalendar('gotoDate', date);
                    }

                }
            },
            eventClick: function(calEvent, jsEvent, view) {
                if (event.url) {
                    return false;
                }
                window.alert("We are busy at this time..");
            },
            dayRender: function(date, cell){
                if (date < currentDate){
                    $(cell).addClass('disabled');
                }
            },
            viewRender: function(view){
                if (view.start < currentDate){
                    $('#calendar').fullCalendar('gotoDate', currentDate);
                }
                var now = new Date();
                var end = new Date();
                end.setMonth(now.getMonth() + 2); //Adjust as needed

                if ( end < view.end) {
                    $("#calendar .fc-next-button").hide();
                    return false;
                }
                else {
                    $("#calendar .fc-next-button").show();
                }

                if ( view.start < now) {
                    $("#calendar .fc-prev-button").hide();
                    return false;
                }
                else {
                    $("#calendar .fc-prev-button").show();
                }
            },
            select: function(start, end, jsEvent, view) {
                if(view.name === "agendaDay"){
                    var submitBtn = document.getElementById("submitBtn");
                    var now = new Date();
                    var twomonths = new Date();
                    twomonths.setDate(now.getDate() + 31); //Adjust as needed
                    if ( twomonths < view.end)
                        $("#calendar .fc-next-button").hide();
                        return false;
                    }
                    else {
                        $("#calendar .fc-next-button").show();
                    }

                    if ( view.start < now) {
                        $("#calendar .fc-prev-button").hide();
                        return false;
                    }
                    else {
                        $("#calendar .fc-prev-button").show();
                    }

                    if(Math.abs(now- moment(start))<=40000000){
                        window.alert("You can't select this slot. Please choose another slot.");
                        submitBtn.disabled = true;
                    }
                    else{
                        var diff = Math.abs(moment(end) - moment(start));
                        if( diff <=1900000){
                            document.getElementById('startTime').value = moment(start).toISOString();
                            document.getElementById('endTime').value = moment(end).toISOString();
                            submitBtn.disabled = false;
                        } else {
                            window.alert("maximum 30 minutes appointment!");
                            submitBtn.disabled = true;
                            $('#calendar').fullCalendar('unselect');
                        }
                    }
                }
            }
        });
        $('#calendar').fullCalendar('render');
    }



</script>
</html>