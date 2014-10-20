﻿  <div class="tab-pane fade active in" id="backpic">
    <div class="panel panel-default">
        <div class="panel-heading">Выберите фоновый рисунок</div>
        <div class="panel-body">
        <div class="row">
            <script>
			  function choose(offset){
				$.ajax({
					url: "ajax.php?action=getback" ,data: {
                      "curimg": $('#image>img').attr('src'), 
                      "offset" : offset}
				}).success(function( msg ) {
					$('#image').empty().html(msg);
				});
			  }
            </script>
            <div class="col col-lg-1">
                    <a href= "javascript:choose('prev');" class="btn btn-default btn-lg">&lt;</a>
            </div>
            <div class="col col-lg-10" id="image">
            <img src="/torque/images/loading.gif">
            </div>
            <div class="col col-lg-1">
                    <a href= "javascript:choose('next');" class="btn btn-default btn-lg">&gt;</a>
            </div>
        </div>
        </div>
    </div>
</div>
