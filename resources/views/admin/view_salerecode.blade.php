<div class="container-fluid py-1">
@include('admin.print_salercode')

</div>












<div class="modal-footer row display py-1">
		<div class="col-lg-12">
			<button class="btn float-right btn-secondary" type="button" data-dismiss="modal">Close</button>
			<button class="btn float-right btn-success mr-2" type="button" id="print">Print</button>
			<br>
		</div>
</div>
<style>
	#uni_modal .modal-footer{ 
		display: none
	}
	#uni_modal .modal-footer.display{
		display: block
	}
	.border-gradien-alert{
		border-image: linear-gradient(to right, red , yellow) !important;
	}
	.border-alert th, 
	.border-alert td {
	  animation: blink 200ms infinite alternate;
	}

	@keyframes blink {
	  from {
	    border-color: white;
	  }
	  to {
	    border-color: red;
		background: #ff00002b;
	  }
	}
</style>
















<script>




/*window.uni_modal = function($title = '', $url='',  $size=""){
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
*/



$('#print').click(function(){
		start_load()/*"+$(this).attr('recipid')+"*/
		var nw = window.open('{{ route('print_custome') }}?recipid=1',"_blank","width=900,height=600")
		setTimeout(function(){
			nw.print()
			setTimeout(function(){
				nw.close()
				end_load()
			},500)
		},500)
	});





	
</script>