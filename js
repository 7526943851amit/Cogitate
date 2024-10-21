$(document).ready(function() {
  $('li.menu-item-has-children > a').each(function() {
      var $this = $(this);
      $this.data('originalHref', $this.attr('href'));
  $this.removeAttr('href');
  });

  $('li.menu-item-has-children > a').on('click', function(e) {
      e.preventDefault(); 

      var $this = $(this);
      if ($this.parent().hasClass('elementskit-dropdown-open')) {
          return; 
      }

      
      $('li.menu-item-has-children > a').parent().removeClass('elementskit-dropdown-open');
    
      $this.parent().addClass('elementskit-dropdown-open');

     
      $this.removeAttr('href'); 

    
      $this.data('clicks', ($this.data('clicks') || 0) + 1);
      setTimeout(function() {
          $this.data('clicks', 0);
      }, 300);
  });

  $('li.menu-item-has-children > a').on('dblclick', function(e) {
      var $this = $(this);
      var href = $this.data('originalHref');
      if (href) {
          $this.attr('href', href); 
          window.location.href = href; 
      }
  });
});
