<div id="wrapper">
<?php echo $this->element('dashboard'); ?>
<link href="<?php echo $this->webroot; ?>build/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js" charset="utf-8"></script>
    <script src="<?php echo $this->webroot; ?>build/nv.d3.js"></script>
    <script src="<?php echo $this->webroot; ?>lib/stream_layers.js"></script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            	<div class="col-md-12">
            		<?php echo $this->Session->flash(); ?>
                    <?php //var_dump($allCases);?>
            	</div>
            </div>
<?php


?>    
<form action="#search" name="search form" method="post">
<div class="input-group">
  <span class="input-group-addon" style="padding:0 10px;"><i class="fa fa-search"></i></span>
  <input type="text" class="form-control search_field" name="search" autocomplete="off" placeholder="Search Patient by name, ID, email or phone number...">
  <span class="input-group-addon" style="padding:0;border:0"><button type="submit" class="btn btn-primary search_btn">Search</button></span>
</div>

<div class="search_result">

</div>
</form>

<div id="chart1" class='with-3d-shadow with-transitions'>
    <svg style="height:300px"></svg>
</div>


        </div>
        <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<script>

   /* historicalBarChart = [
        {
            key: "Cumulative Return",
            values: [
                {
                    "label" : "Januaray" ,
                    "value" : 5000
                } ,
                {
                    "label" : "Feburary" ,
                    "value" : 1500
                } ,
                {
                    "label" : "March" ,
                    "value" : 3000
                } ,
                {
                    "label" : "April" ,
                    "value" : 2200
                } ,
                {
                    "label" : "May" ,
                    "value" : 1860
                } ,
                {
                    "label" : "June" ,
                    "value" : 4500
                } ,
                {
                    "label" : "July" ,
                    "value" : 2000
                } ,
                {
                    "label" : "August" ,
                    "value" : 3300
                }
            ]
        }
    ];

    nv.addGraph(function() {
        var chart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .staggerLabels(true)
            //.staggerLabels(historicalBarChart[0].values.length > 8)
            .showValues(true)
            .duration(250)
            ;

        d3.select('#chart1 svg')
            .datum(historicalBarChart)
            .call(chart);

        nv.utils.windowResize(chart.update);
        return chart;
    });*/
 var test_data = stream_layers(2,10+Math.random()*100,.1).map(function(data, i) {
        return {
            key: 'Stream' + i,
            values: data
        };
    });

    console.log('td',test_data);

    var negative_test_data = new d3.range(0,2).map(function(d,i) {
        return {
            key: 'Stream' + i,
            values: new d3.range(0,13).map( function(f,j) {
                return {
                    y: 10 + Math.random()*100 * (Math.floor(Math.random()*100)%2),
                    x: j
                }
            })
        };
    });

    var chart;
    nv.addGraph(function() {
        chart = nv.models.multiBarChart()
            .barColor(d3.scale.category20().range())
            .duration(300)
            .margin({bottom: 100, left: 70})
            .rotateLabels(45)
            .groupSpacing(0.1)
        ;

        chart.reduceXTicks(false).staggerLabels(true);

        chart.xAxis
            .axisLabel("Months")
            .axisLabelDistance(35)
            .showMaxMin(false)
            .tickFormat(d3.format(',.6f'))
        ;

        chart.yAxis
            .axisLabel("Fee Collected")
            .axisLabelDistance(-5)
            .tickFormat(d3.format(',.01f'))
        ;

        chart.dispatch.on('renderEnd', function(){
            nv.log('Render Complete');
        });

        d3.select('#chart1 svg')
            .datum(negative_test_data)
            .call(chart);

        nv.utils.windowResize(chart.update);

        chart.dispatch.on('stateChange', function(e) {
            nv.log('New State:', JSON.stringify(e));
        });
        chart.state.dispatch.on('change', function(state){
            nv.log('state', JSON.stringify(state));
        });

        return chart;
    });

</script>