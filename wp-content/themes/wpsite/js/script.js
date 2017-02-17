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
        
        // profile
        
 
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
    
    var image = 'http://saad.com.tn/wpsite/wp-content/themes/wpsite/images/marker.png';
    var marker = new google.maps.Marker({
      position: {lat: parseFloat(lat), lng: parseFloat(long)},
      map: map,
      icon: image
    });
}