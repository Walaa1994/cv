<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
				xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="root/document/sentences">

<resume>
<PersonalInfo>
	
	<firstName><xsl:value-of select="sentence[@id='1']/tokens/token[@id='3']/word"/></firstName> 
	<lastName><xsl:value-of select="sentence[@id='1']/tokens/token[@id='4']/word"/></lastName>
	
</PersonalInfo>
</resume>

</xsl:template>

</xsl:stylesheet>