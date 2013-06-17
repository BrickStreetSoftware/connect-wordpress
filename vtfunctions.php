<?php  

/**
* This file holds the 
* functions  into the vtwidgets
* plugin
*/

function vtinit(){
	//die("Test");
}

 function vt_widget_display($args) {
   extract($args);
   echo $before_widget;
   echo $before_title . 'VT Widgets' . $after_title;
   // print some HTML for the widget to display here
   echo "Welcome to Vtaurus";
   echo $after_widget;
}
function vt_widget_display_control(){
	echo "I am controll";
}
 
wp_register_sidebar_widget(
    'vt_widget_1',        // your unique widget id
    'VT Widget',          // widget name
    'vt_widget_display',  // callback function
    array(                  // options
        'description' => 'VT Widgets here'
    )
);