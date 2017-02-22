$(document).ready(function(){
   $("#countDown")
  .countdown($("#countDown").data('dat'), function(event) {
    $(this).text(
      event.strftime('%D Jour(s) %H:%M:%S')
    );
  }); 
 
 
 // login page
 $('.button-checkbox').each(function(){
		var $widget = $(this),
			$button = $widget.find('button'),
			$checkbox = $widget.find('input:checkbox'),
			color = $button.data('color'),
			settings = {
					on: {
						icon: 'glyphicon glyphicon-check'
					},
					off: {
						icon: 'glyphicon glyphicon-unchecked'
					}
			};

		$button.on('click', function () {
			$checkbox.prop('checked', !$checkbox.is(':checked'));
			$checkbox.triggerHandler('change');
			updateDisplay();
		});

		$checkbox.on('change', function () {
			updateDisplay();
		});

		function updateDisplay() {
			var isChecked = $checkbox.is(':checked');
			// Set the button's state
			$button.data('state', (isChecked) ? "on" : "off");

			// Set the button's icon
			$button.find('.state-icon')
				.removeClass()
				.addClass('state-icon ' + settings[$button.data('state')].icon);

			// Update the button's color
			if (isChecked) {
				$button
					.removeClass('btn-default')
					.addClass('btn-' + color + ' active');
			}
			else
			{
				$button
					.removeClass('btn-' + color + ' active')
					.addClass('btn-default');
			}
		}
		function init() {
			updateDisplay();
			// Inject the icon if applicable
			if ($button.find('.state-icon').length == 0) {
				$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
			}
		}
		init();
	});
        
        // fin login page
        
        $('#inscription').validate({
            rules: {
                first_name: "required",
                last_name: "required",
                user_login: "required",
                user_pass: {
                    required: true,
                    minlength: 8
                },
                user_pass2: {
                    required: true,
                    minlength: 8,
                    equalTo: "#user_pass"
                },
                user_email: {
                        required: true,
                        email: true
                },
                addr1: "required",
                city: "required",
                thestate: "required",
                pays: "required",
                zip: "required",
                phone1: "required",
                naissance: {
                    required : true,                    
                }

        },
        
            errorPlacement: function(error,element) {
                return true;
              }
        });
        
        $( "#naissance" ).datepicker();
        
        // cart
        $('.removeCart').click(function(){
            var tr = this;
            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                  action : "remove_cart",
                  id : $(tr).data('id'),         
                },
                success: function (data) {
                    if(parseInt(data) > 0){
                        $(tr).parents('tr').hide('slow', function(){
                            $(tr).parents('tr').remove();
                            var tot = 0;
                            $('.prix_tot').each(function(index, elem){
                                tot = tot + parseFloat($(elem).html());
                            })
                            $('.panier .total').html(tot.toFixed(3));
                        })
                    } else if(parseInt(data) == 0){
                        $(tr).parents('table').hide('slow', function(){
                            $(tr).parents('table').remove();
                                    
                        });
                        $('.other-check').hide('slow', function(){
                            $('.other-check').remove();
                            $('#panier-vide').show('slow');
                        });
                    } 
                    $('.panier .counter').html(data);
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                      console.log(xhr.status);
                      console.log(xhr.responseText);
                      console.log(thrownError);
                  },
                  beforeSend : function(){
                      //alert('salut');
                  },
                  complete : function(){
                      //alert('fin');
                  }
              });
            
        });
        
        $(".panier .quantite").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl+C
                (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl+X
                (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39) ||
                //Allow numbers and numbers + shift key
                ((e.shiftKey && (e.keyCode >= 48 && e.keyCode <= 57)) || (e.keyCode >= 96 && e.keyCode <= 105))){
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((!e.shiftKey && (e.keyCode < 48 || e.keyCode > 57)) || (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
                });
                
        $(".panier .quantite").keyup(function(){
            var prix_uni = $(this).parents('tr').find('.prix_uni').html();
            var qte = ($(this).val() === "")? 0: $(this).val();
            var prix_tot = parseFloat(prix_uni) * parseInt(qte);
            $(this).parents('tr').find('.prix_tot').html(prix_tot.toFixed(3));
            var tot = 0;
            $('.prix_tot').each(function(index, elem){
                tot = tot + parseFloat($(elem).html());
            })
            $('.panier .total').html(tot.toFixed(3));
        });
});

function initMap() { 
    var lat = $('#map').data('lat');
    var long = $('#map').data('long');
    console.log(parseFloat(lat));
    var mapDiv = document.getElementById('map');
    var map = new google.maps.Map(mapDiv, {
        center: {lat: parseFloat(lat), lng: parseFloat(long)},
        zoom: 18,
        disableDefaultUI: true
    });
    
    var image = 'http://dealtounsi.com/wp-content/themes/wpsite/images/marker.png';
    var marker = new google.maps.Marker({
      position: {lat: parseFloat(lat), lng: parseFloat(long)},
      map: map,
      icon: image
    });
}