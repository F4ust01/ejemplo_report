<?php
session_start();
include "../../../lib/template.inc";
include "../../../lib/link_msq.php";
include "../../../lib/check.php";
$t = new Template('../templates');
$t->set_file(array(
	"ver_form_report"		=> "ver_form_report.html",

));
/* -- VARIABLES GENERALES -- */
$title="Filtros"; 
$form="ver_reporte"; 
$urlWindow="modulos/equipo_report/php/ver_equipo_report.php";
$urlIframe="";
$urlSelf="modulos/equipo_report/php/ver_equipo_report.php";

$urlWindowPeso="modulos/equipo_report/php/ver_equipo_report_peso.php";
$urlIframePeso="";
$urlSelfPeso="modulos/equipo_report/php/ver_equipo_report_peso.php";

$urlWindowExtranjero="modulos/equipo_report/php/ver_equipo_report_extranjero.php";
$urlIframeExtranjero="";
$urlSelfExtranjero="modulos/equipo_report/php/ver_equipo_report_extranjero.php";
/* ------------------------ */

$fields="
{
		label: 'Equipo', 
		noAutoSubmit:true,
		help:'', 
		field: 'id_syscomp07',  
		type:'option', 
		deafultvalue:'', 
		oper:'eq',
		paramsType:
		{
			width:150,
			flexOps:
			{
				idFlex: 'id_syscomp07',
				url: 'lib/flex/flexComboXml.php', 
				optModel: 'syscomp01_nombre',
				sortname:'id_syscomp07', 
				deafultvalue:'',
				sortorder:'ASC',
				showReloadBtn:false,
				filterby: '',
				filtervalue: '',
				whereAdvance:false,
				getAll: true,
			}
		}
	},
	
	{
		label: 'Peso', 
		noAutoSubmit:true,
		help:'', 
		field: 'id_syscomp07',  
		type:'option', 
		deafultvalue:'', 
		oper:'eq',
		paramsType:
		{
			width:150,
			flexOps:
			{
				idFlex: 'id_syscomp07',
				url: 'lib/flex/flexComboXml.php', 
				optModel: 'syscomp07_peso',
				sortname:'id_syscomp07', 
				deafultvalue:'',
				sortorder:'ASC',
				showReloadBtn:false,
				filterby: '',
				filtervalue: '',
				whereAdvance:false,
				getAll: true,
			}
		}
	},
	{
		label: 'Largo', 
		noAutoSubmit:true,
		help:'', 
		field: 'id_syscomp07',  
		type:'option', 
		deafultvalue:'', 
		oper:'eq',
		paramsType:
		{
			width:150,
			flexOps:
			{
				idFlex: 'id_syscomp07',
				url: 'lib/flex/flexComboXml.php', 
				optModel: 'syscomp07_largo',
				sortname:'id_syscomp07', 
				deafultvalue:'',
				sortorder:'ASC',
				showReloadBtn:false,
				filterby: '',
				filtervalue: '',
				whereAdvance:false,
				getAll: true,
			}
		}
	},
	{
		label: 'Nacionalidad', 
		noAutoSubmit:true,
		help:'', 
		field: 'id_syscomp05',  
		type:'option', 
		deafultvalue:'', 
		oper:'eq',
		paramsType:
		{
			width:150,
			flexOps:
			{
				idFlex: 'id_syscomp05',
				url: 'lib/flex/flexComboXml.php', 
				optModel: 'syscomp05_nombre',
				sortname:'id_syscomp05', 
				deafultvalue:'',
				sortorder:'ASC',
				showReloadBtn:false,
				filterby: '',
				filtervalue: '',
				whereAdvance:false,
				getAll: true,
			}
		}
	},
	
";
$t->set_var("form",$form);	
$t->set_var("fields",$fields);
$t->set_var("title",$title);
$t->set_var("urlWindow",$urlWindow);	
$t->set_var("urlIframe",$urlIframe);	
$t->set_var("urlSelf",$urlSelf);

$t->set_var("urlWindowPeso",$urlWindowPeso);	
$t->set_var("urlIframePeso",$urlIframePeso);	
$t->set_var("urlSelfPeso",$urlSelfPeso);

$t->set_var("urlWindowExtranjero",$urlWindowExtranjero);	
$t->set_var("urlIframeExtranjero",$urlIframeExtranjero);	
$t->set_var("urlSelfExtranjero",$urlSelfExtranjero);

$t->pparse("OUT", "ver_form_report");
?>