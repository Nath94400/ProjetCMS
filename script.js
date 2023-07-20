

jQuery(document).ready(function() {
  jQuery('.dropdown').on('show.bs.dropdown', function() {
      jQuery('.navbar').addClass('expanded');
      jQuery('.logo').attr('src', themeData.themeDirectoryUri + '/assets/image/logo2.svg'); 
      jQuery('#navbarDropdownMenuLink img').attr('src', themeData.themeDirectoryUri + '/assets/image/croix.svg'); 
  });

  jQuery('.dropdown').on('hide.bs.dropdown', function() {
      jQuery('.navbar').removeClass('expanded');
      jQuery('.logo').attr('src', themeData.themeDirectoryUri + '/assets/image/logo.svg');
      jQuery('#navbarDropdownMenuLink img').attr('src', themeData.themeDirectoryUri + '/assets/image/menuLogo.svg'); 
  });
});
