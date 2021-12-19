<nav>
        <div class="nav-wrapper  cyan darken-3">
          <a href="<?php echo site_url('Home/index'); ?>" class="brand-logo">Pack & Go</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="<?= site_url('Offer/showAllOffers') ?>">Ponude</a></li>
            <li><a href="<?= site_url('Home/aboutUs') ?>">Kontakt</a></li>
            <?php
                use App\Models\UserModel;

                $userRole = null;
                $user = null;
                if (!isset($_SESSION['user'])) {
                    $loginHref = site_url('Guest/showLogin');
                    $registrationHref = site_url('Guest/showRegistation');
                    echo "<li><a href='$registrationHref'>Registracija</a></li>";
                    echo "<li><a href='$loginHref'>Prijavi se</a></li>";
                }
                else {
                    $user = (new UserModel())->findByUsername($_SESSION['user']);
                    $userRole = $user->role;
                }
                if ($userRole != null && $userRole=="ADMIN") {
                    $userRemoveHref = site_url('Admin/showRemoveUsers');
                    echo "<li><a href='$userRemoveHref'>Uklanjanje korisnika</a></li>";
                    $approveOfferHref = site_url('Admin/showOfferOnWait');
                    echo "<li><a href='$approveOfferHref'>Odobravanje ponuda</a></li>";
                    $approveAgencyHref = site_url('Admin/showAgency');
                    echo "<li><a href='$approveAgencyHref'>Odobravanje agencije</a></li>";
                }
                if ($userRole != null && $userRole=="VIP") {
                    $compareOffersHref = site_url('User/compareOffer');
                    echo "<li><a href='$compareOffersHref'>Uporedi ponude</a></li>";
                    $showWishlistHref = site_url('User/showUserWishes');
                    echo "<li><a href='$showWishlistHref'>Lista zelja</a></li>";
                }
                if ($userRole != null && $userRole=="IZDAVAC") {
                    $compareOffersHref = site_url('User/addRenterOffer/0');
                    echo "<li><a href='$compareOffersHref'>Postavi oglas</a></li>";
                    $showWishlistHref = site_url('UserWithOffers/showUserOffers');
                    echo "<li><a href='$showWishlistHref'>Moji oglasi</a></li>";
					$showWishlistHref = site_url('User/showUserWishes');
                    echo "<li><a href='$showWishlistHref'>Lista zelja</a></li>";
                }
                if ($userRole != null && $userRole=="AGENCIJA") {
                    $compareOffersHref = site_url('UserWithOffers/addAgencyOffer/0');
                    echo "<li><a href='$compareOffersHref'>Postavi oglas</a></li>";
                    $showWishlistHref = site_url('UserWithOffers/showUserOffers');
                    echo "<li><a href='$showWishlistHref'>Moji oglasi</a></li>";
					$showWishlistHref = site_url('User/showUserWishes');
                    echo "<li><a href='$showWishlistHref'>Lista zelja</a></li>";
                }
                if ($userRole != null) {
                    $logoutHref = site_url('User/logout');
                    echo "<li><a href='$logoutHref'>Odjavi se</a></li>";
                }
            ?>
          </ul>
        </div>
    </nav>