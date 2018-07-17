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
            <cv:aboutPerson rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/Person#{$id}"/>
			
			<xsl:for-each  select="resume/Education">
			    <xsl:variable name="edudeg"><xsl:value-of select="degreeType"/></xsl:variable>
			    <cv:hasEducation rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/Education#{$id}_{$edudeg}"/>
			</xsl:for-each>
		
		    <xsl:for-each  select="resume/WorkExperience">
			    <xsl:variable name="stdate"><xsl:value-of select="startDate"/></xsl:variable>
			    <cv:hasWorkHistory rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/WorkHistory#{$id}_{$stdate}"/>
			</xsl:for-each>
		    
			
			<xsl:for-each  select="resume/PersonalSkills">
			    <xsl:variable name="skillName"><xsl:value-of select="skillName"/></xsl:variable>
			    <cv:hasSkill rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/Skill#{$id}_{$skillName}"/>
			</xsl:for-each>
			
			<xsl:for-each  select="resume/Language">
			    <xsl:variable name="langName"><xsl:value-of select="Name"/></xsl:variable>
			    <cv:hasSkill rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/LanguageSkill#{$id}_{$langName}"/>
			</xsl:for-each>
		    
		    <cv:hasReferenc rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/Refernece#{$id}"/>
			<cv:cvIsActive><xsl:value-of select="resume/IsActive"/></cv:cvIsActive>
			<cv:cvTitle><xsl:value-of select="resume/ID"/></cv:cvTitle>
			
			<cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_openness"/>
	        <cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_conscientiousness"/>
			<cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_extraversion"/>
			<cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_agreeableness"/>
			<cv:hasOtherInfo rdf:resource="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_neuroticism"/>
	    </rdf:Description>
		
	
		
		<!-- personal info -->
	
	    <xsl:for-each  select="resume/PersonalInfo">
		
	    <rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/Person#{$id}">
		<xsl:variable name="gen"><xsl:value-of select="gender"/></xsl:variable>
		<xsl:variable name="tel"><xsl:value-of select="Telephone"/></xsl:variable>
		<xsl:variable name="email"><xsl:value-of select="Email"/></xsl:variable>
		<xsl:variable name="marital"><xsl:value-of select="MaritalStatus"/></xsl:variable>
		
            <foaf:firstName> <xsl:value-of select="firstName"/> </foaf:firstName>
			<foaf:lastName> <xsl:value-of select="lastName"/> </foaf:lastName>
			<foaf:birthday> <xsl:value-of select="birthday"/> </foaf:birthday> 
			<cv:gender rdf:resource="http://rdfs.org/resume-rdf/base.rdfs#{$gen}"/>
			<cv:hasNationality> <xsl:value-of select="Nationality"/> </cv:hasNationality>
			<cv:maritalStatus rdf:resource="http://rdfs.org/resume-rdf/base.rdfs#{$marital}"/>
			
			<vcard:hasAddress rdf:parseType="Resource">
			    <vcard:country-name> <xsl:value-of select="country-name"/> </vcard:country-name>
				<vcard:locality> <xsl:value-of select="locality"/> </vcard:locality>
			    <vcard:street-address> <xsl:value-of select="street-address"/> </vcard:street-address>             
            </vcard:hasAddress>
			
			<foaf:phone rdf:resource="tel:{$tel}"/> 
			<foaf:mbox rdf:resource="mailto:{$email}"/> 
		</rdf:Description>
		
		</xsl:for-each>
		
	    <!-- education -->
		<xsl:for-each  select="resume/Education">
		<xsl:variable name="edudeg"><xsl:value-of select="degreeType"/></xsl:variable>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/Education#{$id}_{$edudeg}">
            <cv:eduMajor> <xsl:value-of select="eduMajor"/> </cv:eduMajor>
			<cv:eduMinor> <xsl:value-of select="eduMinor"/> </cv:eduMinor>
			<cv:eduStartDate> <xsl:value-of select="eduStartDate"/> </cv:eduStartDate>
			<cv:eduGradDate> <xsl:value-of select="eduGradDate"/> </cv:eduGradDate>
			<cv:studiedIn> <xsl:value-of select="studiedIn"/> </cv:studiedIn>           <!-- تحتاج لمراجعة -->
			<cv:degreeType rdf:resource="http://rdfs.org/resume-rdf/base.rdfs#{$edudeg}"/>
		</rdf:Description>
		
		</xsl:for-each>
		
		<!-- WorkExperience -->
		
		<xsl:for-each  select="resume/WorkExperience">
		<xsl:variable name="startdate"><xsl:value-of select="startDate"/></xsl:variable>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/WorkHistory#{$id}_{$startdate}">
		<xsl:variable name="career"><xsl:value-of select="careerLevel"/></xsl:variable>
		<xsl:variable name="jtype"><xsl:value-of select="jobType"/></xsl:variable>
		<xsl:variable name="bool"><xsl:value-of select="isCurrent"/></xsl:variable>
		
		    <cv:employedIn> <xsl:value-of select="employedIn"/> </cv:employedIn>       <!-- تحتاج لمراجعة -->
			<cv:jobTitle> <xsl:value-of select="jobTitle"/> </cv:jobTitle>
			<cv:startDate> <xsl:value-of select="startDate"/> </cv:startDate>
			<cv:endDate> <xsl:value-of select="endDate"/> </cv:endDate>
			<cv:careerLevel rdf:resource="http://rdfs.org/resume-rdf/base.rdfs#{$career}"/>
			<cv:jobType rdf:resource="http://rdfs.org/resume-rdf/base.rdfs#{$jtype}"/>
			<cv:isCurrent rdf:resource="http://rdfs.org/resume-rdf/base.rdfs#{$bool}"/>
        </rdf:Description>
		
		</xsl:for-each>
		
		<!-- Personal Skills -->
		<xsl:for-each  select="resume/PersonalSkills">
		<xsl:variable name="skillName"><xsl:value-of select="skillName"/></xsl:variable>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/Skill#{$id}_{$skillName}">
		    <cv:skillName> <xsl:value-of select="skillName"/> </cv:skillName>
			<cv:skillYearsExperience> <xsl:value-of select="skillYearsExperience"/> </cv:skillYearsExperience>
			<cv:skillLevel> <xsl:value-of select="skillLevel"/> </cv:skillLevel>
        </rdf:Description>
		
		</xsl:for-each>
		
		<!-- Language -->
		<xsl:for-each  select="resume/Language">
		<xsl:variable name="langName"><xsl:value-of select="Name"/></xsl:variable>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/LanguageSkill#{$id}_{$langName}">
		    <cv:skillName> <xsl:value-of select="Name"/> </cv:skillName>
			<cv:skillLevel> <xsl:value-of select="SpokenLevel"/> </cv:skillLevel>     <!-- SpokenLevel-->
			<cv:lngSkillLevelReading> <xsl:value-of select="ReadingLevel"/> </cv:lngSkillLevelReading>
            <cv:lngSkillLevelWritten> <xsl:value-of select="WritingLevel"/> </cv:lngSkillLevelWritten>			
        </rdf:Description>
		
		</xsl:for-each>
		
		<!-- References -->
		<xsl:for-each  select="resume/References">
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/Refernece#{$id}">
		<xsl:variable name="phone"><xsl:value-of select="Phone"/></xsl:variable>
		<xsl:variable name="em"><xsl:value-of select="Email"/></xsl:variable>
		   <cv:referenceBy>
		        <cv:Person>
				    <foaf:name> <xsl:value-of select="Name"/> </foaf:name>
					<foaf:phone rdf:resource="tel:{$phone}"/>
					<foaf:mbox rdf:resource="mailto:{$em}"/> 
				</cv:Person>
		   </cv:referenceBy>
        </rdf:Description>
		</xsl:for-each>
		
		<!-- Other Info -->
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_openness">
		    <cv:otherInfoType>openness</cv:otherInfoType>   			
        </rdf:Description>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_conscientiousness">
		    <cv:otherInfoType>conscientiousness</cv:otherInfoType>    			
        </rdf:Description>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_extraversion">
		    <cv:otherInfoType>extraversion</cv:otherInfoType>    			
        </rdf:Description>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_agreeableness">
		    <cv:otherInfoType>agreeableness</cv:otherInfoType>    			
        </rdf:Description>
		
		<rdf:Description rdf:about="http://rdfs.org/resume-rdf/cv.rdfs/OtherInfo#{$id}_neuroticism">
		    <cv:otherInfoType>neuroticism</cv:otherInfoType>    			
        </rdf:Description>
		
	</rdf:RDF>
</xsl:template>

</xsl:stylesheet>