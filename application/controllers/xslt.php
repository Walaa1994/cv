<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Xslt extends CI_Controller {

		public function xslt_cv($xml_path="C:\\xampp\\htdocs\\cv\\cvform.xml"){
			$xml = new DOMDocument;
			$xml->load($xml_path);

			// Load XSL file
			$styleSheet_path = base_url().'/StyleSheets/XML-To-RDF.xsl';

			$xsl = new DOMDocument;
			$xsl->load($styleSheet_path);

			// Configure the transformer
			$proc = new XSLTProcessor;

			// Attach the xsl rules
			$proc->importStyleSheet($xsl);
			$proc->transformToURI($xml, 'C:\Users\Roula Arab\Desktop\now\result.xml');
		}

		public function xslt_announcement($xml_path="C:\\xampp\\htdocs\\cv\\Announcement_Form.xml"){
			$xml = new DOMDocument;
			$xml->load($xml_path);

			// Load XSL file
			$styleSheet_path = base_url().'/StyleSheets/Announcement_To_RDF.xsl';

			$xsl = new DOMDocument;
			$xsl->load($styleSheet_path);

			// Configure the transformer
			$proc = new XSLTProcessor;

			// Attach the xsl rules
			$proc->importStyleSheet($xsl);
			$proc->transformToURI($xml, 'C:\Users\Roula Arab\Desktop\now\result1.xml');
		}
}