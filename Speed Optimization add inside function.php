 //Speed Optimization
///Dequeue Style
function removeunusedfile_css(){
    if(!is_product()){
      wp_dequeue_style("ct.sizeguide.css"); 
      wp_dequeue_style("ct.sizeguide.style.css");
      wp_dequeue_style("magnific.popup.css");
      wp_dequeue_style("ct.sizeguide.icon.css");
      wp_dequeue_style("ct.sizeguide.fontawesome.css");
      wp_dequeue_style("ct.sizeguide.fontawesome.iconfield.css");
    }
  

    
}
add_action("wp_print_styles",removeunusedfile_css);


//Dequeue JavaScripts
function removeunusedfile_js() {
    if( !is_product()){
         wp_deregister_script( 'ct.sg.front.js' );
         wp_deregister_script( 'magnific.popup.js' );
         
    }
    
     if(!is_page("exchange-policy")){
        wp_deregister_script("contact-form-7-js");
        wp_deregister_script("contact-form-7");
    }
    
    wp_deregister_script("wp-polyfill-js");
}
add_action( 'wp_print_scripts', 'removeunusedfile_js' );    


    
    
    
    
    
    
    
    
    
//how to defer javascript
function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer ";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
