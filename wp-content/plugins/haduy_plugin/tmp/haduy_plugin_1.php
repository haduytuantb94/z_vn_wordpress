<?php


//Action Hook
function action_call_back() {
    echo "this is call back";
}

add_action('new_action_hook','action_call_back');

// Filter Hook
function add_myfilter($copyright) {
    return $copyright = "Design by HHH";
}

add_filter('new_filter_hook','add_myfilter');

//
add_action( 'new_action_hook','new_action_callback', '10', 3);

function new_action_callback($courseName, $author,$year) {
    echo "<p>Khoa hoc lap trinh" . $courseName . " tac gia: " .  $author ." nam: ". $year ."</p>";
}

function hd_new_hook ($courseName = 'Wordpress', $author='Haduy',$year = '2022') {
    do_action( 'new_action_hook',$courseName,$author,$year);
}
?>