<?php
include '../koneksi.php';
?>
<h2 style= "color:#022457">Data Chart</h2>

<table class="table table-bordered">
<div class="row"> 
                    
                      
                    <div class="col-md-6 col-sm-12 col-xs-12">                     
         <div class="panel panel-default">
             <div class="panel-heading">
                 Bar Chart Example
             </div>
             <div class="panel-body">
                 <div id="morris-bar-chart"></div>
             </div>
         </div>            
     </div>
           <div class="col-md-6 col-sm-12 col-xs-12">                     
         <div class="panel panel-default">
             <div class="panel-heading">
                 Area Chart Example
             </div>
             <div class="panel-body">
                 <div id="morris-area-chart"></div>
             </div>
         </div>            
     </div> 
     
</div>
      <!-- /. ROW  -->
     <div class="row">                     
           
                    <div class="col-md-6 col-sm-12 col-xs-12">                     
         <div class="panel panel-default">
             <div class="panel-heading">
                 Donut Chart Example
             </div>
             <div class="panel-body">
                 <div id="morris-donut-chart"></div>
             </div>
         </div>            
     </div>
           <div class="col-md-6 col-sm-12 col-xs-12">                     
         <div class="panel panel-default">
             <div class="panel-heading">
                 Line Chart Example
             </div>
             <div class="panel-body">
                 <div id="morris-line-chart"></div>
             </div>
         </div>            
     </div> 
     
</div>
</table>
