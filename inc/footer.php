<footer id="footer">
    <div class="container padding-medium ">
      <div class="row">
        <div class="col-sm-6 col-lg-4 my-3">
          <div class="footer-menu">
            <a href="index.html">
              <img src="<?= $url->images("logo.png"); ?>" alt="logo" class="img-fluid">
            </a>
            <div class="social-links mt-4">
              <ul class="d-flex list-unstyled ">
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#facebook"></use>
                    </svg>
                  </a>
                </li>
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#twitter"></use>
                    </svg>
                  </a>
                </li>
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#instagram"></use>
                    </svg>
                  </a>
                </li>
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#linkedin"></use>
                    </svg>
                  </a>
                </li>
                <li class="me-4">
                  <a href="#">
                    <svg class="social-icon" width="30" height="30" aria-hidden="true">
                      <use xlink:href="#youtube"></use>
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Quick Links</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Home</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">About us</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Courses</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Blogs</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Contact</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">About</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">How It Works</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Pricing</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Promotion</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Affilation</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Help Center</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Payments</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">FAQs</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Checkout</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">Other</a>
              </li>

            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-lg-2 my-3">
          <div class="footer-menu">
            <h5 class=" fw-bold mb-4">Contact Us</h5>
            <ul class="menu-list list-unstyled">
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">contact@yourcompany</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">+110 4587 2445</a>
              </li>
              <li class="menu-item mb-2">
                <a href="#" class="footer-link">New York, USA</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <div id="footer-bottom">
    <hr class="text-black-50">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-6 copyright">
          <p>© 2024 TemplatesJungle. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-md-end">
          <p>Free HTML Template by: <a href="https://templatesjungle.com/" target="_blank" class="fw-bold">
              TemplatesJungle</a> Distributed by: <a href="https://themewagon.com" target="_blank" class="fw-bold">
                ThemeWagon
              </a></p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
    
    <script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script>
      let table = new DataTable('#myTable');
    </script>
    <!-- <script src="<?= $url->home(); ?>js/plugins.js"></script>
    <script src="<?= $url->home(); ?>js/script.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script> -->
</body>

</html>