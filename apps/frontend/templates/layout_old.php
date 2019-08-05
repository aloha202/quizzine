    <!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_partial('global/head'); ?>

  </head>

  <body>

    <div class="container-narrow">

       <?php include_partial('global/header'); ?>

      <hr>



      <div class="row-fluid marketing">
          <?php include_partial('global/flashes'); ?>
          <?php echo $sf_content; ?>
      </div>

      <hr>

      <?php include_partial('global/footer'); ?>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php /*
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
*/ ?>
  </body>
</html>
