<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
				xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
				xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                xmlns:cv="http://rdfs.org/resume-rdf/cv.rdfs#"
				xmlns:vcard="http://www.w3.org/2006/vcard/ns#"
				xmlns:foaf="http://xmlns.com/foaf/0.1/">

<xsl:template match="/">
    <rdf:RDF>
	
	<!-- Announcement -->
	<xsl:variable name="id"><xsl:value-of select="announcement/ID"/></xsl:variable>
	
	    <rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/CV#{$id}">
		    <cv:hasTarget rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/Target#{$id}"/>
            <cv:aboutPerson rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/Person#{$id}"/>
			
			<xsl:for-each  select="announcement/Education">
			    <xsl:variable name="edudeg"><xsl:value-of select="degreeType"/></xsl:variable>
			    <cv:hasEducation rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/Education#{$id}_{$edudeg}"/>
			</xsl:for-each>
			
			<xsl:for-each  select="announcement/PersonalSkills">
			    <xsl:variable name="skillName"><xsl:value-of select="skillName"/></xsl:variable>
			    <cv:hasSkill rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/Skill#{$id}_{$skillName}"/>
			</xsl:for-each>
			
			<xsl:for-each  select="announcement/Language">
			    <xsl:variable name="langName"><xsl:value-of select="Name"/></xsl:variable>
			    <cv:hasSkill rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/LanguageSkill#{$id}_{$langName}"/>
			</xsl:for-each>
		   
			<cv:cvIsActive><xsl:value-of select="announcement/IsActive"/></cv:cvIsActive>
	    </rdf:Description>
		
	    <!-- Basic info -->
	
	    <xsl:for-each  select="announcement/BasicInfo">
		
	    <rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/Target#{$id}">
	    	<cv:targetJobDescription> <xsl:value-of select="jobtitle"/> </cv:targetJobDescription>
		    <cv:targetJobMode> <xsl:value-of select="jobMode"/> </cv:targetJobMode>
			<cv:targetJobType> <xsl:value-of select="jobType"/> </cv:targetJobType>
			<cv:targetSalary> <xsl:value-of select="Salary"/> </cv:targetSalary>
		</rdf:Description>
		
		</xsl:for-each>
		
		<!-- personal info -->
	
	    <xsl:for-each  select="announcement/PersonalInfo">
		
	    <rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/Person#{$id}">
		    <vcard:locality> <xsl:value-of select="locality"/> </vcard:locality>
		</rdf:Description>
		
		</xsl:for-each>
		
	    <!-- education -->
		<xsl:for-each  select="announcement/Education">
		<xsl:variable name="edudeg"><xsl:value-of select="degreeType"/></xsl:variable>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/Education#{$id}_{$edudeg}">
            <cv:eduMajor> <xsl:value-of select="eduMajor"/> </cv:eduMajor>
			<cv:eduMinor> <xsl:value-of select="eduMinor"/> </cv:eduMinor>          
			<cv:degreeType rdf:resource="http://rdfs.org/resume-rdf/base.rdfs#{$edudeg}"/>
		</rdf:Description>
		
		</xsl:for-each>
		
		<!-- Personal Skills -->
		<xsl:for-each  select="announcement/PersonalSkills">
		<xsl:variable name="skillName"><xsl:value-of select="skillName"/></xsl:variable>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/Skill#{$id}_{$skillName}">
		    <cv:skillName> <xsl:value-of select="skillName"/> </cv:skillName>
			<cv:skillYearsExperience> <xsl:value-of select="skillYearsExperience"/> </cv:skillYearsExperience>
        </rdf:Description>
		
		</xsl:for-each>
		
		<!-- Language -->
		<xsl:for-each  select="announcement/Language">
		<xsl:variable name="langName"><xsl:value-of select="Name"/></xsl:variable>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/LanguageSkill#{$id}_{$langName}">
		    <cv:skillName> <xsl:value-of select="Name"/> </cv:skillName>		
        </rdf:Description>
		
		</xsl:for-each>
		
	</rdf:RDF>
</xsl:template>

</xsl:stylesheet>