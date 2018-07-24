<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
				xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="root/document/sentences">

<resume>
<PersonalInfo>
	
	<firstName><xsl:value-of select="sentence[@id='1']/tokens/token[@id='9']/word"/></firstName> 

	<lastName><xsl:value-of select="sentence[@id='1']/tokens/token[@id='10']/word"/></lastName>

	<birthday><xsl:value-of select="sentence[@id='2']/tokens/token[@id='5']/word"/>
				<xsl:value-of select="sentence[@id='2']/tokens/token[@id='6']/word"/>
				<xsl:value-of select="sentence[@id='2']/tokens/token[@id='7']/word"/>
	</birthday>

    <Nationality><xsl:value-of select="sentence[@id='3']/tokens/token[@id='3']/word"/></Nationality>

    <MaritalStatus><xsl:value-of select="sentence[@id='4']/tokens/token[@id='4']/word"/></MaritalStatus>

    <gender><xsl:value-of select="sentence[@id='5']/tokens/token[@id='3']/word"/></gender>

    <country-name><xsl:value-of select="sentence[@id='6']/tokens/token[@id='7']/word"/></country-name>

    <locality><xsl:value-of select="sentence[@id='6']/tokens/token[@id='5']/word"/></locality>

    <street-address><xsl:value-of select="sentence[@id='6']/tokens/token[@id='3']/word"/></street-address>

    <Email><xsl:value-of select="sentence[@id='7']/tokens/token[@id='3']/word"/></Email>

    <Telephone><xsl:value-of select="sentence[@id='8']/tokens/token[@id='3']/word"/></Telephone>
</PersonalInfo>

<Education>
	    <eduMajor><xsl:value-of select="sentence[@id='9']/tokens/token[@id='5']/word"/></eduMajor>                     
		<eduMinor><xsl:value-of select="sentence[@id='10']/tokens/token[@id='3']/word"/>
	              <xsl:value-of select="sentence[@id='10']/tokens/token[@id='4']/word"/></eduMinor> 

        <eduStartDate><xsl:value-of select="sentence[@id='11']/tokens/token[@id='4']/word"/>
				<xsl:value-of select="sentence[@id='11']/tokens/token[@id='5']/word"/>
				<xsl:value-of select="sentence[@id='11']/tokens/token[@id='6']/word"/>
		</eduStartDate>     
                                                       
		<eduGradDate><xsl:value-of select="sentence[@id='12']/tokens/token[@id='5']/word"/>
				<xsl:value-of select="sentence[@id='12']/tokens/token[@id='6']/word"/>
				<xsl:value-of select="sentence[@id='12']/tokens/token[@id='7']/word"/>
		</eduGradDate>

        <studiedIn><xsl:value-of select="sentence[@id='13']/tokens/token[@id='3']/word"/>
        		    <xsl:value-of select="sentence[@id='13']/tokens/token[@id='4']/word"/></studiedIn>   

		<degreeType><xsl:value-of select="sentence[@id='14']/tokens/token[@id='4']/word"/></degreeType>         
		                                               
	</Education>

	<WorkExperience>
	    <employedIn><xsl:value-of select="sentence[@id='15']/tokens/token[@id='6']/word"/></employedIn> 

		<jobTitle><xsl:value-of select="sentence[@id='16']/tokens/token[@id='4']/word"/>
	              <xsl:value-of select="sentence[@id='16']/tokens/token[@id='5']/word"/></jobTitle> 

		<startDate><xsl:value-of select="sentence[@id='17']/tokens/token[@id='3']/word"/>
				<xsl:value-of select="sentence[@id='17']/tokens/token[@id='4']/word"/>
				<xsl:value-of select="sentence[@id='17']/tokens/token[@id='5']/word"/>
		</startDate>

	    <endDate><xsl:value-of select="sentence[@id='18']/tokens/token[@id='3']/word"/>
				<xsl:value-of select="sentence[@id='18']/tokens/token[@id='4']/word"/>
				<xsl:value-of select="sentence[@id='18']/tokens/token[@id='5']/word"/>
		</endDate>

		<careerLevel><xsl:value-of select="sentence[@id='19']/tokens/token[@id='3']/word"/></careerLevel>         
																 
		<jobType><xsl:value-of select="sentence[@id='20']/tokens/token[@id='4']/word"/></jobType>                  
		<isCurrent><xsl:value-of select="sentence[@id='21']/tokens/token[@id='4']/word"/></isCurrent>                 
	</WorkExperience>

	<PersonalSkills>
	    <skillName><xsl:value-of select="sentence[@id='22']/tokens/token[@id='7']/word"/></skillName>
		<skillYearsExperience><xsl:value-of select="sentence[@id='23']/tokens/token[@id='5']/word"/></skillYearsExperience>
		<skillLevel><xsl:value-of select="sentence[@id='24']/tokens/token[@id='4']/word"/></skillLevel>                       
	</PersonalSkills>

	<Language>                                         
	    <Name><xsl:value-of select="sentence[@id='25']/tokens/token[@id='6']/word"/></Name>
		<SpokenLevel><xsl:value-of select="sentence[@id='26']/tokens/token[@id='3']/word"/></SpokenLevel>                                
		<ReadingLevel><xsl:value-of select="sentence[@id='27']/tokens/token[@id='3']/word"/></ReadingLevel>                  
		<WritingLevel><xsl:value-of select="sentence[@id='28']/tokens/token[@id='3']/word"/></WritingLevel>                  
	</Language>

	<References>
	<Name><xsl:value-of select="sentence[@id='29']/tokens/token[@id='5']/word"/>
          <xsl:value-of select="sentence[@id='29']/tokens/token[@id='6']/word"/></Name>

	<Phone><xsl:value-of select="sentence[@id='30']/tokens/token[@id='3']/word"/></Phone>

	<Email><xsl:value-of select="sentence[@id='31']/tokens/token[@id='3']/word"/></Email>
	</References>

	<IsActive><xsl:value-of select="sentence[@id='33']/tokens/token[@id='4']/word"/></IsActive>

	<jobposition><xsl:value-of select="sentence[@id='32']/tokens/token[@id='6']/word"/>
    <xsl:value-of select="sentence[@id='32']/tokens/token[@id='7']/word"/></jobposition>
</resume>

</xsl:template>

</xsl:stylesheet>