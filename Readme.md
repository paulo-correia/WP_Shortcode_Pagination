##Shortcode para WordPress que faz paginação

Para instalar entre no diretório onde está instalado o seu WordPress, localize a pasta wp-content e entre nela, dentro dela localize a pasta themes, dentro desta pasta estarão todos os temas que instalou, mas para instalar este shortcode tem que verificar no Painel/"Dashboard" do WordPress qual é o tema que está ativo.

Mas, vamos supor que o seu tema ativo é o Twenty Sixteen neste caso lozalize a pasta twentysixteen e entre nela.

Dentro desta pasta existirão vários arquivos, localize o arquivo functions.php e faça uma cópia dele com o nome functions.ori.

Editor de Texto de sua preferência

no final deste arquivo adicione o código PHP abaixo:

```
function pagination($projects) {
        extract(shortcode_atts(array(
                'pages' => 'pages',
                'type' => 'type',
                'actual'=> 'actual'     
        ), $projects));
        $flag_ret=0;
        $all_pages = explode(",", $pages);
        if (count($all_pages)>1) {
                $flag_ret=1;
                $cnt=1;
                $ret="<font color='#000'>P&aacute;ginas:</font> ";
                foreach ($all_pages as $page) {
                        if ($cnt<count($all_pages)) {
                                $comma="<font color='#000'>,</font>&nbsp;";
                        } else {
                                $comma="";
                        }    
                        if ($cnt==$actual) {
                                $bold_cnt="<b>".$cnt."</b>";
                        } else {
                                $bold_cnt=$cnt;
                        }
                        $ret.="<a href='".$page."'>".$bold_cnt."</a>&nbsp;".$comma;
                        $cnt++;
                }
        }
        if (count($all_pages)==1) {
                $flag_ret=1;
                if ($type=='next') {
                        $text="Pr&oacute;ximo";
                }
                if ($type=='previous') {
                        $text="Anterior";
                }
                $ret="<a href='".$pages."'>".$text."</a>";
        }
        if ($flag_ret==1) {
                return $ret;
        }
}
add_shortcode('pagination', 'pagination');
```
Salve o arquivo e feche o editor.

Modos de usar:

1) Em qualquer página ou post do wordpress adicione o shortcode [pagination page="url-do-outra-pagina-ou-post" type="next"] (Isto adicionará o Texto "Próximo" que terá um link a página/post "url-do-outra-pagina-ou-post").

2) Em qualquer página ou post do wordpress adicione o shortcode [pagination page="url-do-outra-pagina-ou-post" type="previous"] (Isto adicionará o Texto "Anterior" que terá um link a página/post "url-do-outra-pagina-ou-post").

3) Em qualquer página ou post do wordpress adicione o shortcode [pagination page="url-do-outra-pagina-ou-post,url-do-outra-pagina-ou-post,..." actual="número"] (Isto adicionará o Texto "Páginas: 1 , 2 , ..." e o número será a página atual que ficará em negrito.
