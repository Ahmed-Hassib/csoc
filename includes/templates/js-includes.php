<?php include_once $tpl . "footer.php" ?>

<!-- GET GLOBAL JS FILES -->
<?php $global_js_files = get_page_dependencies('global', 'js'); ?>
<?php $global_node_js_files = get_page_dependencies('global', 'node')['js']; ?>

<!-- INCLUDE GLOBAL JS FILES -->
<?php foreach ($global_js_files as $global_js_file) { ?>
  <script src="<?php echo $js . $global_js_file; ?>"></script>
<?php } ?>

<!-- INCLUDE GLOBAL JS FILES -->
<?php foreach ($global_node_js_files as $global_node_js_file) { ?>
  <script src="<?php echo $node . $global_node_js_file; ?>"></script>
<?php } ?>

<!-- CHECK IF PAGE CONTAIIN TABLES -->
<?php if (isset($is_contain_table) && $is_contain_table == true) { ?>
  <!-- GET ALL TABLE CUSTOM JS FILES -->
  <?php $table_js_files = get_page_dependencies('tables', 'js'); ?>
  <!-- GET ALL TABLES NODE JS FILES -->
  <?php $tables_node_js_files = get_page_dependencies('tables', 'node')['js']; ?>

  <!-- INCLUDE ALL TABLES NODE JS FILES -->
  <?php foreach ($tables_node_js_files as $tables_node_js_file) { ?>
    <script src="<?php echo $node . $tables_node_js_file; ?>"></script>
  <?php } ?>

  <!-- INCLUDE ALL TABLE CUSTOM JS FILES -->
  <?php foreach ($table_js_files as $table_js_file) { ?>
    <script src="<?php echo $js . $table_js_file; ?>"></script>
  <?php } ?>
<?php } ?>


<!-- GET ALL GLOBAL CSS FILES DEPENDING ON PAGE CATEGORY -->
<?php if (isset($page_category)) { ?>
  <?php $global_web_js_files = get_page_dependencies("" . $page_category . "_global", 'js'); ?>

  <?php foreach ($global_web_js_files as $js_file) { ?>
    <script src="<?php echo $js . $js_file; ?>"></script>
  <?php } ?>
<?php } ?>

<?php $page_role_js_files = get_page_dependencies($page_role, 'js'); ?>

<?php foreach ($page_role_js_files as $js_file) { ?>
  <script src="<?php echo $js . $js_file; ?>"></script>
<?php } ?>

<?php if (isset($preloader) && $preloader == true) { ?>
  <script>
    $(document).ready(function() {
      $(".spinner").fadeOut(1000, function() {
        $(this).parent('.preloader').fadeOut(1200, function() {
          $("body").css('overflow-x', 'visible');
        });
      });
    })
  </script>
<?php } else { ?>
  <script>
    $(document).ready(function() {
      $("body").css('overflow-x', 'visible');
    })
  </script>
<?php } ?>
</body>

</html>