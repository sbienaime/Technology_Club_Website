<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Technology Club</title>
    <meta name="description" content="An interactive getting started guide for Brackets.">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

</head>
    <body>
    <div class="navbar">
        <ul class="right-hide-on-menu-and-down";>
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Theme</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li style="float:right"><a href="#">Login</a></li>
        </ul>

    </div>
        <div class="container">
            <div class="slider">
                <div class="slide slide1">
                    <div class="caption">
                        <h2>Slide1</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                </div>
                <div class="slide slide2">
                    <div class="caption">
                        <h2>Slide2</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                </div>
                <div class="slide slide3">
                    <div class="caption">
                        <h2>Slide3</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                </div>
                <div class="slide slide4">
                    <div class="caption">
                        <h2>Slide4</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                </div>
                <div class="slide slide1">
                    <div class="caption">
                        <h2>Slide1</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
                    </div>
                </div>
            </div>
         </div>
         <section class="section section-light">
           <div class="row">
         <div class="column">

       <img src="images/image1.jpg" width="100px" height="100px" >
         </div>
         <div class="column">
           <h2>Column 2</h2>
           <p>my name is carlos masson</p>
         </div>
       </div>

      </section>
      <div class="pimg2">
          <div class="ptext">
            <span class="border trans">
              <h2>Image Two Text</h2>
            </span>
        </div>
      </div>
        
       
    <?php 
                
        require_once('webhose.php');

        // this is the api key  
        Webhose::config("81e306b2-8490-4a78-84d7-390aa94ba8f9");
       

            $images = array();//this array is used to store images from 
            $titles = array();// this array is used to store titles 
            $links = array();// this array is used to store titles 

             
                
           
           
        function print_filterwebdata_titles($api_response) {
                    
                
                if ($api_response == null) {
                    echo "<p>Response is null, no action taken.</p>";
                      return;
                    }
                
                
                        if (isset($api_response->posts)) {
                            $c = 0;
                        
                            foreach ($api_response->posts as $post) {
            
                            global $links;
                            global $titles;
                                
                            $links[$c] = $post->thread->site;
                            $titles[$c] = $post->title;
                            
                            if ($post->thread->main_image == null) {
                                global $images;
                            
                            } else {
                                
                                if ($post->thread->main_image == 'http://www.techskimm.com/wp-content/plugins/wp-rss-multi-importer/images/facebook.png') {
                                    $images[$c] = 'images/default.jpg';
                                    
                                } else {
                                    
                                    GLOBAL $images;
                                    $images[$c] = $post->thread->main_image;
                                }
                            }
                        
                            $c++;
                                
                            // this limits the number of posts to 3 by breaking out of the loop 
                            if ($c == 3) {
                                break 1;
                            }
                        }
                    }
                }

                $params = array(
                    "q" => "language:english site:wired.com",
                    "sort" => "relevancy"
                );
                
                $result = Webhose::query("filterWebContent", $params);
                
                print_filterwebdata_titles($result);
                
                
                ?>

        

     <section class="section section-dark">
        <div class="row">
        <div class="column2"> 
        <h2><?php echo $titles[0]; ?></h2>  
        <?php  echo "<img src='" . $images[0] . "'  width='100%' height='80%' class='imageleft'/>"; ?>
        </div>
      <div class="column2">
        <h2><?php echo $titles[1]; ?></h2>
      
         <?php  echo "<img src='" . $images[1] . "'width='100%' height='80%' ' class='imageleft'/>"; ?>  
      </div>
      <div class="column2">
        <h2><?php echo $titles[2]; ?></h2>
        <?php  echo "<img src='" . $images[2] . "' width='100%' height='80%'  class='imageleft'/>"; ?>    
      </div>
    </div>

      </section>
      <div class="pimg3">
          <div class="ptext">
            <span class="border trans">
              <h2>Image Three Text</h2>
            </span>
        </div>
      </div>
      <div class="side">
            <a href="#"style="background:#27ae60;">Gmail</a>
            <a href="#"style="background:#c0392b;">Youtube</a>
            <a href="#"style="background:#2c3e50;">Github</a>
            <a href="#"style="background:#2980b9;">Facebook</a>
        </div>
      <footer>
        <div class="box">
            <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div>
          <div class="footer-bottom">
            <p> Technology Club Copyright@2019 All right reserved</p>
          </div>
</footer>


    </body>
</html>
