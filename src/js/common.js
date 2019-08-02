'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  Swiper = require('swiper'),
  fancybox = require('@fancyapps/fancybox'),
  simpleParallax = require('simple-parallax-js');

jQuery(document).ready(function($) {
  // Toggle nav menu
  $('.nav-toggle').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('.header__nav').toggleClass('open');
    $('.nav-overlay').toggleClass('is-active');
  });

  $('.nav-overlay').click(function() {
    $('.nav-toggle').removeClass('active');
    $('.header__nav').removeClass('open');
    $('.nav-overlay').removeClass('is-active');
  });

  // Modal
  $('.modal').popup({
    transition: 'all 0.3s',
    onclose: function() {
      $(this).find('label.error').remove();
    }
  });

  new Swiper('.gallery-slider', {
    speed: 1000,
    autoplay: {
      delay: 5000,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
  });

  function new_map( $el ) {

    // var
    var $markers = $el.find('.marker');


    // vars
    var args = {
      zoom		: 16,
      center		: new google.maps.LatLng(0, 0),
      mapTypeId	: google.maps.MapTypeId.ROADMAP
    };


    // create map
    var map = new google.maps.Map( $el[0], args);


    // add a markers reference
    map.markers = [];


    // add markers
    $markers.each(function(){

      add_marker( $(this), map );

    });


    // center map
    center_map( map );


    // return
    return map;

  }

  /*
  *  add_marker
  *
  *  This function will add a marker to the selected Google Map
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	4.3.0
  *
  *  @param	$marker (jQuery element)
  *  @param	map (Google Map object)
  *  @return	n/a
  */

  function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
      position	: latlng,
      map			: map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content		: $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {

        infowindow.open( map, marker );

      });
    }

  }

  /*
  *  center_map
  *
  *  This function will center the map, showing all markers attached to this map
  *
  *  @type	function
  *  @date	8/11/2013
  *  @since	4.3.0
  *
  *  @param	map (Google Map object)
  *  @return	n/a
  */

  function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

      bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
      // set center of map
      map.setCenter( bounds.getCenter() );
      map.setZoom( 16 );
    }
    else
    {
      // fit to bounds
      map.fitBounds( bounds );
    }

  }

  let map = null;
  $('.acf-map').each(function(){
    map = new_map( $(this) );
  });

  $('a[href*="#"]')
  // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen

          let headerHeight = $('.header').outerHeight();

          $('.nav-toggle').removeClass('active');
          $('.header__nav').removeClass('open');
          $('.nav-overlay').removeClass('is-active');

          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top - headerHeight
          }, 1000);
        }
      }
    });

  let fixedHeader = function(e) {
    let header = $('.header');
    let h = $('.header:not(.fixed)').outerHeight();

    if (e.scrollTop() > 150) {
      $('body').css('padding-top', h);
      header.addClass('fixed');
    }
    else {
      $('body').css('padding-top', 0);
      header.removeClass('fixed');
    }
  };

  $('.scroll-down').click(function(e) {
    e.preventDefault();
    let offsetTop = $(this).parents('section').next().offset().top;
    let headerHeight = $('.header').outerHeight();

    $('html, body').animate({
      scrollTop: offsetTop + headerHeight
    }, 1000);
  });

  new simpleParallax('.district__img');

  fixedHeader($(this));

  $(window).scroll(function() {
    fixedHeader($(this));
  });

  // SVG
  svg4everybody({});
});