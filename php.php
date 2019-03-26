
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

                <?php print "<a href='https://www.".$links[1] . "'> <div class='latest_news'> <img src='" . $images[1] . "'  width='189' height='105' class='imageleft'/><h3>" . $titles[1] . "</h3><h5>$links[1]</h5></div></a>"; ?>
                <?php echo "<a href='https://www." . $links[2] . "'> <div class='latest_news'> <img src='" . $images[2] . "'  width='189' height='105' class='imageleft'/><h3>" . $titles[2] . "</h3><h5>$links[2]</h5></div></a>"; ?>
                <?php echo "<a href='https://www." . $links[3] . "'> <div class='latest_news'> <img src='" . $images[3] . "'  width='189' height='105' class='imageleft'/><h3>" . $titles[3] . "</h3><h5>$links[3]</h5></div></a>"; ?>
                <?php echo "<a href='https://www." . $links[4] . "'> <div class='latest_news'> <img src='" . $images[4] . "'  width='189' height='105' class='imageleft'/><h3>" . $titles[4] . "</h3><h5>$links[4]</h5></div></a>"; ?>