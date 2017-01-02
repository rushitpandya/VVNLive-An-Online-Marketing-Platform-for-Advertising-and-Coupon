<!DOCTYPE html>
<html lang="en">
<?php
include 'include_db.php';
if(!empty($_SESSION['start1']))
{
include('header.php');
?>
<head>
	<link rel="stylesheet" href="../jqwidgets/styles/jqx.base.css" type="text/css" />
	<script type="text/javascript" src="../scripts/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxcore.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxbuttons.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxscrollbar.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxmenu.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxgrid.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxgrid.grouping.js"></script>
	<script type="text/javascript" src="../jqwidgets/jqxgrid.selection.js"></script>	
	<script type="text/javascript" src="../jqwidgets/jqxgrid.sort.js"></script>		
	<script type="text/javascript" src="../jqwidgets/jqxdata.js"></script>	
	<script type="text/javascript" src="../scripts/demos.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxpanel.js"></script>
    <script type="text/javascript" src="../jqwidgets/globalization/globalize.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcalendar.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxdatetimeinput.js"></script>
    <script type="text/javascript" src="../jqwidgets/jqxcheckbox.js"></script>
   <script type="text/javascript" src="../jqwidgets/jqxdata.export.js"></script> 
    <script type="text/javascript" src="../jqwidgets/jqxgrid.export.js"></script> 
    <script type="text/javascript" src="../generatedata.js"></script>			
	<script type="text/javascript">
		$(document).ready(function () {
			// prepare the data
			
      
			var source =
			{
				datatype: "json",
				datafields: [
					{ name: 'bnid'},
					{ name: 'bannername'},
					{ name: 'size'},
					{ name: 'duration'},
					{ name: 'quantity'},
					{ name: 'businessid'},
					{ name: 'price'},
					{ name: 'requestdate',type:'date'}
				],
				url: 'rikshawbannerreportdata.php',
				sort: function()
				{
					// update the grid and send a request to the server.
					$("#jqxgrid").jqxGrid('updatebounddata', 'sort');
				}
			};	
				
			var dataAdapter = new $.jqx.dataAdapter(source);
	
			// initialize jqxGrid
			$("#jqxgrid").jqxGrid(
			{		
				source: dataAdapter,
				width:1080,
				height:460,
				sortable: true,
				groupable: true,
				columns: [
				
					{ text: 'bnid', datafield: 'bnid', width: 80 },
					{ text: 'bannername', datafield: 'bannername', width: 220 },
					{ text: 'size', datafield: 'size', width: 80 },
					{ text: 'quantity', datafield: 'quantity', width: 100 },
					{ text: 'duration', datafield: 'duration', width: 80 },
					{ text: 'price', datafield: 'price', width: 100 },
					{ text: 'businessid', datafield: 'businessid', width: 100 },
					{ text: 'requestdate', datafield: 'requestdate', width: 200 }
				]
			});
			$("#excelExport").jqxButton();
            $("#xmlExport").jqxButton();
            $("#csvExport").jqxButton();
            $("#tsvExport").jqxButton();
            $("#htmlExport").jqxButton();
            $("#jsonExport").jqxButton();
            $("#pdfExport").jqxButton();
            $("#excelExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'xls', 'rikshawbannerreport');           
            });
            $("#xmlExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'xml', 'rikshawbannerreport');
            });
            $("#csvExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'csv', 'rikshawbannerreport');
            });
            $("#tsvExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'tsv', 'rikshawbannerreport');
            });
            $("#htmlExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'html', 'rikshawbannerreport');
            });
            $("#jsonExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'json', 'rikshawbannerreport');
            });
            $("#pdfExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'pdf', 'rikshawbannerreport');
            });
			var addfilter = function () {
                var filtergroup = new $.jqx.filter();
                var filter_or_operator = 1;
                var filtervalue = '';
                var filtercondition = 'contains';
                var filter1 = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
                filtervalue = '';
                filtercondition = 'starts_with';
                var filter2 = filtergroup.createfilter('stringfilter', filtervalue, filtercondition);
 
                filtergroup.addfilter(filter_or_operator, filter1);
                filtergroup.addfilter(filter_or_operator, filter2);
                // add the filters.
                //$("#jqxgrid").jqxGrid('addfilter', 'NAME', filtergroup);
                // apply the filters.
                $("#jqxgrid").jqxGrid('applyfilters');
            }
            var adapter = new $.jqx.dataAdapter(source);
            $("#jqxgrid").jqxGrid(
            {
                width: 1080,
				height:420,
                source: adapter,
                filterable: true,
                sortable: true,
                ready: function () {
                    addfilter();
                },
                autoshowfiltericon: true,
                columns: [
					{ text: 'bnid', datafield: 'bnid', width: 80 },
					{ text: 'bannername', datafield: 'bannername', width: 220 },
					{ text: 'size', datafield: 'size', width: 80 },
					{ text: 'quantity', datafield: 'quantity', width: 100 },
					{ text: 'duration', datafield: 'duration', width: 80 },
					{ text: 'price', datafield: 'price', width: 100 },
					{ text: 'businessid', datafield: 'businessid', width: 100 },
					{ text: 'requestdate', datafield: 'requestdate', width: 200 }
                ]
            });
            $('#events').jqxPanel({ width: 300, height: 80});
            $("#jqxgrid").on("filter", function (event) {
                $("#events").jqxPanel('clearcontent');
                var filterinfo = $("#jqxgrid").jqxGrid('getfilterinformation');
                var eventData = "Triggered 'filter' event";
                for (i = 0; i < filterinfo.length; i++) {
                    var eventData = "Filter Column: " + filterinfo[i].filtercolumntext;
                    $('#events').jqxPanel('prepend', '<div style="margin-top: 5px;">' + eventData + '</div>');
                }
            });
            $('#clearfilteringbutton').jqxButton({ height: 25});
            $('#filterbackground').jqxCheckBox({ checked: true, height: 25});
            $('#filtericons').jqxCheckBox({ checked: false, height: 25});
            // clear the filtering.
            $('#clearfilteringbutton').click(function () {
                $("#jqxgrid").jqxGrid('clearfilters');
            });
            // show/hide filter background
            $('#filterbackground').on('change', function (event) {
                $("#jqxgrid").jqxGrid({ showfiltercolumnbackground: event.args.checked });
            });
            // show/hide filter icons
            $('#filtericons').on('change', function (event) {
                $("#jqxgrid").jqxGrid({ autoshowfiltericon: !event.args.checked });
            });
		});
		</script>
	</head>
<body class='default' >
		<div id='jqxWidget' style="margin-top:2%;margin-left:19%;font-size: 13px; font-family: Verdana; float: left;">
        <div class="row blue-text" style="font-size:30px;">Rikshaw Banner Report</div>
		<div id="jqxgrid"></div>
        <div style='margin-top: 20px;'>
            <div style='float: left;'>
                <input type="button" value="Export to Excel" id='excelExport' />
                <br /><br />
                <input type="button" value="Export to XML" id='xmlExport' />
            </div>
            <div style='margin-left: 10px; float: left;'>
                <input type="button" value="Export to CSV" id='csvExport' />
                <br /><br />
                <input type="button" value="Export to TSV" id='tsvExport' />
            </div>
            <div style='margin-left: 10px; float: left;'>
                <input type="button" value="Export to HTML" id='htmlExport' />
                <br /><br />
                <input type="button" value="Export to JSON" id='jsonExport' />
            </div>
            <div style='margin-left: 10px; float: left;'>
                <input type="button" value="Export to PDF" id='pdfExport' />
            </div>
        </div>
		<div id="eventslog" style="margin-top: 20px;margin-left:50%;">
            <div style="width: 200px; float: left; margin-right: 10px;">
            <input value="Remove Filter" id="clearfilteringbutton" type="button" />
            <div style="margin-top: 10px;" id='filterbackground'>Filter Background</div>
            <div style="margin-top: 10px;" id='filtericons'>Show All Filter Icons</div>
            </div>
            <div style="float: left;">
                Event Log:
                <div style="border: none;" id="events">
                </div>
            </div>
        </div>
    </div>
	</body>
</html>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>