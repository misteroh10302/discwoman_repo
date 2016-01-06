var mg = {}; // exposed for dev, move inside closure later

(function($) {
	$.extend(mg, {
		init: function(url) {
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
				window.location.replace('http://miguelgaydosh.com/mobile');
			}
			modules = [];
			root = url;
			mg.queryPosts();
			mg.initEventHandlers();
		},
		createModule: function(obj) {
			var mod = {}, o = obj[0];

			//console.log(o)

			mod.modTitle = o['title'];
			mod.content = o['content'];
			mod.postMeta = o['acf']['post_meta'];
			mod.tags = [];
			mod.tagArray = o['tags'];
			mod.positionX = o['acf']['position_x'] + '%';
			mod.positionY = o['acf']['position_y'] + '%';
			mod.boxShadow = o['acf']['box_shadow'];

			for (i=0;i<mod.tagArray.length;i++) {
				var string = mod.tagArray[i]['title'];
				mod.tags.push(string)
			}

			mod.tags = mod.tags.toString();

			try {
				mod.featured = o['thumbnail_images']['full']['url'];
				mod.w = o['thumbnail_images']['full']['width'];
			}
			catch(err){}

			mod.imageArray = [],
			mod.videoArray = [];

			try {
				var projectImages = o['acf']['project_images'];

				$.each(projectImages, function() {
					var $el = document.createElement('img');
					$el.className = 'project-image';
					$el.src = $(this)[0]['image']['url'];
					$el.width = $(this)[0]['image']['width'] / 2;
					$el.style.left = $(this)[0]['img_position_x'] + '%';
					$el.style.top = $(this)[0]['img_position_y'] + '%';
					mod.imageArray.push($el);
				})
			}
			catch(err){}

			try {
				var projectVideos = o['acf']['project_videos'];

				$.each(projectVideos, function() {
					var $el = document.createElement('div');
					$el.className = 'project-video';
					$el.style.width = $(this)[0]['width'] + 'px';
					$el.style.height = $(this)[0]['height'] + 'px';
					$el.style.transform = 'rotate(' + $(this)[0]['rotation'] + 'deg)';
					$el.style.left = $(this)[0]['position_x'] + '%';
					$el.style.top = $(this)[0]['position_y'] + '%';
					$el.innerHTML = $(this)[0]['embed_html'];
					mod.videoArray.push($el);
					//console.log($el);
				})
			}
			catch(err){console.log(err)}

			var $module = document.createElement('div'),
			    $moduleImage = document.createElement('img'),
			    $content = document.getElementById('content');

			if (mod.boxShadow === '1') {
				$module.className = 'module shadow';
			} else {
				$module.className = 'module';
			}

			$module.style.left = mod.positionX;
			$module.style.top = mod.positionY;

			$module.tit = mod.modTitle;
			$module.content = mod.content;
			$module.meta = mod.postMeta;
			$module.setAttribute('data-tags', mod.tags);

			$module.images = mod.imageArray;
			$module.videos = mod.videoArray;

			$moduleImage.src = mod.featured;
			$moduleImage.width = mod.w / 2;
			$module.appendChild($moduleImage);

			//console.log(module);

			modules.push(mod);

			$content.appendChild($module);
			//jQuery('#content').append(jQuery(module));
		},
		queryPosts: function() {
			$.ajax({
				url: root + '/?json=1'
			}).success(function(data) {
				//console.log(data);
				$.each(data['posts'], function() {
					mg.createModule($(this));
				});
				var $presentation = document.createElement('div'),
						$postContent = document.createElement('div'),
						$postText = document.createElement('div'),
						$postTitle = document.createElement('div'),
						$postMeta = document.createElement('div'),
						$cover = document.createElement('div'),
				    $arrow = document.createElement('a');

				$presentation.id = 'presentation';
				$postContent.className = 'post-content';
				$postText.className = 'post-text';
				$postTitle.className = 'post-title';
				$postMeta.className = 'post-meta';
				$cover.id = 'cover';
				$arrow.className = 'close left-arrow';
				$arrow.href = '#';
				$presentation.appendChild($arrow);
				$presentation.appendChild($postTitle);
				$postContent.appendChild($postText);
				$presentation.appendChild($postMeta);
				$presentation.appendChild($postContent);
				$presentation.appendChild($cover);

				console.log($postMeta)

				//$('#content').append($($postContent));
				$('#content').append($($presentation));
				$('body').addClass('loaded');
			});
		},
		initEventHandlers: function() {

			//Filter Prototype Function
			Array.prototype.contains = function(elem) {
				for (var i in this) {
					if (this[i] == elem) return true;
				}
				return false;
			};

			var $content = $('#content'),
					$modules = $content.children('.module'),
					thisMoved = false,
					dragging = false;

			$content.on({
				mouseenter: function() {
					$('#info-container').html(this.tit);
				},
				mouseleave: function() {
					$('#info-container').html('');
				}
			}, '.module');

			$content.on('mousedown', '.module', function(event) {
				$('img').on('dragstart', function(event) { event.preventDefault(); });

			  $content.on('mouseup mousemove', '.module', function handler(event) {
			    if (event.type === 'mouseup') {

				    var $postText = $('.post-text').html(this.content);

						$('.post-content').html($postText);
						$('.post-text').html(this.content);
						$('.post-title').html(this.tit);
						$('.post-content').append(this.images);
						$('.post-content').append(this.videos);
						$('.post-meta').html(this.meta);

						//console.log(this.meta);

						//console.log(this.videos);

				    if ($(this).hasClass('active')) {
							$(this).removeClass('active');
						} else {
							$(this).addClass('active');
						}
						$(this).removeClass('drag');
						event.preventDefault();

			    } else {

				    var $drag = $(this).addClass('drag');

						drg_h = $drag.outerHeight();
				    drg_w = $drag.outerWidth();
				    pos_y = $drag.offset().top + drg_h - event.pageY;
				    pos_x = $drag.offset().left + drg_w - event.pageX;

						$drag.parents().on('mousemove', function(event) {
							$('.drag').offset({
								top: event.pageY + pos_y - drg_h,
								left: event.pageX + pos_x - drg_w
							});
						});

						$drag.on('mouseup', function(event) {
							$(this).removeClass('drag');
						});
			    }
			    $content.off('mouseup mousemove', '.module', handler);
			  });
			});

			$content.on('mousedown', '.project-image', function(event) {
				$('img').on('dragstart', function(event) { event.preventDefault(); });

			  $content.on('mouseup mousemove', '.project-image', function handler(event) {
			    if (event.type === 'mouseup') {
							event.preventDefault();
			    } else {
				    var $drag = $(this).addClass('drag');

						drg_h = $drag.outerHeight();
				    drg_w = $drag.outerWidth();
				    pos_y = $drag.offset().top + drg_h - event.pageY;
				    pos_x = $drag.offset().left + drg_w - event.pageX;

						$drag.parents().on('mousemove', function(event) {
							$('.drag').offset({
								top: event.pageY + pos_y - drg_h,
								left: event.pageX + pos_x - drg_w
							});
						});

						$drag.on('mouseup', function(event) {
							$(this).removeClass('drag');
						});
			    }
			    $content.off('mouseup mousemove', '.project-image', handler);
			  });
			});

			$content.on({
				click: function(event) {
					event.preventDefault();
					$(this).parent().siblings('.active').removeClass('active');
				}
			}, '#presentation .close');

			$('#about-cover .close').on({
				click: function(event) {
					console.log('wtf')
					event.preventDefault();
					$('#about-cover').removeClass('active');
				}
			});

			// Custom select menus
			var $select = $('.select'),
			    $selectOptions = $('.select li a'),
			    $selectToggle = $('#select-toggle');

			$selectOptions.on('click', function(event) {
				event.preventDefault();
				$selectToggle.text($(this).text());
				$selectToggle.removeClass('open');

				var value = $(this).attr('data-value');

				$('.module').each(function() {
					if (value === 'All') {
						$(this).fadeIn();
					} else {
						var tags = $(this).attr('data-tags').split(',');
						if (tags.contains(value)) {
							$(this).fadeIn();
						} else {
							$(this).fadeOut();
						}
					}
				});
			});

			$('body').css('height', $(document).height());

			$('#about-toggle').on('click', function(event) {
				event.preventDefault();
				$('#about').addClass('active');

				if ($(window).scrollTop() + $(window).height() !== $(document).height()) {
					$('html, body').animate({
						scrollTop: $(document).height()
					});
				}
			});

			$('#about .intro p').on('click', function() {
				$('#about-cover').toggleClass('active');
			});

			$select.hover(
				function() { $.data(this, 'hover', true);console.log('jhdrt') },
				function() { $.data(this, 'hover', false); }
			).data('hover', false);

			$selectToggle.on({
				click: function(event) {
					event.preventDefault();
					if ($(this).hasClass('open')) {
						$(this).blur();
						$(this).removeClass('open');

					} else {
						$(this).focus();
						$(this).addClass('open');
					}
				},
				mousedown: function(event) {
					event.preventDefault(); // Safari blurs on mousedown
				},
				blur: function() {
					setTimeout(function() {
						$(this).blur();
						$(this).removeClass('open');
					},100);
				}
			});

			setInterval(function() {
				if (!$select.data('hover')) {
					$selectToggle.blur().removeClass('open');
				}
			}, 4000);

		}
	});
})(jQuery);