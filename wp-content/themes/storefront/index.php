<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>
       
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php

		 // if(have_posts()) {
   //    	    echo "<pre>";
   //    	    print_r(have_posts());
   //    	    echo "</pre>";
   //       }


/*         $the_query_2 = new WP_Query();
         $result = $the_query_2->have_posts();
             echo "<pre>";
             print_r($result);
             echo "</pre>";
             if(have_posts()){
             	echo "ok";
             }else {
             	echo "no ok";
             }*/

           
			// The Query
			$this_query = new WP_Query( $args );
			 
			// The Loop
			if ( $this_query->have_posts() ) {
				echo "ok";
			    echo '<ul>';
			    while ( $this_query->have_posts() ) {
			        $this_query->the_post();
			        echo '<li>' . get_the_title() . '</li>';
			    }
			    echo '</ul>';
			} else {
			    echo "No posts found";
			}
			/* Restore original Post Data */
			wp_reset_postdata();







		if ( have_posts() ) :

			get_template_part( 'loop' );

		else :

			get_template_part( 'content', 'none' );

		endif;
        
class car {
      
   public $name = "Audi";
   public $color;

   public function car($name = "", $color= ""){
   	 $this->name = ucfirst($name);
     $this->color = ucfirst($color);
     echo __METHOD__.'<br>';
   }

   // public function setCar($name, $color) {
   //    $this->name = ucfirst($name);
   //    $this->color = ucfirst($color);
   // }
   public function getCar(){
   	  return 'this car has name : '. $this->name . ' and have color: '.$this->color.' and has method is '.__METHOD__;
   }
   public function infoCar(){
   	  return $this->name.' is a part of Volkswagen';
   }
}

class register_car{
	public $register;
	public $standard;

   public function register(){
   	   $cars = new car("audi");
   	   $this->register = $cars->name;
   	   echo $this->register;
   	  if($this->register == "Audi") {
   	  	return " this car is so good <br>";
   	  }
   	  else {
   	  	return "false";
   	  }
   }
}

// $car = new car('audi','red');
// // $car->setCar('audi','red');
// echo $car->getCar().'<br>';
// echo $car->name.'<br>';
// echo $car->infoCar();

$register = new register_car();
echo $register->register();
// Làm việc với mảng : Thêm phần từ,xoá phần tử đầu và cuối của mảng 
$array = [1,2,3,4,6,7];
 //array_push($array,0)."<br>";
 array_pop($array)."<br>";
     echo "<pre>";
     print_r($array);
     echo "</pre>";
(in_array(0,$array))? $result = "true" : $result = "false";
echo $result;

//echo array_unshift($array)."<br>";

$newArray = ["Tuân","thật","đẹp","trai"];
$newArray_2 = ["name"=>"Tuan","b"=>"that","c"=>"dep","d"=>"trai"];
$Arrtostr = implode(' ',$newArray);
     echo "<pre>";
     print_r($Arrtostr);
     echo "</pre>"; 

//JSON
$my_json = '{
	"name" : "Tuân",
	"age"  : "28",
	"address" : "Thái Bình",
	"graduate" : "belanchor"
}';
//conver từ JSON sang Array :
$convert_array = json_decode($my_json,true);
    echo "<pre>";
    print_r($convert_array);
    echo "</pre>";
  foreach ($convert_array as $key => $value) {
  	   echo $key.' -> '.$value."<br>";
  }
//Convert từ Array sang Json :
$convert_json = json_encode($newArray_2,true) ; 
    echo "<pre>";
    print_r($convert_json);
    echo "</pre>";

$arr = [1, 2, 3];  
// array_pop($arr); 
echo array_pop($arr);









		?>
        








		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();



