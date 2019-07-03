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

