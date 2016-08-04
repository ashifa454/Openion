<?php 
       echo '<div class="mobile-btn">
        <a target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--fab mdl-color--orange-400">
        <i class="material-icons" style="color:black;">more_vert</i>
        </a>
        <ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="view-source">
            <li class="mdl-menu__item"><a href="BrowsePet">Browse Openion</a></li>
            <li class="mdl-menu__item"><a href="FeaturedPet">Featured Openion</a></li>
            <li class="mdl-menu__item mdl-menu__item--full-bleed-divider"><a href="victory">Victory Openion</a></li>'; 
              if(!isset($_SESSION['user'])){
              echo '<li class="mdl-menu__item"><a href="login">Login</a></li>';
              }
          echo '</ul>
        </div><footer class=" mdl-mega-footer">
          <div class="mdl-mega-footer--top-section">
            <div class="mdl-mega-footer--left-section">
              <button class="mdl-mega-footer--social-btn" style="background-image:url(../../assets/icons/facebook.png); background-size:cover; background-color:#424242;cursor:pointer;"></button>
              &nbsp;
              <button class="mdl-mega-footer--social-btn" style="background-image:url(../../assets/icons/twitter.png); background-size:cover; background-color:#424242;cursor:pointer;"></button>
              &nbsp;
              <button class="mdl-mega-footer--social-btn" style="background-image:url(../../assets/icons/google-plus.png); background-size:cover; background-color:#424242;cursor:pointer;"></button>
              &nbsp;
              <button class="mdl-mega-footer--social-btn" style="background-image:url(../../assets/icons/youtube-play.png); background-size:cover; background-color:#424242;cursor:pointer;"></button>
            </div>
            <div class="mdl-mega-footer--right-section">
              
            </div>
          </div>

          <div class="mdl-mega-footer--middle-section">
            <p class="mdl-typography--font-light">Lokvishay: © 2016 New Delhi, India</p>
          </div>

          <div class="mdl-mega-footer--bottom-section">
            <a class="android-link mdl-typography--font-light" href="">About us | </a>
            <a class="android-link mdl-typography--font-light" href="">Blog |</a>
            <a class="android-link mdl-typography--font-light" href="">Privacy Policy |</a>
            <a class="android-link mdl-typography--font-light" href="">Team |</a>
            <a class="android-link mdl-typography--font-light" href="">Press |</a>
            <a class="android-link mdl-typography--font-light" href="">Advertise </a>
          </div>

        </footer>';
?>