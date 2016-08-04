<div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
           <!-- <img class="android-logo-image" src="images/android-logo.png">!-->
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="BrowsePet">Browse</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="FeaturedPet">Trending</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="victory">Victories</a>
              <?php 
              if(!isset($_SESSION['user'])){
              echo '<a class="mdl-navigation__link mdl-typography--text-uppercase" href="login">Login</a>';
              }
              ?>
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <a href="index"><img class="android-logo-image" src="../assets/images/android-logo.png"></a>
          </span>
          <a href="search" class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="search">
            <i class="material-icons white800">search</i>
          </a>
          <div class="mdl-tooltip" for="search">
              Search Patetion
          </div>
          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons white800">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item">About Lokvishay</li>
            <li class="mdl-menu__item">How it works</li>
            <li class="mdl-menu__item">Privacy Policy</li>
            <li class="mdl-menu__item">Terms and Conditions</li>
          </ul>
        </div>
      </div>