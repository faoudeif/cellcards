<!-- !!
Copyright © 2014 The Regents of the University of Michigan
 
Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at
 
http://www.apache.org/licenses/LICENSE-2.0
 
Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
 
For more information, questions, or permission requests, please contact:
Yongqun "Oliver" He - yongqunh@med.umich.edu
Unit for Laboratory Animal Medicine, Center for Computational Medicine & Bioinformatics
University of Michigan, Ann Arbor, MI 48109, USA
He Group:  http://www.hegroup.org
-->
<!--
Author: Zuoshuang (Allen) Xiang, Yongqun (Oliver) He
The University Of Michigan
He Group
Date: July 2011 - December 2014
-->

<?php 
include_once('../inc/functions.php');
$db = ADONewConnection($driver);
$db->Connect($host, $username, $password, $database);
header("Content-type: text/html; charset=UTF-8"); ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><!-- InstanceBegin template="Templates/default.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php // call function ?> Cell Card</title>
<!-- InstanceEndEditable --><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" href="/favicon.ico" />
<link href="css/styleMain.css" rel="stylesheet" type="text/css">
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<?php include_once('inc/googleanalytics.php') ?>
</head>

<body>
<div id="topbanner"><a href="/index.php" style="font-size:36px; color:#111144; text-decoration:none"><img src="images/logo.png" alt="Logo" width="280" height="49" border="0"></a></div>
<div id="topnav"><a href="index.php" class="topnav">Home</a><a href="intro.php" class="topnav">Introduction</a><a href="tutorial/index.php" class="topnav">Tutorial</a><a href="standards/index.php" class="topnav">Standards</a><a href="faqs.php" class="topnav">FAQs</a><a href="refs.php" class="topnav">References</a><a href="links.php" class="topnav">Links</a><a href="download.php" class="topnav">Download</a><a href="contactus.php" class="topnav">Contact Us</a><a href="ack.php" class="topnav">Acknowledge</a><a href="news.php" class="topnav">News</a></div>
<div id="mainbody">
<!-- InstanceBeginEditable name="Main" -->

<h3><span class="header_darkred">Podocyte (CL_0000653)</span></h3>	
	
<?php 
$vali=new Validation($_REQUEST);

$keywords = $vali->getInput('keywords', 'Keywords', 2, 500);
	
if ($vali->getErrorMsg() =='') {
	// $tkeywords = transformKeywords ($keywords);

	//$t_gene_def = $t_table_def['t_gene'];
}
	
?>
	
<?php 
	
	# Under t_cellcard table, there is a column called c_introduction. now 
	# the sql code that works: 
	# use cellcards; 
    # Select c_introduction from t_cellcard where c_CL_id='CL_0000653';
	# the result is: 
	# 'Podocyte is a cell type in renal corpuscle and wraps around the capillary of the glomerulus in the kidney. Renal corpuscle filters the blood, retaining large molecules such as proteins and filtering out smaller molecules such as water, salts, and sugars in the formation of urine. Podocytes are specialized epithelial cells that reside in the visceral layer of the Bowman\'s capsule.'

$strSql = "Select c_introduction from t_cellcard where c_CL_id='CL_0000653'";

$rs = $db->Execute($strSql);
if (!$rs->EOF)
{
	$c_intro = $rs;	
	$rs->Close();
}

?>	
	
<p><?php echo($c_intro) ?> </p>
	
<blockquote align="left"><img src="images/podocyte-graphic.svg" width="300" alt="Podocyte graphic"></blockquote>
<?php // automatically generate images for each cell in blockquote above ?>	

<p> <?php //call image description ?> </p>

<p style="font-weight:bold; font-size:14px; color:#2A1F55">Cell Ontology (CL) ID: <a href="http://purl.obolibrary.org/obo/CL_0000653"><?php //get cell ID ?></a></p>
	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;<strong>CL definition:</strong><?php //get cell definition ?></p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Synonyms:</strong><?php //get synonyms ?></p>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Cell Hierarchy (defined by CL)</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://purl.obolibrary.org/obo/CL_0000653"><?php //get cell name ?>hierarchy</a> according to the Cell Ontology (CL): </p>
	<blockquote>
	<p><a href="/images/podocyte_hierarchy.png" target="_blank"><img src="../images/podocyte_hierarchy.png" alt="podocyte hierarchy" height="150" border="0"></a></p>
		<p><?php // get cell hierarchy image description ?></p>
		</blockquote>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Location (defined by CL and UBERON)</p>	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;<?php // cell location description ?></p>
	<blockquote>'part of' <em>some</em> <?php //get cell uberon location ?> (<a href="http://purl.obolibrary.org/obo/UBERON_0005751">UBERON_0005751</a>) </blockquote>
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Connections and Vicinity </p>	
	<p>&nbsp;&nbsp;&nbsp;&nbsp; <?php // get connection_vicinity information ?> </p> 
	<p>&nbsp;&nbsp;&nbsp;&nbsp;See more: check the image below, and check the <a href="renal_corpuscle_connectome.php">Renal Corpuscle connectome</a> card page. </p> 
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Lineage</p>	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;The kidney, including the kidney epithelial cells, arises from OSR1+ mesenchymal progenitor cells in the intermediate mesoderm. As a type of kidney epithelial cells, podocytes arise from cap mesenchyme progenitor cells and require activation of SIX2, PAX2 and WT1. Ref: <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC4163204/"><em>Shankland et al., 2014</em></a>. </p>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Key Gene Ontology Terms associated with Podocyte </p>	
	<!--p>&nbsp;&nbsp;&nbsp;&nbsp;Podocytes are associated with the following GO terms: -->
		<ul>
			<li><strong>Podocyte foot process</strong> (<a href="http://purl.obolibrary.org/obo/GO_0098846">GO_0098846</a>): The podocyte foot processes called <em>pedicels</em> wrap around the capillaries and leave slits between them. Blood is filtered through these slits, each known as a filtration slit, slit diaphragm, or slit pore. </li>				
			<li><strong>Regulation of glomerular filtration</strong> (<a href="http://purl.obolibrary.org/obo/GO_0003093">GO_0003093</a>): When podocytes contract, they cause closure of filtration slits, which further decreases the glomerular filtration rate (GFR) by reducing the surface area available for filtration. </li>			
		</ul>
	</p>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Biomarkers (<em>check more</em>: <a href="podocyte-hubmat.php">Podocyte HuBMAT</a>)</p>	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;Podocyte-related biomarkers extracted from HuBMAP <a href="https://hubmapconsortium.github.io/ccf/pages/ccf-anatomical-structures.html">ASCT-B Tables</a>:   
		<ul>
			<li><strong>NPHS1 (nephrin)</strong>: <a href="http://purl.obolibrary.org/obo/OGG_3000004868">OGG_3000004868</a>. <a href="http://purl.obolibrary.org/obo/PR_000011365">PR_000011365</a>. HGNC: <a href="https://www.alliancegenome.org/gene/HGNC:7908">7908</a>. GeneCards: <a href="https://www.genecards.org/cgi-bin/carddisp.pl?gene=NPHS1">NPHS1</a>. References:  <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6597610/">PMC6597610</a> ,  <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7213795/">PMC7213795</a>, <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6597610/">PMC6597610</a> </li> 			
			<li><strong>NPHS2 (podocin)</strong>: <a href="http://purl.obolibrary.org/obo/OGG_3000007827">OGG_3000007827</a>. <a href="http://purl.obolibrary.org/obo/PR_000011366">PR_000011366</a>. HGNC: <a href="https://www.alliancegenome.org/gene/HGNC:13394">13394</a>. GeneCards: <a href="https://www.genecards.org/cgi-bin/carddisp.pl?gene=NPHS2">NPHS2</a>. References: <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6597610/">PMC6597610</a>, <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7213795/">PMC7213795</a>.
			<li><strong>PODXL (podocalyxin)</strong>: <a href="http://purl.obolibrary.org/obo/OGG_3000005420">OGG_3000005420</a>. <a href="http://purl.obolibrary.org/obo/PR_000012955">PR_000012955</a>. HGNC:<a href="https://www.alliancegenome.org/gene/HGNC:9171">9171</a>. GeneCards: <a href="https://www.genecards.org/cgi-bin/carddisp.pl?gene=PODXL">PODXL</a>. References: <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6597610/">PMC6597610</a>, <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC7213795/">PMC7213795</a>, <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC6597610/">PMC6597610</a>.	
			<li><strong>PTPRQ (Protein Tyrosine Phosphatase Receptor Type Q)</strong>: <a href="http://purl.obolibrary.org/obo/OGG_3000374462">OGG_3000374462</a>. <a href="http://purl.obolibrary.org/obo/PR_000013477">PR_000013477</a>. HGNC: <a href="https://www.alliancegenome.org/gene/HGNC:9679">9679</a>. GeneCards: <a href="https://www.genecards.org/cgi-bin/carddisp.pl?gene=PTPRQ">PTPRQ</a>. </li> 			
		</ul>
	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;<em><strong>Note:</strong></em> Check more information from our <a href="podocyte-hubmat.php">Podocyte HuBMAT</a>.</p> 
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Ligands expressed in Podocyte</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;More to add. Stay tuned ... </p>
		
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Receptors expressed in Podocyte</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;More to add. Stay tuned ...</p>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Neighborhood cell types of Podocyte</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;The neighborhood cell types of podocyte are described in detail in the <a href="renal_corpuscle_connectome.php">Renal Corpuscle Cell Connectome</a> page. </p>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Putative ligand-receptor target cell/structure of podocyte</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;More to add. Stay tuned ... </p>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Literature mined podocyte-related gene-gene interactions</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;Please find literature mined results using <a href="https://www.ignet.org/">Ignet</a>: 
		<ul>
			<li><a href="https://www.ignet.org/dignet/searchPubmed.php?keywords=podocyte">Podocyte-related <strong>gene-gene interactions</strong></a></li>
			<li><a href="https://www.ignet.org/dignet/displayNetwork.php?c_query_id=whdrp7yu">Podocyte-related <strong>gene-gene interaction network</strong></a>.</li>	
	</ul> </p>	
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Gene Expression Profiles </p>
	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;Selected podocyte-associated gene expression studies:</p>
		<ul>
			<li><strong><a href="https://www.ncbi.nlm.nih.gov/geo/query/acc.cgi?acc=GSE1545">GSE1545</a></strong>: Human podocyte differentiation. Organism: human.</li>
			<li>See more from: <a href="https://www.ncbi.nlm.nih.gov/geo/browse/?view=series&search=podocyte&display=20&sort=tax">GEO search</a>. </li>
	    </ul>	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;More to add. Stay tuned ... </p>
	
		
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Pathways and Functional Maps</p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;Podocyte-associated pathways and functional maps:</p>
		<ul>
			<li><strong>Nephrin family interactions</strong>: <a href="https://reactome.org/content/detail/R-HSA-373753">Reactome: R-HSA-373753</a>.</li>
	    </ul>	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;More to add. Stay tuned ... </p>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Images </p>	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;Below are two images showing the podocytes inside the glomerulus: </p>
  <blockquote>
	<p><a href="/images/podocyte-glomerulus.png" target="_blank"><img src="../images/podocyte-glomerulus.png" alt="podocytes in glomerulus" height="250" border="0"></a></p>
	  <p>Left: The glomerulus structure that contains podocytes and other cells. Right: peripheral and podocytes highlighted. Copyright: Pinaki Sarder. 
		<br/> <em>Note:</em> The <a href="https://athena.ccr.buffalo.edu/">Sarder Lab Slide Analyzer</a> and <a href="https://athena.ccr.buffalo.edu/">PodoSighter</a> can be used to support podocyte image study.</p>
	  </blockquote>
	
<p style="font-weight:bold; font-size:14px; color:#2A1F55">Cell Line Cells </p>
	<p>&nbsp;&nbsp;&nbsp;&nbsp;The following cell lines are available:
		<ul>
	<li>Human podocyte cell line cells: 
		<ul>
			<li><strong>CIHP-1</strong>: Conditionally Immortalized Human Podocytes-1. Synonymes: AB8/13; AB 8/13; hiPOD. <a href="http://purl.obolibrary.org/obo/CLO_0037390">CLO_0037390</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_W186">CVCL_W186</a>. </li>			
			<li><strong>hAKPC-P</strong>: human Amniotic-fluid Kidney Progenitor Cells-Podocytes. <a href="http://purl.obolibrary.org/obo/CLO_0037391">CLO_0037391</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_YP01">CVCL_YP01</a>. </li>			
			<li><strong>HGVEC.SV1</strong>: Human Glomerular Visceral Epithelial Cells.SV40 transformed 1. <a href="http://purl.obolibrary.org/obo/CLO_0037392">CLO_0037392</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_WW27">CVCL_WW27</a>. </li>			
			<li><strong>HGVEC.SV1A4</strong>: Human Glomerular Visceral Epithelial Cells.SV40 transformed 1 clone A4. Synonymes: HGVEC.SV1 clone A4; HGVEC. <a href="http://purl.obolibrary.org/obo/CLO_0037393">CLO_0037393</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_WW28">CVCL_WW28</a>. </li>			
			<li><strong>HUPEC 001 G0/G0</strong>. Disease: Focal segmental glomerulosclerosis. <a href="http://purl.obolibrary.org/obo/CLO_0037394">CLO_0037394</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_B0C8">CVCL_B0C8</a>. </li>			
			<li><strong>HUPEC 002 FSGS G0/G0</strong>. Disease: Focal segmental glomerulosclerosis. <a href="http://purl.obolibrary.org/obo/CLO_0037395">CLO_0037395</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_B0D0">CVCL_B0D0</a>. </li>			
			<li><strong>HUPEC 003 FSGS G0/G0</strong>. Disease: Focal segmental glomerulosclerosis. <a href="http://purl.obolibrary.org/obo/CLO_0037396">CLO_0037396</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_B0C9">CVCL_B0C9</a>. </li>			
			<li><strong>HUPEC 005 FSGS G1/G2</strong>. Disease: Focal segmental glomerulosclerosis. <a href="http://purl.obolibrary.org/obo/CLO_0037397">CLO_003739</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_B0CA">CVCL_B0CA</a>. </li>			
			<li><strong>STBCi028-A</strong>. Synonymes: SFC018-03-01; SFC018 clone 03-01. <a href="http://purl.obolibrary.org/obo/CLO_0037398">CLO_0037398</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_RB91">CVCL_RB91</a>. </li>			
			<li><strong>STBCi321-A</strong>: Induced pluripotent stem cell. Synonymes: SFC-AD2-01; SB-AD2c1; AD2c1; SBAD02-01; SBAD2-01; SB AD2.1; SBAD2 clone 1. <a href="http://purl.obolibrary.org/obo/CLO_0037399">CLO_0037399</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_ZX54">CVCL_ZX54</a>. </li>			
			<li><strong>STBCi322-A</strong>: Induced pluripotent stem cell. Synonymes: SFC-AD3-01; SB-AD3c1; AD3c1; SBAD03-01; SBAD3-01; SBAD3-1; SB AD3.1; SBAD3 clone 1. <a href="http://purl.obolibrary.org/obo/CLO_0037420">CLO_0037420</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_ZX55">CVCL_ZX55</a>. </li>	
		</ul>
	</li>
	
	<li>Mouse podocyte cell line cells: 
		<ul>
			<li><strong>E11 [Mouse]</strong>: <a href="http://purl.obolibrary.org/obo/CLO_0037384">CLO_0037384</a>. <a href="https://web.expasy.org/cellosaurus/CVCL_5737">CVCL_5737</a>. </li>			
			<li><strong>MPC-1</strong>: Mouse Podocyte Clone-1. Synonymes: MPC1. <a href="http://purl.obolibrary.org/obo/CLO_0037385">CLO_0037385</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_AS86">CVCL_AS86</a>. </li>			
			<li><strong>MPC-5</strong>: Mouse Podocyte Clone-5. Synonymes: MPC5. <a href="http://purl.obolibrary.org/obo/CLO_0037386">CLO_0037386</a>.See also: <a href="https://web.expasy.org/cellosaurus/CVCL_AS87">CVCL_AS87</a>. </li>						
			<li><strong>MPC-8</strong>: Mouse Podocyte Clone-8. Synonymes: MPC8. <a href="http://purl.obolibrary.org/obo/CLO_0037387">CLO_0037387</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_AS88">CVCL_AS88</a>. </li>				
			<li><strong>SVI</strong>: derirved from adult mouse. <a href="http://purl.obolibrary.org/obo/CLO_0037388">CLO_0037388</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_5943">CVCL_5943</a>. </li>				
		</ul>
	</li>
			
	<li>Rat podocyte cell line cells: 
		<ul>
			<li><strong>2DNA1D7</strong>: Conditionally immortalized rat podocyte cell. <a href="http://purl.obolibrary.org/obo/CLO_0037389">CLO_0037389</a>. See also: <a href="https://web.expasy.org/cellosaurus/CVCL_XF89">CVCL_XF89</a>. </li>
		</ul>
	</li>
			
	</ul>

<p style="font-weight:bold; font-size:14px; color:#2A1F55">Clinical Significance </p>	
	<p>&nbsp;&nbsp;&nbsp;&nbsp;Many "<strong>abnormal podocyte cell morphology</strong>" (<a href="http://purl.obolibrary.org/obo/HP_0031265">HP_0031265</a>) phenotypes exist:  
		<ul>
			<li>Podocyte foot process effacement (<a href="http://purl.obolibrary.org/obo/HP_0031266">HP_0031266</a>)</li> 			
			<li>Podocyte hypertrophy (<a href="http://purl.obolibrary.org/obo/HP_0020133">HP_0020133</a>)</li> 
			<li>Visceral epithelial cell detachment (<a href="http://purl.obolibrary.org/obo/HP_0033237">HP_0033237</a>)</li> 
			<li>Podocyte microvillous transformation (<a href="http://purl.obolibrary.org/obo/HP_0033238">HP_0033238</a>)</li> 
			<li>Podocyte myelin figures (<a href="http://purl.obolibrary.org/obo/HP_0033265">HP_0033265</a>)</li> 
			<li>Glomerular pseudocrescent (<a href="http://purl.obolibrary.org/obo/HP_0033266">HP_0033266</a>)</li> 
			<li>Binucleated visceral epithelial cells (<a href="http://purl.obolibrary.org/obo/HP_0033296">HP_0033296</a>)</li> 
			<li>Multinucleated visceral epithelial cells (<a href="http://purl.obolibrary.org/obo/HP_0033297">HP_0033297</a>)</li> 
			<li>Visceral epithelial cell hyperplasia (<a href="http://purl.obolibrary.org/obo/HP_0033314">HP_0033314</a>)</li> 
			<li>Visceral epithelial hyaline droplets (<a href="http://purl.obolibrary.org/obo/HP_0033315">HP_0033315</a>)</li> 
			<li>Podocyte infolding (<a href="http://purl.obolibrary.org/obo/HP_0033483">HP_0033483</a>)</li> 
			<li>Podocyte cytoskeletal condensation (<a href="http://purl.obolibrary.org/obo/HP_0033492">HP_0033492</a>)</li> 
		</ul>
	
	<p>&nbsp;&nbsp;&nbsp;&nbsp; Podocyte-related diseases also exist:  
		<ul>
			<li>lipoid nephrosis (<a href="http://purl.obolibrary.org/obo/MONDO_0006835">MONDO_0006835</a>)</li> 		
		</ul>	
	</p>

<p style="font-weight:bold; font-size:14px; color:#2A1F55">References: </p>	
<ul>
	<li>Wiki: <a href="https://en.wikipedia.org/wiki/Podocyte">https://en.wikipedia.org/wiki/Podocyte</a>. </li>
	<li>Govind D, Becker JU, Miecznikowski J, Rosenberg AZ, Dang J, Tharaux PL, Yacoub R, Thaiss F, Hoyer PF, Manthey D, Lutnick B, Worral AM, Mohammad I, Walavalkar V, Tomaszewski JE, Jen K, Sarder P. <a href="https://jasn.asnjournals.org/content/32/11/2795.long">PodoSighter: A cloud-based tool for label-free podocyte detection in kidney whole-slide images</a>. <em>J Am Soc Nephrol</em>. 2021. 32(11):2795-2813. PMID: <a href="https://pubmed.ncbi.nlm.nih.gov/34479966/">34479966</a>. </li> 
</ul>

<p><em><strong>Note: </strong></em> This is a manually generated website. Lessons learned will be used for automatic cell card content generation. <a href="contactus.php">Feedback</a> is welcome. Thanks!</p> 
<!-- InstanceEndEditable -->
</div>
<div id="footer"> 
	<!--div id="footer_hl"> </div-->
	<hr style="width:924px; background-color:#14275D; height:aut; margin-left:auto; margin-right:auto; margin-bottom:2px;" />
		
<table width="100%" height="50px" border="0" cellspacing="0" cellpadding="0">
	<tr>	
		<td width="300"><a href="https://www.lbl.gov/" target="_blank"><img src="images/BL_logo2.png" alt="BL Logo" height="27" border="0"></a></td> 
		<td width="300"><a href="https://www.buffalo.edu/" target="_blank"><img src="images/UB-logo.png" alt="UB Logo" height="30" border="0"></a></td>
		<td width="300"><a href="https://www.uky.edu/" target="_blank"><img src="images/UK_UnivKentucky_lockup_wildcat-blue.svg" alt="UK Logo"  height="30" border="0"></a></td>
		<td width="300"><a href="http://www.umich.edu" target="_blank"><img src="images/UM_Logo2.png" alt="UM Logo"  height="17" border="0"></a></td>	
		<td width="300"><a href="https://und.edu/" target="_blank"><img src="images/UND-smhs-logo.png" alt="UND Logo" height="25" border="0"></a></td>	
		<td width="300"><a href="https://medicine.wustl.edu/" target="_blank"><img src="images/WU_logo.png" alt="WU Logo" height="43" border="0"></a></td>
	</tr>	
</table>
</div>
</body>
<!-- InstanceEnd --></html>
