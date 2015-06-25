<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <!-- вывести как html -->
    <xsl:template match="/"><!-- из корня документа с данными -->
        <html>
            <head>
                <title>
                    <xsl:value-of select="/data/title"/>
                </title>
            </head>
            <body>
                <b><xsl:value-of select="/data/owner"/>:
                </b>
                &#160;<!-- вместе $nbsp; используем: &#160; -->
                <xsl:for-each select="/data/my_test/*"><!-- цикл для каждого элемента из блока: /data/my_test/* -->
                    <xsl:if test="position()!=1" xml:space="preserve">, </xsl:if>
                    <!-- проставить запятые строго между элементами (вне элементов не ставим - ни до, ни после) -->
                    <xsl:value-of select="."/>
                    <!-- получить содержимое "value-of", из узла с любым именем: select="." -->
                </xsl:for-each>

                <table border="1">
                    <b><xsl:value-of select="/data/animals/title"/>:
                    </b>
                    <xsl:for-each select="/data/animals/dogs/dog"><!-- цикл для каждого элемента из блока: /data/animals/dogs/dog -->
                        <tr>
                            <td>
                                <xsl:value-of select="dogName"/>
                                <!-- получить содержимое "value-of", из узла с именем: dogName -->
                            </td>
                            <td>
                                <xsl:value-of select="dogWeight"/>
                                <!-- получить содержимое "value-of", из узла с именем: dogWeight -->
                                <xsl:value-of select="dogWeight/@caption"/>
                                <!-- получить содержимое "value-of", из узла с именем: dogWeight и аттрибутом: caption -->
                            </td>
                            <td>
                                <xsl:value-of select="dogColor"/>
                                <!-- получить содержимое "value-of", из узла с именем: dogColor -->
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>