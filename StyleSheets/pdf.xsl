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
				<xsl:value-of select="sentence[@id='2']/tokens/token[@id='8']/word"/>
				<xsl:value-of select="sentence[@id='2']/tokens/token[@id='9']/word"/>
	</birthday>

    <Nationality><xsl:value-of select="sentence[@id='3']/tokens/token[@id='3']/word"/></Nationality>

    <MaritalStatus><xsl:value-of select="sentence[@id='4']/tokens/token[@id='5']/word"/></MaritalStatus>

    <gender><xsl:value-of select="sentence[@id='5']/tokens/token[@id='3']/word"/></gender>

    <country-name><xsl:value-of select="sentence[@id='6']/tokens/token[@id='7']/word"/></country-name>

    <locality><xsl:value-of select="sentence[@id='6']/tokens/token[@id='5']/word"/></locality>

    <street-address><xsl:value-of select="sentence[@id='6']/tokens/token[@id='3']/word"/></street-address>

    <Email><xsl:value-of select="sentence[@id='7']/tokens/token[@id='3']/word"/></Email>

    <Telephone><xsl:value-of select="sentence[@id='8']/tokens/token[@id='3']/word"/><xsl:value-of select="sentence[@id='8']/tokens/token[@id='4']/word"/></Telephone>
</PersonalInfo>

<Education>
	    <eduMajor><xsl:value-of select="sentence[@id='9']/tokens/token[@id='5']/word"/></eduMajor>                     
		<eduMinor><xsl:value-of select="sentence[@id='10']/tokens/token[@id='3']/word"/>
	              <xsl:value-of select="sentence[@id='10']/tokens/token[@id='4']/word"/></eduMinor> 

        <eduStartDate><xsl:value-of select="sentence[@id='11']/tokens/token[@id='5']/word"/>
				<xsl:value-of select="sentence[@id='11']/tokens/token[@id='6']/word"/>
				<xsl:value-of select="sentence[@id='11']/tokens/token[@id='7']/word"/>
				<xsl:value-of select="sentence[@id='11']/tokens/token[@id='8']/word"/>
				<xsl:value-of select="sentence[@id='11']/tokens/token[@id='9']/word"/>
			    <xsl:value-of select="sentence[@id='11']/tokens/token[@id='10']/word"/></eduStartDate>     
                                                       
		<eduGradDate><xsl:value-of select="sentence[@id='12']/tokens/token[@id='6']/word"/>
				<xsl:value-of select="sentence[@id='12']/tokens/token[@id='7']/word"/>
				<xsl:value-of select="sentence[@id='12']/tokens/token[@id='8']/word"/>
				<xsl:value-of select="sentence[@id='12']/tokens/token[@id='9']/word"/>
				<xsl:value-of select="sentence[@id='12']/tokens/token[@id='10']/word"/></eduGradDate>

        <studiedIn><xsl:value-of select="sentence[@id='13']/tokens/token[@id='4']/word"/><xsl:value-of select="sentence[@id='13']/tokens/token[@id='5']/word"/></studiedIn>   

		<degreeType><xsl:value-of select="sentence[@id='14']/tokens/token[@id='5']/word"/></degreeType>         
		                                               
	</Education>
</resume>

</xsl:template>

</xsl:stylesheet>