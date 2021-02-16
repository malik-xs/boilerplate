(function ($, elementor) {
	"use strict";

	var Boilerplate = {
		init: function () {
			var widgets = {
				'elementskit-gallery.default': Boilerplate.Gallery
			};

			$.each(widgets, function (widget, callback) {
				elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
			});
		},

		Gallery: function ($scope) {
			var $galleryGrid = $scope.find('.ekit_gallery_grid'),
				masonryConfig = $galleryGrid.data('grid-config');

			if ($galleryGrid.length === 0) {
				return
			}

			$galleryGrid.imagesLoaded(function () {
				$galleryGrid.isotope(masonryConfig);
			});


			// Filter List
			var $filterList = $scope.find('.filter-button-wraper'),
				$filterLinks = $filterList.find('a');

			$filterLinks.on('click', function (e) {
				e.preventDefault();

				var $this = $(this);

				$this.parents('.option-set').find('.selected').removeClass('selected');
				$this.addClass('selected');

				$galleryGrid.isotope({
					filter: $this.data('option-value')
				});
			});


			// Tilt Effect
			var $tiltTargets = $scope.find('.ekit-gallery-portfolio-tilt'),
				tiltConfig = $galleryGrid.data('tilt-config');

			$tiltTargets.tilt(tiltConfig);
		}
	};
	$(window).on('elementor/frontend/init', Boilerplate.init);
}(jQuery, window.elementorFrontend));