/*!
* Shards Dashboards v1.1.0
* Copyright 2011-2018 DesignRevision
* SEE LICENSE FILE
*/

$(document).ready(function () {

  /**
   * Dropdown adjustments
   */

  var slideConfig = {
    duration: 270,
    easing: 'easeOutSine'
  };

  // Add dropdown animations when toggled.
  $(':not(.main-sidebar--icons-only) .dropdown').on('show.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(slideConfig);
  });

  $(':not(.main-sidebar--icons-only) .dropdown').on('hide.bs.dropdown', function () {
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp(slideConfig);
  });

  /**
   * Sidebar toggles
   */
  $('.toggle-sidebar').click(function (e) {
    $('.main-sidebar').toggleClass('open');
  });
});