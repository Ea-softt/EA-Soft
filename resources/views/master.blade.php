<!DOCTYPE html>
<html>
<head>
     <title>{{ config('app.name','ea_soft') }} - @yield('title') </title>
     <link  rel="shortcut icon" type="image/icon" href="{{ url('assets/Ea-Soft.ico') }}">
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="csrf-token" content="{{ csrf_token() }} " >

     <script src="/assets/js/jquery.min.js"></script>
      <script src="/assets/js/bootstrap.bundle.min.js"></script>
      <script src="/assets/js/jquery.datetimepicker.full.min.js"></script>
      <script src="/assets/js/select2.min.js"></script>
      <script src="/assets/js/typeahead.js"></script>
      <script src="/assets/js/datatables.min.js"></script>
      <script src="/assets/js/jquery.dataTables.min.js"></script>
      <script src="/assets/js/sweetalert.min.js"></script>
      <script src="/assets/js/sweetalert2.all.js"></script>
      <script src="/assets/js/sweetalert2.all.min.js"></script>
      <script src="/assets/js/sweetalert2.js"></script>
      <script src="/assets/js/datepicker.js"></script>
      <script src="/assets/js/ddtf.js"></script>
      <script src="/assets/js/accounting.min.js"></script>
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/datatables.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/datatables.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/select2.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/bootstrap.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}"> 
      <link rel="stylesheet" type="text/css" href="{{ url('assets/css/datepicker.css') }}">
</head>
 
















<style>




/*0544189823 0597875910 */
  input[type=checkbox]


      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;


         /* Double-sized Checkboxes */
  -ms-transform: scale(1.3); /* IE */
  -moz-transform: scale(1.3); /* FF */
  -webkit-transform: scale(1.3); /* Safari and Chrome */
  -o-transform: scale(1.3); /* Opera */
  transform: scale(1.3);
  padding: 10px;
  cursor:pointer;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

.modal-dialog.large-large {
    width: 90% !important;
    margin-bottom: 100%;
    max-width: unset;
   /* //max-height: unset;*/
  }
      .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }

  .modal-dialog.small {
    width: 30% !important;
    max-width: unset;
  }

  #viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    /*right: -4.5em;*/
    background: unset;
    color: white;
    border: unset;
    font-size: 27px;
    top: 0;
}
#viewer_modal .modal-dialog {
        width: 80%;
    max-width: unset;
    height: calc(90%);
    max-height: unset;
}
  #viewer_modal .modal-content {
       background: black;
    border: unset;
    height: calc(100%);
    display: flex;
    align-items: center;
    justify-content: center;
  }
  #viewer_modal img,#viewer_modal video{
    max-height: calc(100%);
    max-width: calc(100%);
  }


    </style>



  <body>

     {{ View::make('header') }}

    @yield('content')

    {{-- {{ View::make('footer') }} --}}

  </body>






<script>
     $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });


    //var timer = document.getElementById("show")
          var duration =1800;
          setInterval(updateTimer, 2000);

          function updateTimer(){
            duration --;
            if (duration < 1){


              window.location = "logout.php";
            }else{
              // console.log(duration);
            }

            }
    window.addEventListener("mousemove", resetTimer);
      function resetTimer(){

        duration = 1800;

          }


    window.start_load = function(){
        $('body').prepend('<di id="preloader2"></di>')


      }
      window.end_load = function(){
        $('#preloader2').fadeOut('fast', function() {
            $(this).remove();
          })
      }
     window.viewer_modal = function($src = ''){
        start_load()
        var t = $src.split('.')
        t = t[1]
        if(t =='mp4'){
          var view = $("<video src='"+$src+"' controls autoplay></video>")
        }else{
          var view = $("<img src='"+$src+"' />")
        }
        $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
        $('#viewer_modal .modal-content').append(view)
        $('#viewer_modal').modal({
                show:true,
                backdrop:'static',
                keyboard:false,
                focus:true
              })
              end_load()

    }



      window.uni_modal = function($title = '', $url='',  $size=""){
        start_load()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size)
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-lg")

                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_load()
                }
            }
        })
    }
       window.alert_toast= function($msg = 'TEST',$bg = 'success'){
          $('#alert_toast').removeClass('bg-success')
          $('#alert_toast').removeClass('bg-danger')
          $('#alert_toast').removeClass('bg-info')
          $('#alert_toast').removeClass('bg-warning')

        if($bg == 'success')
          $('#alert_toast').addClass('bg-success')
        if($bg == 'danger')
          $('#alert_toast').addClass('bg-danger')
        if($bg == 'info')
          $('#alert_toast').addClass('bg-info')
        if($bg == 'warning')
          $('#alert_toast').addClass('bg-warning')
        $('#alert_toast .toast-body').html($msg)
        $('#alert_toast').toast({delay:3000}).toast('show');
      }
      $(document).ready(function(){
        $('#preloader').fadeOut('fast', function() {
            $(this).remove();
          })
      })
      $('.datetimepicker').datetimepicker({
          format:'Y/m/d H:i',
          startDate: '+3d'
      })
      $('.select2').select2({
        placeholder:"Please select here",
        width: "100%"
      })

      $('#alert_toast').toast({delay:1000}).toast('show');


      window._tables = function($viewnames ="", $urls='',  $titles=''){
     start_load()
      $.ajax({
        url:$urls,
        type: "get",
         method: 'get',
        success:function(resp){
          $($viewnames).html(resp);
            $('table').DataTable( {
          order: [0, 'desc'],
         pageLength: 10,
        responsive: true,
         dom: 'Bfrtilp',
            columnDefs: [
                { type: "num-fmt", symbols:"R$" , targets: 4 }
            ],
            buttons: [




                { extend: 'copyHtml5',
                 text: '<i class="fas fa-copy"></i> ',
                 titleAttr: 'Export a Copy',
                   title: $titles,
                   className: "btn btn-warning",

                },




                {extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> ',
                  titleAttr: 'Export a Excel',
                   title: $titles,
                    className: "btn btn-success",
            },



                {extend: 'pdf',
                 text: '<i class="fas fa-file-pdf"></i> ',
                  titleAttr: 'Export a Pdf',
                   title: $titles,
                    className: "btn btn-danger",
                },



                {extend: 'print',

                text: '<i class="fas fa-print"></i> ',
                  titleAttr: 'Export a print',
                    className: "btn btn-info",
                     title: $titles,

                 customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                    }
                }
        ]
    } );


        }

      });

    }



     window._table = function($viewnames ="", $urls='',  $titles=''){
     start_load()
      $.ajax({
        url:$urls,
        type: "get",
         method: 'get',
        success:function(resp){
          $($viewnames).html(resp);
          $('#mytable').ddTableFilter();
        }

      });

    }


window._deletes = function (id, $urls='', $titl=''){   
  start_load()
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed){
                $.ajax({
                    url:$urls,
                    method: 'post',
                    data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                    },
                    success:function(resp){
                      //alert(resp.stat);
                      if (resp.stat == 'success' ) {
                        Swal.fire(
                            'Deleted!',
                            +$titl+ 'Deleted Successfully!.',
                            'success'
                        )
                        setTimeout(function(){
                            location.reload()
                            },1000)
                    }
                    }
                });
            }
        });
}
























    // function runbackup(){
    //         $.ajax({
    //             url: "backupage.php",
    //             method: 'POST',
    //             type: 'POST',
    //             success:function(data){
    //             }


    //         });
    // }
function out(){
  var lag = "logout";

    
   
        if(lag){
            $.ajax({
              type: 'post',
              data: {
                logout:lag
              },
              url: '{{ route('logouts') }}',

              success: function (data){
                //alert(data);
               // window.location.href='{{ route('logouts') }}';
              }
            });
        }
      
  
};




  $(document).ready(function(){    
   

      var dura =10 ;
          setInterval(updateTime, 2000);

          function updateTime(){

            dura --;
            if (dura < 1){
                //out();

            }else{
            // console.log(dura);
            }

            }

  });









  
        

    </script>
</html>
