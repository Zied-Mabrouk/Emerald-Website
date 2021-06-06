Tri dynamique de tableau html, multi colonnes, orienté objet, ie et  ff-----------------------------------------------------------------------
Url     : http://codes-sources.commentcamarche.net/source/35462-tri-dynamique-de-tableau-html-multi-colonnes-oriente-objet-ie-et-ffAuteur  : cs_vb1Date    : 04/08/2013
Licence :
=========

Ce document intitulé « Tri dynamique de tableau html, multi colonnes, orienté objet, ie et  ff » issu de CommentCaMarche
(codes-sources.commentcamarche.net) est mis à disposition sous les termes de
la licence Creative Commons. Vous pouvez copier, modifier des copies de cette
source, dans les conditions fixées par la licence, tant que cette note
apparaît clairement.

Description :
=============

Evolution du script : <a href='http://www.javascriptfr.com/code.aspx?ID=34180' t
arget='_blank'>http://www.javascriptfr.com/code.aspx?ID=34180</a> (auteur zilx).

<br />Pas besoins de modifier le tableau a trier :
<br />Les fleches permetta
nt d'activer le tri sur tel ou tel colonne sont ajout&eacute;es par le script da
ns les ent&ecirc;tes ainsi que les &eacute;v&egrave;nements correspondant (onCli
ck).
<br />Ce script utilise la tr&egrave;s bonne librairie prototype.js que vo
us pouvez t&eacute;l&eacute;charger ici : <a href='http://prototype.conio.net/' 
target='_blank'>http://prototype.conio.net/</a>
<br />
<br />Ajouts:
<br />  
- La fl&egrave;che de tri utilis&eacute;e devient rouge pour indiquer le sens de
 tri.
<br />  - Un nombre est ajout&eacute; dans le titre des colonnes tri&eacu
te;es pour indiquer l'ordre dans lequels elles ont &eacute;t&eacute; tri&eacute;
es.
<br />  - La s&eacute;l&eacute;ction des colonnes &agrave; trier se fait ma
intenant dans l'ordre naturel ! De la plus &agrave; la moins importante.
<br />
  - Il est possible de d&eacute;sactiver le tri d'une colonne en re-cliquant sur
 un bouton d&eacute;j&agrave; actif.
<br />  - Possibilit&eacute; de modifier l
'ordre d'affichage des colonne en fonction de leur ordre de tri ( option &agrave
; l'instanciation )
<br />  - Recherche automatique du type de donn&eacute;es d
ans les lignes suivantes si la 1ere est vide
<br />  - Remplacement des balises
 ( ...) par la fonction unescapeHTML de prototype.js pour ne pas g&eacute;ner l'
ordre de tri
<br />  - Remplacement des accents pour ne pas g&eacute;ner l'ordr
e de tri ( ils restent &agrave; l'affichage )
<br />
<br />Corrections:
<br /
>  - Fonctionne maintenant sous IE et FireFox
<br />  - La fonction de tri &eac
ute;tait appel&eacute;e 2x &agrave; tort a cause d'un eventHandler &quot;click&q
uot; dupliqu&eacute; ( sauf pour la 1ere colonne ).
<br /><a name='source-exemp
le'></a><h2> Source / Exemple : </h2>
<br /><pre class='code' data-mode='basic
'>
UTILISATION : Voir lignes N° 8, 9, 13 et 48

&lt;!DOCTYPE html PUBLIC &quo
t;-//W3C//DTD HTML 4.01 Transitional//EN&quot;&gt; 
&lt;html&gt; 
&lt;head&gt;
 
  &lt;meta content=&quot;text/html; charset=ISO-8859-1&quot; http-equiv=&quot
;content-type&quot;&gt; 
  &lt;title&gt;Trier des tableaux html&lt;/title&gt; 

  &lt;script type=&quot;text/javascript&quot; src=&quot;../prototype.js&quot;&g
t;&lt;/script&gt; 
  &lt;script type=&quot;text/javascript&quot; src=&quot;sort
HTMLTable.js&quot;&gt;&lt;/script&gt; 
&lt;/head&gt; 
&lt;body&gt; 
&lt;br&gt
; 
&lt;table id=&quot;users&quot;&gt; 
    &lt;tr&gt; 
        &lt;th&gt;Numb
er&lt;/th&gt; 
        &lt;th&gt;String&lt;/th&gt; 
        &lt;th&gt;Date&lt;
/th&gt; 
    &lt;/tr&gt; 
    &lt;tr&gt; 
        &lt;td&gt;12&lt;/td&gt; 
 
       &lt;td&gt;Albert&lt;/td&gt; 
        &lt;td&gt;23/02/1926&lt;/td&gt; 
 
   &lt;/tr&gt; 
    &lt;tr&gt; 
        &lt;td&gt;4&lt;/td&gt; 
        &lt;t
d&gt;Roger&lt;/td&gt; 
        &lt;td&gt;12/10/1973&lt;/td&gt; 
    &lt;/tr&gt
; 
    &lt;tr&gt; 
        &lt;td&gt;1&lt;/td&gt; 
        &lt;td&gt;Celine&l
t;/td&gt; 
        &lt;td&gt;13/12/1983&lt;/td&gt; 
    &lt;/tr&gt; 
    &lt;
tr&gt; 
        &lt;td&gt;1&lt;/td&gt; 
        &lt;td&gt;Isabelle&lt;/td&gt; 

        &lt;td&gt;19/03/1983&lt;/td&gt; 
    &lt;/tr&gt; 
    &lt;tr&gt; 
 
       &lt;td&gt;-15&lt;/td&gt; 
        &lt;td&gt;Emily&lt;/td&gt; 
        &
lt;td&gt;30/11/1983&lt;/td&gt; 
    &lt;/tr&gt; 
&lt;/table&gt; 
&lt;script t
ype=&quot;text/javascript&quot;&gt; 
new sortHTMLTable( 'users' );  
&lt;/scri
pt&gt; 
&lt;/body&gt; 
&lt;/html&gt;
</pre>
