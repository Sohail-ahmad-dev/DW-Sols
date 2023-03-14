$(function () {

  let status = $("#status").val();
  let cro = $("#cro").val();
  let date_range = '';
  
  var table = $('#companies').DataTable({
      processing: true,
      serverSide: true,
      responsive: true,
      ajax: {
        url: "{{ route('compaines') }}",
        data: function (d) {
          d.status = status
          d.cro = cro
          d.date_range = date_range
        },
      },
      columns: [
          {data: 'name', name: 'name'},
          {data: 'status', name: 'status'},
          {data: 'cro', name: 'cro'},
          {data: 'reg_date', name: 'reg_date'},
      ]
  });

  // Status Custom Filte Start
  $("#status").on("change", function(){
    status = $(this).val(); 
    table.draw();
  });
  // Status Custom Filte End

  
  // CRO Filte Start
  $("#cro").on("change", function(){
    cro = $(this).val(); 
    table.draw();
  });
  // CRO Filte End
  
  // date_range Filte Start
  $("#date_range").on("change", function(){
    date_range = $(this).val(); 
    table.draw();
  });
  // date_range Filte End


  // DATE RANGE START

    $('input[name="daterange"]').daterangepicker({
      opens: 'left',
      startDate: moment().subtract(200, 'days'),
      endDate: moment(),
      ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });

  // DATE RANGE eND

  
});