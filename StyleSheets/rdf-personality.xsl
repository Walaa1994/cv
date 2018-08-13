<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
				xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
				xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                xmlns:cv="http://rdfs.org/resume-rdf/cv.rdfs#"
				xmlns:vcard="http://www.w3.org/2006/vcard/ns#"
				xmlns:foaf="http://xmlns.com/foaf/0.1/">

<xsl:template match="/">
    <rdf:RDF>
	
	<!-- CV -->
	<xsl:variable name="id"><xsl:value-of select="resume/ID"/></xsl:variable>
	
	    <rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/CV#{$id}">
            
			<cv:cvTitle><xsl:value-of select="resume/ID"/></cv:cvTitle>
			
			<cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_openness"/>
	        <cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_conscientiousness"/>
			<cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_extraversion"/>
			<cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_agreeableness"/>
			<cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_neuroticism"/>

	    </rdf:Description>
	
		
		<!-- Other Info -->
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_openness">
		    <cv:otherInfoType>openness</cv:otherInfoType>  
		    <cv:otherInfoDescription> <xsl:value-of select="resume/openness"/> </cv:otherInfoDescription> 			
        </rdf:Description>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_conscientiousness">
		    <cv:otherInfoType>conscientiousness</cv:otherInfoType>  
		    <cv:otherInfoDescription> <xsl:value-of select="resume/conscientiousness"/> </cv:otherInfoDescription>  			
        </rdf:Description>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_extraversion">
		    <cv:otherInfoType>extraversion</cv:otherInfoType>  
		    <cv:otherInfoDescription> <xsl:value-of select="resume/extraversion"/> </cv:otherInfoDescription>  			
        </rdf:Description>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_agreeableness">
		    <cv:otherInfoType>agreeableness</cv:otherInfoType>  
		    <cv:otherInfoDescription> <xsl:value-of select="resume/agreeableness"/> </cv:otherInfoDescription>  			
        </rdf:Description>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_neuroticism">
		    <cv:otherInfoType>neuroticism</cv:otherInfoType>  
		    <cv:otherInfoDescription> <xsl:value-of select="resume/neuroticism"/> </cv:otherInfoDescription>  			
        </rdf:Description>

		
	</rdf:RDF>
</xsl:template>

</xsl:stylesheet>