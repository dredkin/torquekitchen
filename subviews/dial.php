  <div class="tab-pane" id="dial">
    <div class="panel">
        <div class="panel-heading">Настройка циферблата по умолчанию</div>
        <div class="panel-body">
        <div class="row">
            <script>
             $(function() {
            $("#slider-range-max" ).slider({
            range: "max",
            min: 0,
            max: 360,
            value: 2,
            slide: function( event, ui ) {
                $( "#amount" ).val( ui.value );
                }
            });
            $( "#amount" ).val( $( "#slider-range-max" ).slider( "value" ) );
            });
            </script>
            <p>
            <label for="amount">Minimum number of bedrooms:</label>
            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range-max"></div>
            <p>
            after
            </p>
            
        </div>
        </div>
    </div>
</div>
