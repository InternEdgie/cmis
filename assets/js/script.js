document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var events = [];
    if (!!scheds) {
    	Object.keys(scheds).map(k => {
    		var row = scheds[k]
            
    		events.push({
                color: row.event_color, 
                id: row.fc_id + row.event_id,
                title: row.fc_id, 
                start: row.start_date,
                meridiem: 'short',
                allDay: true,
            });
    	})
    }
    var date = new Date()
    var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear()
    var calendar = new FullCalendar.Calendar(calendarEl, {
        // nextDayThreshold: '09:00:00',
    	headerToolbar: {
    		left: 'prev,next today',
    		right: 'dayGridMonth,dayGridWeek,listMonth',
    		center: 'title',
    	},
    	buttonText: {
    		today:    'Today',
    		month:    'Month',
    		week:     'Week',
    		day:      'Day',
    		list:     'List'
    	},
    	buttonIcons: {
    		prev: 'chevron-left',
    		next: 'chevron-right',
    	},
        eventTimeFormat: {
            hour: 'numeric',
            minute: '2-digit',
            omitZeroMinute: true,
            meridiem: 'short'
        },
    	themeSystem: 'bootstrap4',
    	selectable: true,
    	fixedWeekCount: false,
        showNonCurrentDates: false,
        
        events: events,
        eventClick: function(info) {
        	var _details = $('#event-details-modal')
        	var id = info.event.id
            console.log(id);
        	if (!!scheds[id]) {
                _details.find('#schedule_id').val(id)
                _details.find('#fc_id').text(scheds[id].fc_id)
                _details.find('#description').text(scheds[id].event_name)
                _details.find('#start').text(scheds[id].sdate)
                _details.find('#paraID').text(scheds[id].fc_id)
                _details.find('#edit,#reschedule').attr('data-id', id)
                _details.modal('show')
        	} else {
        		alert("Event is undefined");
        	}
        },
        editable: true,
        eventDrop: function(info) {
        	var id = info.event.id
            var start_date = info.event.start;
        	if (!!scheds[id]) {
                var fc_id = scheds[id].fc_id;
                var event_id = scheds[id].event_id;
                console.log(start_date);
                $.ajax({
                    method: 'POST',
                    url: 'config/query.php',
                    data: {
                        start_date:start_date,
                        fc_id:fc_id,
                        event_id:event_id,
                        update_schedule_on_drop:id

                    },
                    success:function(info){
                        location.reload()
                    }
                });
        	} else {
        		alert("Event is undefined");
        	}
        },
        select: function(info) {
        	var _form = $('#addScheduleModal') 
        	console.log(String(info.startStr), String(info.endStr).replace(" ", "\\t"))
        	_form.find('[name="start"]').val(info.startStr)
        	_form.modal('show')
        },
    });
    calendar.render();

     // Form reset listener
     $('#schedule-form').on('reset', function() {
     	$(this).find('input:hidden').val('')
     	$(this).find('input:visible').first().focus()
     })

    // Edit Button
    $('#edit').click(function() {
    	var id = $(this).attr('data-id')
    	if (!!scheds[id]) {
    		var _form = $('#updateScheduleModal')
    		console.log(String(scheds[id].start_date).replace(" ", "\\t"))
    		// _form.find('[name="id"]').val(id)
            _form.find('[name="event_id"]').val(scheds[id].event_id)
    		_form.find('[name="title"]').val(scheds[id].fc_id)
            _form.find('[name="event_name"]').val(scheds[id].event_name)
    		_form.find('[name="start_date"]').val(String(scheds[id].start_date).replace(" ", "\\t"))
    		$('#event-details-modal').modal('hide')
            _form.modal('show')
        } else {
        	alert("Event is undefined");
        }
    })
    $('#reschedule').click(function() {
        var id = $(this).attr('data-id')
        if (!!scheds[id]) {
            var _form = $('#reScheduleModal')
            console.log(String(scheds[id].start_date).replace(" ", "\\t"))
            // _form.find('[name="id"]').val(id)
            _form.find('[name="title"]').val(scheds[id].fc_id)
            _form.find('[name="event_name"]').val(scheds[id].event_name)
            _form.find('[name="start_date"]').val(String(scheds[id].start_date).replace(" ", "\\t"))
            $('#event-details-modal').modal('hide')
            _form.modal('show')
        } else {
            alert("Event is undefined");
        }
    })
})