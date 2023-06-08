<!-- bcc footer start -->
<footer class="footer position-absolute">
  <div class="row g-0 justify-content-between align-items-center h-100">
      <div class="col-12 col-sm-auto text-center">
        <p class="mb-0 mt-2 mt-sm-0 text-900">Thank you for creating with BCC CRM<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none">2023 ©<a class="mx-1" href="https://bccusa.com/">bccusa.com</a></p>
      </div>
  </div>
</footer>
<!-- bcc footer end -->
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHPUufTlBkF5NfBT3uhS9K4BbW2N-mkb4&libraries=places"></script>
<script src="<?php echo e(asset('assets/theme/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/anchor.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/is.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/lodash.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/polyfill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/list.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/dayjs.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/choices.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/echarts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/phoenix.js')); ?>"></script>
<script src="<?php echo e(asset('assets/theme/js/crm-dashboard.js')); ?>"></script>
<script>
         var navbarTopShape = window.config.config.phoenixNavbarTopShape;
         var navbarPosition = window.config.config.phoenixNavbarPosition;
         var body = document.querySelector('body');
         var navbarDefault = document.querySelector('#navbarDefault');
         var navbarTop = document.querySelector('#navbarTop');
         var topNavSlim = document.querySelector('#topNavSlim');
         var navbarTopSlim = document.querySelector('#navbarTopSlim');
         var navbarCombo = document.querySelector('#navbarCombo');
         var navbarComboSlim = document.querySelector('#navbarComboSlim');
         
         var documentElement = document.documentElement;
         var navbarVertical = document.querySelector('.navbar-vertical');
         
         if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
           navbarDefault.remove();
           navbarTop.remove();
           navbarTopSlim.remove();
           navbarCombo.remove();
           navbarComboSlim.remove();
           topNavSlim.style.display = 'block';
           navbarVertical.style.display = 'inline-block';
           body.classList.add('nav-slim');
         } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
           navbarDefault.remove();
           navbarVertical.remove();
           navbarTop.remove();
           topNavSlim.remove();
           navbarCombo.remove();
           navbarComboSlim.remove();
           navbarTopSlim.removeAttribute('style');
           body.classList.add('nav-slim');
         } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
           navbarDefault.remove();
           //- navbarVertical.remove();
           navbarTop.remove();
           topNavSlim.remove();
           navbarCombo.remove();
           navbarTopSlim.remove();
           navbarComboSlim.removeAttribute('style');
           navbarVertical.removeAttribute('style');
           body.classList.add('nav-slim');
         } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
           navbarDefault.remove();
           topNavSlim.remove();
           navbarVertical.remove();
           navbarTopSlim.remove();
           navbarCombo.remove();
           navbarComboSlim.remove();
           navbarTop.removeAttribute('style');
           documentElement.classList.add('navbar-horizontal');
         } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
           topNavSlim.remove();
           navbarTop.remove();
           navbarTopSlim.remove();
           navbarDefault.remove();
           navbarComboSlim.remove();
           navbarCombo.removeAttribute('style');
           navbarVertical.removeAttribute('style');
           documentElement.classList.add('navbar-combo')
         
         } else {
           topNavSlim.remove();
           navbarTop.remove();
           navbarTopSlim.remove();
           navbarCombo.remove();
           navbarComboSlim.remove();
           navbarDefault.removeAttribute('style');
           navbarVertical.removeAttribute('style');
         }
         
         var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
         var navbarTop = document.querySelector('.navbar-top');
         if (navbarTopStyle === 'darker') {
           navbarTop.classList.add('navbar-darker');
         }
         
         var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
         var navbarVertical = document.querySelector('.navbar-vertical');
         if (navbarVerticalStyle === 'darker') {
           navbarVertical.classList.add('navbar-darker');
         }
      </script>
<script>
         var phoenixIsRTL = window.config.config.phoenixIsRTL;
         if (phoenixIsRTL) {
           var linkDefault = document.getElementById('style-default');
           var userLinkDefault = document.getElementById('user-style-default');
           linkDefault.setAttribute('disabled', true);
           userLinkDefault.setAttribute('disabled', true);
           document.querySelector('html').setAttribute('dir', 'rtl');
         } else {
           var linkRTL = document.getElementById('style-rtl');
           var userLinkRTL = document.getElementById('user-style-rtl');
           linkRTL.setAttribute('disabled', true);
           userLinkRTL.setAttribute('disabled', true);
         }
      </script>
      <script>
        var navbarStyle = window.config.config.phoenixNavbarStyle;
        if (navbarStyle && navbarStyle !== 'transparent') {
          document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
        }
      </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\old_crm\resources\views/admin/layout/footer.blade.php ENDPATH**/ ?>