<div>
<?php
                                $facebook_url = $item['coach_detail']['facebook_url'];
                                $twitter_url = $item['coach_detail']['twitter_url'] ;
                                $pinterest_url = $item['coach_detail']['pinterest_url'];
                                $youtube_url = $item['coach_detail']['youtube_url'];
                                $instagram_url = $item['coach_detail']['instagram_url'];
                                
                                if (!empty($item['coach_detail']['facebook_url'])) {
                                   echo " <a href='$facebook_url'>
                                    <img src='http://localhost/trainbytrainerphp/public/images/fb.svg' alt='svg'>
                                </a>";
                                }
                                if(!empty($item['coach_detail']['twitter_url'])) {
                                    echo " <a href='$twitter_url'>
                                     <img src='http://localhost/trainbytrainerphp/public/images/twitter.svg' alt='svg'>
                                 </a>";
                                 }  
                                 if(!empty($item['coach_detail']['pinterest_url'])) {
                                    echo " <a href='$pinterest_url'>
                                     <img src='http://localhost/trainbytrainerphp/public/images/pint.svg' alt='svg'>
                                 </a>";
                                 }  
                                 if(!empty($item['coach_detail']['youtube_url'])) {
                                    echo " <a href='$youtube_url'>
                                     <img src='http://localhost/trainbytrainerphp/public/images/youtube.svg' alt='svg'>
                                 </a>";
                                 }    
                                 if(!empty($item['coach_detail']['instagram_url'])) {
                                    echo " <a href='$instagram_url'>
                                     <img src='http://localhost/trainbytrainerphp/public/images/insta.svg' alt='svg'>
                                 </a>";
                                 }                         
                                else {
                                echo "";
                                }

                                ?>
</div>