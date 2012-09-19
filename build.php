<?php

// --------------------------------------
// We use this tool to create content for our Jooml site.
// Simply place the package in your local server web directory, visit the build file in the browser and the html files will be automagically created based on your settings below.
//---------------------------------------



// --------------------------------------
// Building your content array
// To add new items to your array just follow the syntax used in the example below.
// 	When adding new colour schemes make sure you add a comma between the nested arrays otherwise you will get the white page of doom.
//---------------------------------------

$articles = array( 
	
		array( 
			"name" => "Template Name",
			"date" => "Aug 2012", 
          	"details" => "Joomla 1.5 / Joomla 2.5 Template / Jomsocial Template",
       
          	 "featurelist" => array(
          	 		"Lorem ipsum dolor sit amet",
          	 		"In rutrum convallis nibh laoreet lacinia.",
          	 		"Curabitur luctus aliquam tempor.",
           	 		"Lorem ipsum dolor sit amet",
          	 		"In rutrum convallis nibh laoreet lacinia.",
          	 		"Curabitur luctus aliquam tempor."     	
          	 ),
          	 
          	 "otherfeatures" => array(
          	 		"Feature One" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum convallis nibh laoreet lacinia. Curabitur luctus aliquam tempor. ",      	 		
          	 		"Feature Two" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum convallis nibh laoreet lacinia. Curabitur luctus aliquam tempor. ",
          	 		"Feature Three" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum convallis nibh laoreet lacinia. Curabitur luctus aliquam tempor. ",
         	 		"Feature Four" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum convallis nibh laoreet lacinia. Curabitur luctus aliquam tempor. ",
          	 ),
        ),  
        
        array( 
			"name" => "Template Name 2",
			"date" => "Sep 2012", 
          	"details" => "Joomla 1.5 / Joomla 2.5 Template / Jomsocial Template",
       
          	 "featurelist" => array(
          	 		"Lorem ipsum dolor sit amet",
          	 		"In rutrum convallis nibh laoreet lacinia.",
          	 		"Curabitur luctus aliquam tempor.",
           	 		"Lorem ipsum dolor sit amet",
          	 		"In rutrum convallis nibh laoreet lacinia.",
          	 		"Curabitur luctus aliquam tempor."     	
          	 ),
          	 
          	 "otherfeatures" => array(
          	 		"Feature One" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum convallis nibh laoreet lacinia. Curabitur luctus aliquam tempor. ",      	 		
          	 		"Feature Two" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum convallis nibh laoreet lacinia. Curabitur luctus aliquam tempor. ",
          	 		"Feature Three" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum convallis nibh laoreet lacinia. Curabitur luctus aliquam tempor. ",
         	 		"Feature Four" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rutrum convallis nibh laoreet lacinia. Curabitur luctus aliquam tempor. ",
          	 ),
        ),   
 );

		       

 foreach($articles as $article) {
	
		// Variable that specifies the html file we will write to
		$file = $article[name].'.html';
		
		// Variable that holds the content
		$content = "";
		
		// Start the buffer
		ob_start()?>
		
		
		<p>Name: <?php echo $article[name]; ?></p>
		<p><em>Date: <?php echo $article[date]; ?></em></p>
		<p><em>Details: <?php echo $article[details]; ?></em></p>
		
		
		<?php // A check to see if features array is empty
		
		if(isset($article[otherfeatures])) { ?>
		
			<p>An example of a list generated from a nested array.</p>

			<ul>
				<?php 	foreach ($article[featurelist] as $featureitem) {
							echo '<li>';
							echo $featureitem;
							echo '</li>';
						}
				?>
			</ul>
		<?php } ?>

		
		<?php // A check to see if otherfeatures array is empty
		
		if(isset($article[otherfeatures])) { ?>
		
		
		<div class="otherfeatures">
			<h2 class="headline"><span><?php echo $article[name]; ?> Features</span></h2>
				
				<?php
				// Count the number of items int he array
				$count = count($article[otherfeatures]);
				 
				foreach ($article[otherfeatures] as $title => $item) {
							
									
						echo '<h2><span>'.$title.'</span></h2>';
						echo $item;
					
									
				} ?>
			
		</div>
		<?php } ?>
		
		<!-- just a dummy div to separate the output ont he page - you can remove this -->
		<div style="height:200px"></div>
		
						
		<?php // The variable that holds the content
		$content .= ob_get_contents();
	
		// Actually writes the file to the same folder the build file sits in
		file_put_contents($file, $content);
		
}
		
		// Cleans the buffer so we can process the next item
		ob_flush();

		// Prints the content of all the fiels on the page
		echo $content;
?>