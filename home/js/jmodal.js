/**
 *
 * @author camilo 
 * site: www.onezerozeroone.com
 * This plugin makes it possible to have multiple modals running at the same time. It doesnt work on IE (havent tested it but it should give som e problems) but otherwise works quite well.
 * It has two ways of invoking it, mainly to keep compability with some code I wrote a long time ago.
 * 
 * Use it like this to open:
 * jQuery(selector).modal();
 *
 * To close it a spceific modal: 
 * jQuery(selector).modalClose();
 * 
 * T close the highest modal:
 * jQuery.modal.close();
 *
 */

(
	function(jQuery)
	{
		
		var modals = [];
		
		var defaults = {
			zIndex: 1000,
			over: false, // this forces a modal to be the highest in the chain
			forzeZ: false
		}
		
		$(window).bind("resize.multiModal", 
			function()
			{
				for (var i = 0; i < modals.length; i++)
				{
					var modalData = modals[i];
					var overlay = $("#multiModalOverlay-" + modalData.modalId);
					var container = $("#multiModalContainer-" + modalData.modalId);
					var documentObj = $(window);
					var modalWidth = container.width();
					var modalHeight = container.height();
					var containerX = Math.round(documentObj.width() / 2) - Math.round(modalWidth / 2);
					var containerY = Math.round(documentObj.height() / 2)- Math.round(modalHeight / 2);
					overlay.height(documentObj.height());
					overlay.width(documentObj.width());
					
					container
						.css("left", containerX + "px")
						.css("top", containerY + "px");
				}
			}
		)
		
		
		
		$.fn.setDefaultModalOptions = function(options) 
		{
			$.extend(defaults, options); 
		}
	
		$.fn.modal = function(options) 
		{
			// extend default options to a new object
			var instanceOptions = $.extend({}, defaults);
			
			// merge with new options
			instanceOptions = $.extend(instanceOptions, options); 
			
		  	return this.each(
				function()
				{

					var jRef = $(this);
					
					// if the object already is in a modal
					if (jRef.data("modalData") == null)
					{
					
						var modalId = Math.random().toString().replace(".", "");
					
						var highestZ = instanceOptions.zIndex;//1000;
						for (var i = 0; i < modals.length; i++)
						{
							if ((modals[i].over == false) && (modals[i].forzeZ == false))
							{
								if (modals[i].modalZ > highestZ) highestZ = modals[i].modalZ;
							}
						}
						
						var modalZ = highestZ + 10;
						if (instanceOptions.forzeZ != false)
						{
							modalZ = instanceOptions.forzeZ;
						}
						
						// if the new dialog is supposed to be over all others,  we fix it here
						if (instanceOptions.over) modalZ += 100000;
						
						var jRef = $(this);
						var parent = jRef.parent();
				
						var overlay = $('<div class="multiModalOverlay" id="multiModalOverlay-' + modalId + '"></div>');
						
						overlay
							.css("position", "absolute")
							.css("top", "0px")
							.css("left", "0px")
							.css("position", "fixed")
							.css("z-index", modalZ)
							.attr("rel", jRef.attr("id"));
							
							
						
						$(document.body).append(overlay);
						
						var documentObj = $(window);
						overlay.height(documentObj.height());
						overlay.width(documentObj.width());
	
						// add the container and position it
						var container = $('<div class="multiModalContainer" id="multiModalContainer-' + modalId + '"></div>');
						
						container
							.css("position", "absolute")
							.css("z-index", modalZ + 1)
							.show().fadeIn()//added by me...yours truely
							.attr("rel", jRef.attr("id"));
												
						$(document.body).append(container);
						$(container).append(jRef);
						

						var hideStatus = jRef.css("display");//.css({ "display": "block" }).fadeIn(400);
						jRef.show();//.fadeIn();
						
						var modalWidth = container.width();
						var modalHeight = container.height();
						var containerX = Math.round(documentObj.width() / 2) - Math.round(modalWidth / 2);
						var containerY = Math.round(documentObj.height() / 2)- Math.round(modalHeight / 2);
						
						container
							.css("left", containerX + "px")
							.css("top", containerY + "px")
						
						var modalData = {
							modalId: modalId,
							modalZ: modalZ,
							parent: parent,
							hideStatus: hideStatus,
							over: instanceOptions.over,
							forzeZ: instanceOptions.forzeZ
						}
						
						
						jRef.data("modalData", modalData);
						
						modals.push(modalData);
						
						
					}
					else
					{
						var modalData = jRef.data("modalData");
						var overlay = $("#multiModalOverlay-" + modalData.modalId);
						var container = $("#multiModalContainer-" + modalData.modalId);
						
						var highestZ = 0;
						for (var i = 0; i < modals.length; i++)
						{
							if (modals[i].over == false)
							{
								if (modals[i].modalZ > highestZ) highestZ = modals[i].modalZ;
							}
						}
						
						modalData.modalZ = highestZ + 10;
						
						overlay.css("z-index", modalData.modalZ);
						container.css("z-index", modalData.modalZ + 1);

						
					}
					
					
			  	}
			);
		}
		
		/**
		 * Removes the dialog choosen by the selector (if its a dialog)
		 */
		$.fn.modalClose = function() 
		{
			
		  	return this.each(
				function()
				{
				
					var jRef = $(this);
					var modalData = jRef.data("modalData");
					
					// make sure it exists
					if (modalData != null)
					{
						
						var overlay = $("#multiModalOverlay-" + modalData.modalId);
						var container = $("#multiModalContainer-" + modalData.modalId);
						modalData.parent.append(jRef);
						
						jRef.css("display", modalData.hideStatus);

						overlay.fadeOut();//added by me...yours truely
						container.fadeOut(400);//added by me...yours truely formally .remove();
				

				
						for (var i = 0; i < modals.length; i++)
						{
							if (modals[i].modalId == modalData.modalId)
							{
								modals.splice(i, 1);
								break;
							}
						}
				
						delete modalData;
						jRef.data("modalData", null);
					
					}
				}
			);
		}
		
		
		$.modal = {};
		
		/**
		 * Remove the top formost dialog
		 */
		$.modal.close = function() 
		{
			
			
			var modalIndex = -1;
			var modalData = {modalZ: 0};
			for (var i = 0; i < modals.length; i++)
			{
				if (modals[i].modalZ > modalData.modalZ) 
				{
					modalData = modals[i];
					modalIndex = i;
				}
			}
	
			var overlay = $("#multiModalOverlay-" + modalData.modalId);
			var container = $("#multiModalContainer-" + modalData.modalId);
			var containerChildren = container.children();
			
			if (containerChildren.length > 0)
			{
				var jRef = $(containerChildren[0]);
				
				jRef.css("display", modalData.hideStatus);
	
				modalData.parent.append(jRef);
				/*overlay.remove();
				container.remove();*/
				overlay.fadeOut();//added by me...yours truely
				container.fadeOut();//added by me...yours truely
				
				// remove it from the array
				modals.splice(modalIndex, 1);
					
				// delete old data
				delete modalData;
				
				// remove the data form the jquery object
				jRef.data("modalData", null);
				
			}
			
			
			
			
		}
	}
)
(jQuery);
