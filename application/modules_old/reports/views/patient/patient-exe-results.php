<link href="<?php echo base_url();?>assets/plugins/amcharts/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
<!-- Data table CSS -->
<link href="<?php echo base_url();?>assets/plugins/amcharts/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url();?>assets/plugins/amcharts/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
<!-- Resources -->
<script src="<?php echo base_url();?>assets/plugins/amcharts/dist/amcharts/amcharts.js"></script>
<script src="<?php echo base_url();?>assets/plugins/amcharts/dist/amcharts/pie.js"></script>
<script src="<?php echo base_url();?>assets/plugins/amcharts/dist/amcharts/serial.js"></script>
<script src="<?php echo base_url();?>assets/plugins/amcharts/dist/amcharts/export.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/amcharts/dist/amcharts/export.css" type="text/css" media="all" />
<script src="<?php echo base_url();?>assets/plugins/amcharts/dist/amcharts/black.js"></script>
<script src="<?php echo base_url();?>assets/resources/data_formatter_for_charts.js"></script>
<div class="row">
  <br/>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        Gender Wise Patient Count
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p2"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        Age Wise Patient Count
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p1"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <br/>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        Division Wise Patient Count
        <select class="report_data_formatter" name="month_change" data-id="division_patient_count" data-type="month">
          <option value="">Select Month</option>
          <?php for($i=1;$i<=12;$i++){?>
          <option value="<?php echo $i;?>"><?php echo date('F', mktime(0, 0, 0, $i, 10));?></option>
          <?php }?>
        </select>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p6"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        CampType Wise Patient Count
        <select class="report_data_formatter" name="" data-id="camp_type_wise_patient" data-type="gender">
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <select class="report_data_formatter" name="month_change"  data-id="camp_type_wise_patient" data-type="month">
          <option value="">Select Month</option>
          <?php for($i=1;$i<=12;$i++){?>
          <option value="<?php echo $i;?>"><?php echo date('F', mktime(0, 0, 0, $i, 10));?></option>
          <?php }?>
        </select>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p7"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        Region Wise Male/Female Patient Count 
        <select class="report_data_formatter" name="month_change"  data-id="region_wise_patient" data-type="month">
          <option value="">Select Month</option>
          <?php for($i=1;$i<=12;$i++){?>
          <option value="<?php echo $i;?>"><?php echo date('F', mktime(0, 0, 0, $i, 10));?></option>
          <?php }?>
        </select>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p4"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        Month Wise Male/Female Patient Count
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p5"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <br/>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        Below Normal Range Test Wise Patient Count
        <select class="report_data_formatter" name=""  data-id="within_normal_range" data-type="division">
          <option value="">Select Division</option>
          <?php foreach($division_data as $d){?>
          <option value="<?php echo $d->division_id;?>"><?php echo $d->division_name;?></option>
          <?php }?>
        </select>
        <select class="report_data_formatter" name=""  data-id="below_normal_range" data-type="camp_type">
          <option value="">Select Camp Type</option>
          <?php foreach($camp_type_data as $ctd){?>
          <option value="<?php echo $ctd->camp_type_id;?>"><?php echo $ctd->camp_type;?></option>
          <?php }?>
        </select>
        <select class="report_data_formatter" name=""  data-id="below_normal_range" data-type="gender">
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <select class="report_data_formatter" name="month_change"  data-id="below_normal_range" data-type="month">
          <option value="">Select Month</option>
          <?php for($i=1;$i<=12;$i++){?>
          <option value="<?php echo $i;?>"><?php echo date('F', mktime(0, 0, 0, $i, 10));?></option>
          <?php }?>
        </select>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p8"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        Above Normal Range Test Wise Patient Count
        <select class="report_data_formatter" name=""  data-id="within_normal_range" data-type="division">
          <option value="">Select Division</option>
          <?php foreach($division_data as $d){?>
          <option value="<?php echo $d->division_id;?>"><?php echo $d->division_name;?></option>
          <?php }?>
        </select>
        <select class="report_data_formatter" name=""  data-id="above_normal_range" data-type="camp_type">
          <option value="">Select Camp Type</option>
          <?php foreach($camp_type_data as $ctd){?>
          <option value="<?php echo $ctd->camp_type_id;?>"><?php echo $ctd->camp_type;?></option>
          <?php }?>
        </select>
        <select class="report_data_formatter" name="" data-id="above_normal_range" data-type="gender">
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <select class="report_data_formatter" name="month_change"  data-id="above_normal_range" data-type="month">
          <option value="">Select Month</option>
          <?php for($i=1;$i<=12;$i++){?>
          <option value="<?php echo $i;?>"><?php echo date('F', mktime(0, 0, 0, $i, 10));?></option>
          <?php }?>
        </select>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p9"></div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <br/>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="panel panel-default card-view">
      <div class="panel-heading">
        Within Normal Range Test Wise Patient Count
        <select class="report_data_formatter" name=""  data-id="within_normal_range" data-type="division">
          <option value="">Select Division</option>
          <?php foreach($division_data as $d){?>
          <option value="<?php echo $d->division_id;?>"><?php echo $d->division_name;?></option>
          <?php }?>
        </select>
        <select class="report_data_formatter" name=""  data-id="within_normal_range" data-type="camp_type">
          <option value="">Select Camp Type</option>
          <?php foreach($camp_type_data as $ctd){?>
          <option value="<?php echo $ctd->camp_type_id;?>"><?php echo $ctd->camp_type;?></option>
          <?php }?>
        </select>
        <select class="report_data_formatter" name=""  data-id="within_normal_range" data-type="gender">
          <option value="">Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
        <select class="report_data_formatter" name="month_change" data-id="within_normal_range" data-type="month">
          <option value="">Select Month</option>
          <?php for($i=1;$i<=12;$i++){?>
          <option value="<?php echo $i;?>"><?php echo date('F', mktime(0, 0, 0, $i, 10));?></option>
          <?php }?>
        </select>
        <div class="clearfix"></div>
      </div>
      <div class="panel-wrapper collapse in">
        <div id="chartdiv_p10"></div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  var chartdiv_p1 = AmCharts.makeChart( "chartdiv_p1", {
    "type": "pie",
    "startDuration": 1,
     "theme": "dark",
    "addClassNames": true,
    "colors":["#ffab01", "#fe452c","#55bbf4","#b1eb00"],  
    "legend":{
      "position":"bottom",
      "marginRight":300,
      "autoMargins":true,
    "markerType": "circle",
     "align": "center"
    },
    "innerRadius": "30%",
    "defs": {
      "filter": [{
        "id": "shadow",
        "width": "200%",
        "height": "200%",
        "feOffset": {
          "result": "offOut",
          "in": "SourceAlpha",
          "dx": 0,
          "dy": 0
        },
        "feGaussianBlur": {
          "result": "blurOut",
          "in": "offOut",
          "stdDeviation": 5
        },
        "feBlend": {
          "in": "SourceGraphic",
          "in2": "blurOut",
          "mode": "normal"
        }
      }]
    },
    "dataProvider": <?php echo $collection['age_wise_patient_count'];?>,
    "valueField": "count",
    "titleField": "age",
    "outlineAlpha": 0.4,
    "depth3D": 10,
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 30,
    "export": {
      "enabled": true
    }
  });
  
  
</script>
<script>
  var division_patient_count = AmCharts.makeChart( "chartdiv_p6", {
    "type": "pie",
    "startDuration": 1,
     "theme": "dark",
    "addClassNames": true,
    "colors":["#ffab01", "#fe452c","#55bbf4","#b1eb00"],  
    "legend":{
      "position":"bottom",
      "marginRight":300,
      "autoMargins":true,
    "markerType": "circle",
     "align": "center"
    },
    "innerRadius": "30%",
    "defs": {
      "filter": [{
        "id": "shadow",
        "width": "200%",
        "height": "200%",
        "feOffset": {
          "result": "offOut",
          "in": "SourceAlpha",
          "dx": 0,
          "dy": 0
        },
        "feGaussianBlur": {
          "result": "blurOut",
          "in": "offOut",
          "stdDeviation": 5
        },
        "feBlend": {
          "in": "SourceGraphic",
          "in2": "blurOut",
          "mode": "normal"
        }
      }]
    },
    "dataProvider": <?php echo $collection['division_wise_patient_data'];?>,
    "valueField": "patient_count",
    "titleField": "division_name",
    "outlineAlpha": 0.4,
    "depth3D": 10,
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 30,
    "export": {
      "enabled": true
    }
  });
  
  
</script>
<script>
  var camp_type_wise_patient = AmCharts.makeChart( "chartdiv_p7", {
    "type": "pie",
    "startDuration": 1,
     "theme": "dark",
    "addClassNames": true,
    "colors":["#ffab01", "#fe452c","#55bbf4","#b1eb00"],  
    "legend":{
      "position":"bottom",
      "marginRight":100,
      "autoMargins":true,
    "markerType": "circle",
     "align": "center"
    },
    "innerRadius": "30%",
    "defs": {
      "filter": [{
        "id": "shadow",
        "width": "200%",
        "height": "200%",
        "feOffset": {
          "result": "offOut",
          "in": "SourceAlpha",
          "dx": 0,
          "dy": 0
        },
        "feGaussianBlur": {
          "result": "blurOut",
          "in": "offOut",
          "stdDeviation": 5
        },
        "feBlend": {
          "in": "SourceGraphic",
          "in2": "blurOut",
          "mode": "normal"
        }
      }]
    },
    "dataProvider": <?php echo $collection['camp_type_wise_patient'];?>,
    "valueField": "patient_count",
    "titleField": "camp_type",
    "outlineAlpha": 0.4,
    "depth3D": 10,
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 30,
    "export": {
      "enabled": true
    }
  });
  
  
</script>
<script>
  var chartdiv_p2 = AmCharts.makeChart( "chartdiv_p2", {
    "type": "pie",
    "startDuration": 1,
     "theme": "dark",
    "addClassNames": true,
    "colors":["#00d49c","#fddf03"], 
    "legend":{
      "position":"bottom",
      "marginRight":300,
      "autoMargins":true,
    "markerType": "circle",
     "align": "center"
    },
    "innerRadius": "30%",
    "defs": {
      "filter": [{
        "id": "shadow",
        "width": "200%",
        "height": "200%",
        "feOffset": {
          "result": "offOut",
          "in": "SourceAlpha",
          "dx": 0,
          "dy": 0
        },
        "feGaussianBlur": {
          "result": "blurOut",
          "in": "offOut",
          "stdDeviation": 5
        },
        "feBlend": {
          "in": "SourceGraphic",
          "in2": "blurOut",
          "mode": "normal"
        }
      }]
    },
    "dataProvider": <?php echo $collection['gender_wise_patient_count'];?>,
    "valueField": "patient_count",
    "titleField": "patient_gender",
     "outlineAlpha": 0.4,
    "depth3D": 10,
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 30,
    "export": {
      "enabled": true
    }
  });
  
  
  
</script>
<script>
  var region_wise_patient = AmCharts.makeChart("chartdiv_p4", {
      "type": "serial",
    "theme": "dark",
    "colors":["#00d49c","#fddf03"],  
      "legend": {
          "horizontalGap": 10,
          "maxColumns": 1,
          "position": "right",
      "useGraphSettings": true,
      "markerSize": 10
      },
      "dataProvider": <?php echo $collection['region_wise_patient_count'];?>,
      "valueAxes": [{
          "stackType": "regular",
          "axisAlpha": 0.5,
          "gridAlpha": 0
      }],
      "graphs": [{
          "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
          "fillAlphas": 0.8,
          "labelText": "[[value]]",
          "lineAlpha": 0.3,
          "title": "Male",
          "type": "column",
      "color": "#000000",
          "valueField": "male_count"
      }, {
          "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
          "fillAlphas": 0.8,
          "labelText": "[[value]]",
          "lineAlpha": 0.3,
          "title": "Female",
          "type": "column",
      "color": "#000000",
          "valueField": "female_count"
      }],
      "rotate": false,
      "categoryField": "region_name",
      "categoryAxis": {
          "gridPosition": "start",
          "axisAlpha": 0,
          "gridAlpha": 0,
          "position": "left"
      },
      "export": {
        "enabled": true
       }
  });
</script>
<script>
  var chartdiv_p5 = AmCharts.makeChart("chartdiv_p5", {
      "type": "serial",
    "theme": "dark",
    "colors":["#00d49c","#fddf03"],  
      "legend": {
          "horizontalGap": 10,
          "maxColumns": 1,
          "position": "right",
      "useGraphSettings": true,
      "markerSize": 10
      },
      "dataProvider": <?php echo $collection['month_wise_patient_data'];?>,
      "valueAxes": [{
          "stackType": "regular",
          "axisAlpha": 0.5,
          "gridAlpha": 0
      }],
      "graphs": [{
          "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
          "fillAlphas": 0.8,
          "labelText": "[[value]]",
          "lineAlpha": 0.3,
          "title": "Male",
          "type": "column",
      "color": "#000000",
          "valueField": "male_count"
      }, {
          "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
          "fillAlphas": 0.8,
          "labelText": "[[value]]",
          "lineAlpha": 0.3,
          "title": "Female",
          "type": "column",
      "color": "#000000",
          "valueField": "female_count"
      }],
      "rotate": false,
      "categoryField": "month_name",
      "categoryAxis": {
          "gridPosition": "start",
          "axisAlpha": 0,
          "gridAlpha": 0,
          "position": "left"
      },
      "export": {
        "enabled": true
       }
  });
</script>
<script>
  var below_normal_range= AmCharts.makeChart( "chartdiv_p8", {
    "type": "pie",
    "startDuration": 1,
     "theme": "dark",
    "addClassNames": true,
    "colors":["#ffab01", "#fe452c","#55bbf4","#b1eb00"],  
    "legend":{
      "position":"bottom",
      "marginRight":300,
      "autoMargins":true,
    "markerType": "circle",
     "align": "center"
    },
    "innerRadius": "30%",
    "defs": {
      "filter": [{
        "id": "shadow",
        "width": "200%",
        "height": "200%",
        "feOffset": {
          "result": "offOut",
          "in": "SourceAlpha",
          "dx": 0,
          "dy": 0
        },
        "feGaussianBlur": {
          "result": "blurOut",
          "in": "offOut",
          "stdDeviation": 5
        },
        "feBlend": {
          "in": "SourceGraphic",
          "in2": "blurOut",
          "mode": "normal"
        }
      }]
    },
    "dataProvider": <?php echo $collection['below_normal_range'];?>,
    "valueField": "patient_count",
    "titleField": "custom_field_name",
    "outlineAlpha": 0.4,
    "depth3D": 10,
    "balloonText": "[[title]] ([[camp_type]])<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 30,
    "export": {
      "enabled": true
    }
  });
  
  
</script>
<script>
  var above_normal_range = AmCharts.makeChart( "chartdiv_p9", {
    "type": "pie",
    "startDuration": 1,
     "theme": "dark",
    "addClassNames": true,
    "colors":["#ffab01", "#fe452c","#55bbf4","#b1eb00"],  
    "legend":{
      "position":"bottom",
      "marginRight":300,
      "autoMargins":true,
    "markerType": "circle",
     "align": "center"
    },
    "innerRadius": "30%",
    "defs": {
      "filter": [{
        "id": "shadow",
        "width": "200%",
        "height": "200%",
        "feOffset": {
          "result": "offOut",
          "in": "SourceAlpha",
          "dx": 0,
          "dy": 0
        },
        "feGaussianBlur": {
          "result": "blurOut",
          "in": "offOut",
          "stdDeviation": 5
        },
        "feBlend": {
          "in": "SourceGraphic",
          "in2": "blurOut",
          "mode": "normal"
        }
      }]
    },
    "dataProvider": <?php echo $collection['above_normal_range'];?>,
    "valueField": "patient_count",
    "titleField": "custom_field_name",
    "outlineAlpha": 0.4,
    "depth3D": 10,
    "balloonText": "[[title]] ([[camp_type]])<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 30,
    "export": {
      "enabled": true
    }
  });
  
  
</script>
<script>
  var within_normal_range = AmCharts.makeChart( "chartdiv_p10", {
    "type": "pie",
    "startDuration": 1,
     "theme": "dark",
    "addClassNames": true,
    "colors":["#ffab01", "#fe452c","#55bbf4","#b1eb00"],  
    "legend":{
      "position":"bottom",
      "marginRight":300,
      "autoMargins":true,
    "markerType": "circle",
     "align": "center"
    },
    "innerRadius": "30%",
    "defs": {
      "filter": [{
        "id": "shadow",
        "width": "200%",
        "height": "200%",
        "feOffset": {
          "result": "offOut",
          "in": "SourceAlpha",
          "dx": 0,
          "dy": 0
        },
        "feGaussianBlur": {
          "result": "blurOut",
          "in": "offOut",
          "stdDeviation": 5
        },
        "feBlend": {
          "in": "SourceGraphic",
          "in2": "blurOut",
          "mode": "normal"
        }
      }]
    },
    "dataProvider": <?php echo $collection['within_normal_range'];?>,
    "valueField": "patient_count",
    "titleField": "custom_field_name",
    "outlineAlpha": 0.4,
    "depth3D": 10,
    "balloonText": "[[title]] ([[camp_type]])<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "angle": 30,
    "export": {
      "enabled": true
    }
  });
  
  
</script>
<script type="text/javascript">
  
</script>
<script src="<?php echo base_url();?>assets/plugins/amcharts/dist/js/jquery.slimscroll.js"></script>
<!-- Fancy Dropdown JS -->
<script src="<?php echo base_url();?>assets/plugins/amcharts/dist/js/dropdown-bootstrap-extended.js"></script>
<!-- Switchery JavaScript -->
<script src="<?php echo base_url();?>assets/plugins/amcharts/vendors/bower_components/switchery/dist/switchery.min.js"></script>
<!-- Init JavaScript -->
<script src="<?php echo base_url();?>assets/plugins/amcharts/dist/js/init.js"></script>