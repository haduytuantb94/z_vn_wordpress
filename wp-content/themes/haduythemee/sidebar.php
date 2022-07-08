<?php 
if(is_active_sidebar('main-sidebar')) {
	dynamic_sidebar('main-sidebar');
} else {
	__e('This is sidebar.You have to add some widgets.','haduythemee');
}

?>