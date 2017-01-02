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
					{ name: 'sid'},
					{ name: 'semail'},
					{ name: 'categoryid'},
					{ name: 'onlinestoreid'}
					],
				url: 'subscribereportdata.php',
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
				height:480,
				sortable: true,
				groupable: true,
				columns: [
				
					{ text: 'ID', datafield: 'sid', width: 50 },
					{ text: 'Email', datafield: 'semail', width: 250 },
					{ text: 'Categoryid', datafield: 'categoryid', width: 250 },
					{ text: 'Onlinestoreid', datafield: 'onlinestoreid', width: 250 }
				]
			});
			$("#excelExport").jqxButton();
            $("#xmlExport").jqxButton();
            $("#csvExport").jqxButton();
            $("#tsvExport").jqxButton();
            $("#htmlExport").jqxButton();
            $("#jsonExport").jqxButton();
            $("#pdfExport").jqxButton();
			var date=new Date();
            $("#excelExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'xls', 'subscribereport');           
            });
            $("#xmlExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'xml', 'subscribereport');
            });
            $("#csvExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'csv', 'subscribereport');
            });
            $("#tsvExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'tsv', 'subscribereport');
            });
            $("#htmlExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'html', 'subscribereport');
            });
            $("#jsonExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'json', 'subscribereport');
            });
            $("#pdfExport").click(function () {
                $("#jqxgrid").jqxGrid('exportdata', 'pdf', 'subscribereport');
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
				$("#jqxgrid").jqxGrid('addfilter', 'NAME', filtergroup);
				// apply the filters.
				$("#jqxgrid").jqxGrid('applyfilters');
			}
			var dataAdapter = new $.jqx.dataAdapter(source);
			// initialize jqxGrid
			$("#jqxgrid").jqxGrid(
			{		
				source: dataAdapter,
				width:1080,
				height:460,
				altrows: true,
				selectionmode: 'multiplecellsextended',
				sortable: true,
				filterable: true,
				groupable: true,
				ready: function () {
					addfilter();
				},
				autoshowfiltericon: true,
				columns: [
					{ text: 'ID', datafield: 'sid', width: 50 },
					{ text: 'Email', datafield: 'semail', width: 250 },
					{ text: 'Local Store', datafield: 'categoryid', width: 250 },
					{ text: 'Online Store', datafield: 'onlinestoreid', width: 250 }
				]
			});
			$('#events').jqxPanel({ width: 300, height: 80 });
			$("#jqxgrid").on("filter", function (event) {
				$("#events").jqxPanel('clearcontent');
				var filterinfo = $("#jqxgrid").jqxGrid('getfilterinformation');
				var eventData = "Triggered 'filter' event";
				for (i = 0; i < filterinfo.length; i++) {
					var eventData = "Filter Column: " + filterinfo[i].filtercolumntext;
					$('#events').jqxPanel('prepend', '<div style="margin-top: 5px;">' + eventData + '</div>');
				}
			});
			
		});
		</script>
	</head>
<body class='default'>
		<div id='jqxWidget' style="margin-left:19%;margin-top:2%;font-size: 13px; font-family: Verdana; float: left;">
        <div class="row blue-text" style="font-size:30px;">Subscribe Report</div>
		<div id="jqxgrid"></div>
        <div style='margin-top: 20px;'>
            <div style='float: left;'>
                <input type="button" value="Export to Excel" id='excelExport' />
            </div>
            <div style='margin-left: 10px; float: left;'>
                <input type="button" value="Export to CSV" id='csvExport' />
            </div>
			<div style='margin-left: 10px; float: left;'>
                 <input type="button" value="Export to XML" id='xmlExport' />
            </div>
			<div style='margin-left: 10px; float: left;'>
                <input type="button" value="Export to TSV" id='tsvExport' />
            </div>
            <div style='margin-left: 10px; float: left;'>
                <input type="button" value="Export to HTML" id='htmlExport' />
                <input type="button" value="Export to JSON" id='jsonExport' />
            </div>
            <div style='margin-left: 10px; float: left;'>
                <input type="button" value="Export to JSON" id='jsonExport' />
            </div>			
            <div style='margin-left: 10px; float: left;'>
                <input type="button" value="Export to PDF" id='pdfExport' />
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
