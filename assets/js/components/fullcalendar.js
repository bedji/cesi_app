Fullcalendar = function() {
  var e, a, t = $('[data-toggle="calendar"]');
  t.length && (a = {
      header: {
          right: "",
          center: "",
          left: ""
      },
      buttonIcons: {
          prev: "calendar--prev",
          next: "calendar--next"
      },
      theme: !1,
      selectable: !0,
      selectHelper: !0,
      editable: !0,
      events: [{
          id: 1,
          title: "Call with Dave",
          start: "2021-02-26",
          allDay: !0,
          className: "bg-red",
          description: "Nullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus."
      }],
      dayClick: function(e) {
          console.log(e)
          var a = moment(e).toISOString();
          $("#new-event").modal("show"),
          $(".new-event--title").val(""),
          $(".new-event--start").val(a),
          $(".new-event--end").val(a)
          console.log(a)
      },
      viewRender: function(a) {
          e.fullCalendar("getDate").month(),
          $(".fullcalendar-title").html(a.title)
      },
      eventClick: function(e, a) {
          $("#edit-event input[value=" + e.className + "]").prop("checked", !0),
          $("#edit-event").modal("show"),
          $(".edit-event--id").val(e.id),
          $(".edit-event--title").val(e.title),
          $(".edit-event--description").val(e.description)
      }
  },
  (e = t).fullCalendar(a),
  $("body").on("click", ".new-event--add", function() {
      var a = $(".new-event--title").val()
        , t = {
          Stored: [],
          Job: function() {
              var e = Date.now().toString().substr(6);
              return this.Check(e) ? this.Job() : (this.Stored.push(e),
              e)
          },
          Check: function(e) {
              for (var a = 0; a < this.Stored.length; a++)
                  if (this.Stored[a] == e)
                      return !0;
              return !1
          }
      };
      "" != a ? (e.fullCalendar("renderEvent", {
          id: t.Job(),
          title: a,
          start: $(".new-event--start").val(),
          end: $(".new-event--end").val(),
          allDay: !0,
          className: $(".event-tag input:checked").val()
      }, !0),
      $(".new-event--form")[0].reset(),
      $(".new-event--title").closest(".form-group").removeClass("has-danger"),
      $("#new-event").modal("hide")) : ($(".new-event--title").closest(".form-group").addClass("has-danger"),
      $(".new-event--title").focus())
  }),
  $("body").on("click", "[data-calendar]", function() {
      var a = $(this).data("calendar")
        , t = $(".edit-event--id").val()
        , n = $(".edit-event--title").val()
        , i = $(".edit-event--description").val()
        , o = $("#edit-event .event-tag input:checked").val()
        , s = e.fullCalendar("clientEvents", t);
      "update" === a && ("" != n ? (s[0].title = n,
      s[0].description = i,
      s[0].className = [o],
      console.log(o),
      e.fullCalendar("updateEvent", s[0]),
      $("#edit-event").modal("hide")) : ($(".edit-event--title").closest(".form-group").addClass("has-error"),
      $(".edit-event--title").focus())),
      "delete" === a && ($("#edit-event").modal("hide"),
      setTimeout(function() {
          swal({
              title: "Are you sure?",
              text: "You won't be able to revert this!",
              type: "warning",
              showCancelButton: !0,
              buttonsStyling: !1,
              confirmButtonClass: "btn btn-danger",
              confirmButtonText: "Yes, delete it!",
              cancelButtonClass: "btn btn-secondary"
          }).then(a=>{
              a.value && (e.fullCalendar("removeEvents", t),
              swal({
                  title: "Deleted!",
                  text: "The event has been deleted.",
                  type: "success",
                  buttonsStyling: !1,
                  confirmButtonClass: "btn btn-primary"
              }))
          }
          )
      }, 200))
  }),
  $("body").on("click", "[data-calendar-view]", function(a) {
      a.preventDefault(),
      $("[data-calendar-view]").removeClass("active"),
      $(this).addClass("active");
      var t = $(this).attr("data-calendar-view");
      e.fullCalendar("changeView", t)
  }),
  $("body").on("click", ".fullcalendar-btn-next", function(a) {
      a.preventDefault(),
      e.fullCalendar("next")
  }),
  $("body").on("click", ".fullcalendar-btn-prev", function(a) {
      a.preventDefault(),
      e.fullCalendar("prev")
  }))
}()