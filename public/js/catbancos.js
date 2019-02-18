$(function () {
  $('#catcuentas-table').DataTable({
    "language": {
              "url": "{{asset('adminlte/bower_components/datatables.net/Spanish.json')}}"
          }
  })
})

$.ajax({
      url: "ajax/datatable-catbancos",
      success:function(respuesta) {
        console.log("respuesta",respuesta);
      }

})
